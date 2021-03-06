<?php
wp_enqueue_script( 'pods' );
wp_enqueue_style( 'pods-form' );

if ( empty( $fields ) || !is_array( $fields ) )
    $fields = $obj->pod->fields;

if ( !isset( $duplicate ) )
    $duplicate = false;
else
    $duplicate = (boolean) $duplicate;

$groups = PodsInit::$meta->groups_get( $pod->pod_data[ 'type' ], $pod->pod_data[ 'name' ], $fields );

$group_fields = array();
$submittable_fields = array();

foreach ( $groups as $g => $group ) {
    // unset fields
    foreach ( $group[ 'fields' ] as $k => $field ) {
        if ( in_array( $field[ 'name' ], array( 'created', 'modified' ) ) ) {
            unset( $group[ 'fields' ][ $k ] );

            continue;
        }
        elseif ( false === PodsForm::permission( $field[ 'type' ], $field[ 'name' ], $field[ 'options' ], $group[ 'fields' ], $pod, $pod->id() ) ) {
            if ( pods_var( 'hidden', $field[ 'options' ], false ) ) {
                $group[ 'fields' ][ $k ][ 'type' ] = 'hidden';
            }
            elseif ( pods_var( 'read_only', $field[ 'options' ], false ) ) {
                $group[ 'fields' ][ $k ][ 'readonly' ] = true;
            }
            else {
                unset( $group[ 'fields' ][ $k ] );

                continue;
            }
	    }
	    elseif ( !pods_has_permissions( $field[ 'options' ] ) ) {
            if ( pods_var( 'hidden', $field[ 'options' ], false ) ) {
                $group[ 'fields' ][ $k ][ 'type' ] = 'hidden';
            }
            elseif ( pods_var( 'read_only', $field[ 'options' ], false ) ) {
                $group[ 'fields' ][ $k ][ 'readonly' ] = true;
            }
	    }

        if ( !pods_var( 'readonly', $field, false ) ) {
            $submittable_fields[ $field[ 'name' ]] = $group[ 'fields' ][ $k ];
        }

        $group_fields[ $field[ 'name' ] ] = $group[ 'fields' ][ $k ];
    }
    $groups[ $g ] = $group;
}

if ( !isset( $thank_you_alt ) )
    $thank_you_alt = $thank_you;

$uri_hash = wp_create_nonce( 'pods_uri_' . $_SERVER[ 'REQUEST_URI' ] );
$field_hash = wp_create_nonce( 'pods_fields_' . implode( ',', array_keys( $submittable_fields ) ) );

$uid = @session_id();

if ( is_user_logged_in() )
    $uid = 'user_' . get_current_user_id();

$nonce = wp_create_nonce( 'pods_form_' . $pod->pod . '_' . $uid . '_' . ( $duplicate ? 0 : $pod->id() ) . '_' . $uri_hash . '_' . $field_hash );

if ( isset( $_POST[ '_pods_nonce' ] ) ) {
    $action = __( 'saved', 'pods' );

    if ( 'create' == pods_var_raw( 'do', 'post', 'save' ) )
        $action = __( 'created', 'pods' );
    elseif ( 'duplicate' == pods_var_raw( 'do', 'get', 'save' ) )
        $action = __( 'duplicated', 'pods' );

    try {
        $params = pods_unslash( (array) $_POST );
        $id = $pod->api->process_form( $params, $pod, $submittable_fields, $thank_you );

        $message = sprintf( __( '<strong>Success!</strong> %s %s successfully.', 'pods' ), $obj->item, $action );

        if ( 0 < strlen( pods_var( 'detail_url', $pod->pod_data[ 'options' ] ) ) )
            $message .= ' <a target="_blank" href="' . $pod->field( 'detail_url' ) . '">' . sprintf( __( 'View %s', 'pods' ), $obj->item ) . '</a>';

        $error = sprintf( __( '<strong>Error:</strong> %s %s successfully.', 'pods' ), $obj->item, $action );

        if ( 0 < $id )
            echo $obj->message( $message );
        else
            echo $obj->error( $error );
    }
    catch ( Exception $e ) {
        echo $obj->error( $e->getMessage() );
    }
}
elseif ( isset( $_GET[ 'do' ] ) ) {
    $action = __( 'saved', 'pods' );

    if ( 'create' == pods_var_raw( 'do', 'get', 'save' ) )
        $action = __( 'created', 'pods' );
    elseif ( 'duplicate' == pods_var_raw( 'do', 'get', 'save' ) )
        $action = __( 'duplicated', 'pods' );

    $message = sprintf( __( '<strong>Success!</strong> %s %s successfully.', 'pods' ), $obj->item, $action );

    if ( 0 < strlen( pods_var( 'detail_url', $pod->pod_data[ 'options' ] ) ) )
        $message .= ' <a target="_blank" href="' . $pod->field( 'detail_url' ) . '">' . sprintf( __( 'View %s', 'pods' ), $obj->item ) . '</a>';

    $error = sprintf( __( '<strong>Error:</strong> %s not %s.', 'pods' ), $obj->item, $action );

    if ( 0 < $pod->id() )
        echo $obj->message( $message );
    else
        echo $obj->error( $error );
}

if ( !isset( $label ) )
    $label = __( 'Save', 'pods' );

$do = 'create';

if ( 0 < $pod->id() ) {
    if ( $duplicate )
        $do = 'duplicate';
    else
        $do = 'save';
}
?>

<form action="" method="post" class="pods-submittable pods-form pods-form-pod-<?php echo esc_attr( $pod->pod ); ?> pods-submittable-ajax">
    <div class="pods-submittable-fields">
        <?php
            echo PodsForm::field( 'action', 'pods_admin', 'hidden' );
            echo PodsForm::field( 'method', 'process_form', 'hidden' );
            echo PodsForm::field( 'do', $do, 'hidden' );
            echo PodsForm::field( '_pods_nonce', $nonce, 'hidden' );
            echo PodsForm::field( '_pods_pod', $pod->pod, 'hidden' );
            echo PodsForm::field( '_pods_id', ( $duplicate ? 0 : $pod->id() ), 'hidden' );
            echo PodsForm::field( '_pods_uri', $uri_hash, 'hidden' );
            echo PodsForm::field( '_pods_form', implode( ',', array_keys( $submittable_fields ) ), 'hidden' );
            echo PodsForm::field( '_pods_location', $_SERVER[ 'REQUEST_URI' ], 'hidden' );

            foreach ( $group_fields as $field ) {
                if ( 'hidden' != $field[ 'type' ] )
                    continue;

                echo PodsForm::field( 'pods_field_' . $field[ 'name' ], $pod->field( array( 'name' => $field[ 'name' ], 'in_form' => true ) ), 'hidden' );
           }

			/**
			 * Action that runs before the meta boxes for an Advanced Content Type
			 *
			 * Occurs at the top of #poststuff
			 *
			 * @param Pods $pod Current Pods object.
			 * @param PodsUI $obj Current PodsUI object.
			 *
			 * @since 2.5
			 */
            do_action( 'pods_meta_box_pre', $pod, $obj );
        ?>
        <div id="poststuff" class="metabox-holder has-right-sidebar"> <!-- class "has-right-sidebar" preps for a sidebar... always present? -->
            <div id="side-info-column" class="inner-sidebar">
				<?php
					/**
					 * Action that runs before the sidebar of the editor for an Advanced Content Type
					 *
					 * Occurs at the top of #side-info-column
					 *
					 * @param Pods $pod Current Pods object.
					 * @param PodsUI $obj Current PodsUI object.
					 *
					 * @since 2.4.1
					 */
					do_action( 'pods_act_editor_before_sidebar', $pod, $obj );
				?>
                <div id="side-sortables" class="meta-box-sortables ui-sortable">
                    <!-- BEGIN PUBLISH DIV -->
                    <div id="submitdiv" class="postbox">
                        <div class="handlediv" title="Click to toggle"><br /></div>
                        <h3 class="hndle"><span><?php _e( 'Manage', 'pods' ); ?></span></h3>

                        <div class="inside">
                            <div class="submitbox" id="submitpost">
                                <?php
                                    if ( 0 < $pod->id() && ( isset( $pod->pod_data[ 'fields' ][ 'created' ] ) || isset( $pod->pod_data[ 'fields' ][ 'modified' ] ) || 0 < strlen( pods_var( 'detail_url', $pod->pod_data[ 'options' ] ) ) ) ) {
                                ?>
                                    <div id="minor-publishing">
                                        <?php
                                            if ( 0 < strlen( pods_var( 'detail_url', $pod->pod_data[ 'options' ] ) ) ) {
                                        ?>
                                            <div id="minor-publishing-actions">
                                                <div id="preview-action">
                                                    <a class="button" href="<?php echo esc_url( $pod->field( 'detail_url' ) ); ?>" target="_blank"><?php echo sprintf( __( 'View %s', 'pods' ), $obj->item ); ?></a>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        <?php
                                            }

                                            if ( isset( $pod->pod_data[ 'fields' ][ 'created' ] ) || isset( $pod->pod_data[ 'fields' ][ 'modified' ] ) ) {
                                        ?>
                                            <div id="misc-publishing-actions">
                                                <?php
                                                    $datef = __( 'M j, Y @ G:i' );

                                                    if ( isset( $pod->pod_data[ 'fields' ][ 'created' ] ) ) {
                                                        $date = date_i18n( $datef, strtotime( $pod->field( 'created' ) ) );
                                                ?>
                                                    <div class="misc-pub-section curtime">
                                                        <span id="timestamp"><?php _e( 'Created on', 'pods' ); ?>: <b><?php echo $date; ?></b></span>
                                                    </div>
                                                <?php
                                                    }

                                                    if ( isset( $pod->pod_data[ 'fields' ][ 'modified' ] ) && $pod->display( 'created' ) != $pod->display( 'modified' ) ) {
                                                        $date = date_i18n( $datef, strtotime( $pod->field( 'modified' ) ) );
                                                ?>
                                                    <div class="misc-pub-section curtime">
                                                        <span id="timestamp"><?php _e( 'Last Modified', 'pods' ); ?>: <b><?php echo $date; ?></b></span>
                                                    </div>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    /**
                                                     * Action that runs after the misc publish actions area for an Advanced Content Type
                                                     *
                                                     * Occurs at the end of #misc-publishing-actions
                                                     *
                                                     * @param Pods $pod Current Pods object.
                                                     * @param PodsUI $obj Current PodsUI object.
                                                     *
                                                     * @since 2.5
                                                     */
                                                    do_action( 'pods_ui_form_misc_pub_actions', $pod, $obj );
                                                ?>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <!-- /#minor-publishing -->
                                <?php
                                    }
                                ?>

                                <div id="major-publishing-actions">
                                    <?php
                                        if ( pods_is_admin( array( 'pods', 'pods_delete_' . $pod->pod ) ) && null !== $pod->id() && !$duplicate && !in_array( 'delete', (array) $obj->actions_disabled ) && !in_array( 'delete', (array) $obj->actions_hidden ) ) {
                                            $link = pods_query_arg( array(
                                                'action' => 'delete',
                                                '_wpnonce' => wp_create_nonce( 'pods-ui-action-delete' )
                                            ) );
                                    ?>
                                        <div id="delete-action">
                                            <a class="submitdelete deletion" href="<?php echo esc_url( $link ); ?>" onclick="return confirm('You are about to permanently delete this item\n Choose \'Cancel\' to stop, \'OK\' to delete.');"><?php _e( 'Delete', 'pods' ); ?></a>
                                        </div>
                                        <!-- /#delete-action -->
                                    <?php } ?>

                                    <div id="publishing-action">
                                        <img class="waiting" src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" alt="" />
                                        <input type="submit" name="publish" id="publish" class="button button-primary button-large" value="<?php echo esc_attr( $label ); ?>" accesskey="p" />
                                        <?php
											/**
											 * Action that runs after the publish button for an Advanced Content Type
											 *
											 * Occurs at the end of #publishing-action
											 *
											 * @param Pods $pod Current Pods object.
											 * @param PodsUI $obj Current PodsUI object.
											 *
											 * @since 2.5
											 */
                                            do_action( 'pods_ui_form_submit_area', $pod, $obj );
                                        ?>
                                    </div>
                                    <!-- /#publishing-action -->

                                    <div class="clear"></div>
                                </div>

                                <?php
                                    /**
                                     * Action that runs after the publish area for an Advanced Content Type
                                     *
                                     * Occurs at the end of #submitpost
                                     *
                                     * @param Pods $pod Current Pods object.
                                     * @param PodsUI $obj Current PodsUI object.
                                     *
                                     * @since 2.5
                                     */
                                    do_action( 'pods_ui_form_publish_area', $pod, $obj );
                                ?>
                                <!-- /#major-publishing-actions -->
                            </div>
                            <!-- /#submitpost -->
                        </div>
                        <!-- /.inside -->
                    </div>
                    <!-- /#submitdiv --><!-- END PUBLISH DIV --><!-- TODO: minor column fields -->
                    <?php
                        if ( pods_var_raw( 'action' ) == 'edit' && !$duplicate && !in_array( 'navigate', (array) $obj->actions_disabled ) && !in_array( 'navigate', (array) $obj->actions_hidden ) ) {
                            if ( !isset( $singular_label ) )
                                $singular_label = ucwords( str_replace( '_', ' ', $pod->pod_data[ 'name' ] ) );

                            $singular_label = pods_var_raw( 'label', $pod->pod_data[ 'options' ], $singular_label, null, true );
                            $singular_label = pods_var_raw( 'label_singular', $pod->pod_data[ 'options' ], $singular_label, null, true );

                            $pod->params = $obj->get_params( null, 'manage' );

                            $prev_next = apply_filters( 'pods_ui_prev_next_ids', array(), $pod, $obj );

                            if ( empty( $prev_next ) ) {
                                $prev_next = array(
                                    'prev' => $pod->prev_id(),
                                    'next' => $pod->next_id()
                                );
                            }

                            $prev = $prev_next[ 'prev' ];
                            $next = $prev_next[ 'next' ];

                            if ( 0 < $prev || 0 < $next ) {
                    ?>
                    <div id="navigatediv" class="postbox">
						<?php
							/**
							 * Action that runs before the post navagiation in the editor for an Advanced Content Type
							 *
							 * Occurs at the top of #navigatediv
							 *
							 * @param Pods $pod Current Pods object.
							 * @param PodsUI $obj Current PodsUI object.
							 *
							 * @since 2.4.1
							 */
							do_action( 'pods_act_editor_before_navigation', $pod, $obj );
						?>
                        <div class="handlediv" title="Click to toggle"><br /></div>
                        <h3 class="hndle"><span><?php _e( 'Navigate', 'pods' ); ?></span></h3>

                        <div class="inside">
                            <div class="pods-admin" id="navigatebox">
                                <div id="navigation-actions">
                                    <?php
                                        if ( 0 < $prev ) {
                                    ?>
                                        <a class="previous-item" href="<?php echo esc_url( pods_query_arg( array( 'id' => $prev ), null, 'do' ) ); ?>">
                                            <span>&laquo;</span>
                                            <?php echo sprintf( __( 'Previous %s', 'pods' ), $singular_label ); ?>
                                        </a>
                                    <?php
                                        }

                                        if ( 0 < $next ) {
                                    ?>
                                        <a class="next-item" href="<?php echo esc_url( pods_query_arg( array( 'id' => $next ), null, 'do' ) ); ?>">
                                            <?php echo sprintf( __( 'Next %s', 'pods' ), $singular_label ); ?>
                                            <span>&raquo;</span>
                                        </a>
                                    <?php
                                        }
                                    ?>

                                    <div class="clear"></div>
                                </div>
                                <!-- /#navigation-actions -->
                            </div>
                            <!-- /#navigatebox -->
                        </div>
                        <!-- /.inside -->
						<?php
							/**
							 * Action that runs after the post navagiation in the editor for an Advanced Content Type
							 *
							 * Occurs at the bottom of #navigatediv
							 *
							 * @param Pods $pod Current Pods object.
							 * @param PodsUI $obj Current PodsUI object.
							 *
							 * @since 2.4.1
							 */
							do_action( 'pods_act_editor_after_navigation', $pod, $obj );
						?>
                    </div> <!-- /#navigatediv -->
                    <?php
                            }
                        }
                    ?>
                </div>
                <!-- /#side-sortables -->
				<?php
					/**
					 * Action that runs after the sidebar of the editor for an Advanced Content Type
					 *
					 * Occurs at the bottom of #side-info-column
					 *
					 * @param Pods $pod Current Pods object.
					 * @param PodsUI $obj Current PodsUI object.
					 *
					 * @since 2.4.1
					 */
					do_action( 'pods_act_editor_after_sidebar', $pod, $obj );
				?>
            </div>
            <!-- /#side-info-column -->

            <div id="post-body">
                <div id="post-body-content">
                    <?php
                        $more = false;

                        if ( $pod->pod_data[ 'field_index' ] != $pod->pod_data[ 'field_id' ] ) {
                            foreach ( $group_fields as $field ) {
                                if ( $pod->pod_data[ 'field_index' ] != $field[ 'name' ] || 'text' != $field[ 'type' ] )
                                    continue;

                                $more = true;
                                $extra = '';

                                $max_length = (int) pods_var( 'maxlength', $field[ 'options' ], pods_var( $field[ 'type' ] . '_max_length', $field[ 'options' ], 0 ), null, true );

                                if ( 0 < $max_length )
                                    $extra .= ' maxlength="' . esc_attr( $max_length ) . '"';

                                /**
                                 * Filter that lets you make the title field readonly
                                 *
                                 * @param Pods $pod Current Pods object.
                                 * @param PodsUI $obj Current PodsUI object.
                                 *
                                 * @since 2.5
                                 */
                                if ( pods_v( 'readonly', $field[ 'options' ], pods_v( 'readonly', $field, false ) ) || apply_filters( 'pods_ui_form_title_readonly', false, $pod, $obj ) ) {
                            ?>
                                    <div id="titlediv">
                                        <div id="titlewrap">
                                            <h3><?php echo esc_html( $pod->index() ); ?></h3>
                                            <input type="hidden" name="pods_field_<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" data-name-clean="pods-field-<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" id="title" size="30" tabindex="1" value="<?php echo esc_attr( htmlspecialchars( $pod->index() ) ); ?>" class="pods-form-ui-field-name-pods-field-<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" autocomplete="off"<?php echo $extra; ?> />
                                        </div>
                                        <!-- /#titlewrap -->
                                    </div>
                                    <!-- /#titlediv -->
                            <?php
                                }
                                else {
                            ?>
                                <div id="titlediv">
									<?php
										/**
										 * Action that runs before the title field of the editor for an Advanced Content Type
										 *
										 * Occurs at the top of #titlediv
										 *
										 * @param Pods $pod Current Pods object.
										 * @param PodsUI $obj Current PodsUI object.
										 *
										 * @since 2.4.1
										 */
										do_action( 'pods_act_editor_before_title', $pod, $obj );
									?>
                                    <div id="titlewrap">
                                        <label class="screen-reader-text" id="title-prompt-text" for="title"><?php echo apply_filters( 'pods_enter_name_here', __( 'Enter name here', 'pods' ), $pod, $fields ); ?></label>
                                        <input type="text" name="pods_field_<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" data-name-clean="pods-field-<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" id="title" size="30" tabindex="1" value="<?php echo esc_attr( htmlspecialchars( $pod->index() ) ); ?>" class="pods-form-ui-field-name-pods-field-<?php echo esc_attr( $pod->pod_data[ 'field_index' ] ); ?>" autocomplete="off"<?php echo $extra; ?> />
										<?php
											/**
											 * Action that runs after the title field of the editor for an Advanced Content Type
											 *
											 * Occurs at the bottom of #titlediv
											 *
											 * @param Pods $pod Current Pods object.
											 * @param PodsUI $obj Current PodsUI object.
											 *
											 * @since 2.4.1
											 */
											do_action( 'pods_act_editor_after_title', $pod, $obj );
										?>
                                    </div>
                                    <!-- /#titlewrap -->

                                    <div class="inside">
                                        <div id="edit-slug-box">
                                        </div>
                                        <!-- /#edit-slug-box -->
                                    </div>
                                    <!-- /.inside -->
                                </div>
                                <!-- /#titlediv -->
                            <?php
                                }

                                unset( $group_fields[ $field[ 'name' ] ] );
                            }
                        }

                        if ( 0 < count( $groups ) ) {
                            if ( $more && 1 == count( $groups ) ) {
                                $first_group = current( $groups );

                                if ( 1 == count( $first_group[ 'fields' ] ) && isset( $first_group[ 'fields' ][ $pod->pod_data[ 'field_index' ] ] ) ) {
                                    $groups = array();
                                }
                            }

                            if ( 0 < count( $groups ) ) {
                    ?>
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<?php
                            foreach ( $groups as $group ) {
                                if ( empty( $group[ 'fields' ] ) ) {
                                    continue;
                                }

								/**
								 * Action that runs before the main fields metabox in the editor for an Advanced Content Type
								 *
								 * Occurs at the top of #normal-sortables
								 *
								 * @param Pods $pod Current Pods object.
								 *
								 * @since 2.4.1
								 */
								do_action( 'pods_act_editor_before_metabox', $pod );
						?>
                        <div id="pods-meta-box-<?php echo esc_attr( sanitize_title( $group[ 'label' ] ) ); ?>" class="postbox">
                            <div class="handlediv" title="Click to toggle"><br /></div>
                            <h3 class="hndle">
                                <span>
                                    <?php
                                        if ( ! $more && 1 == count( $groups ) ) {
                                            $title = __( 'Fields', 'pods' );
                                        }
                                        else {
                                            $title = $group[ 'label' ];
                                        }

										/** This filter is documented in classes/PodsMeta.php */
	                                    echo apply_filters( 'pods_meta_default_box_title', $title, $pod, $fields, $pod->api->pod_data[ 'type' ], $pod->pod );
                                    ?>
                                </span>
                            </h3>

                            <div class="inside">
                                    <?php
                                        if ( false === apply_filters( 'pods_meta_box_override', false, $pod, $group, $obj ) ) {
                                    ?>
                                <table class="form-table pods-metabox">
                                    <?php
                                                foreach ( $group[ 'fields' ] as $field ) {
                                                    if ( 'hidden' == $field[ 'type' ] || $more === $field[ 'name' ] || !isset( $group_fields[ $field[ 'name' ] ] ) )
                                                continue;
                                    ?>
                                        <tr class="form-field pods-field pods-field-input <?php echo esc_attr( 'pods-form-ui-row-type-' . $field[ 'type' ] . ' pods-form-ui-row-name-' . PodsForm::clean( $field[ 'name' ], true ) ); ?>">
                                            <th scope="row" valign="top"><?php echo PodsForm::label( 'pods_field_' . $field[ 'name' ], $field[ 'label' ], $field[ 'help' ], $field ); ?></th>
                                            <td>
                                                <?php echo PodsForm::field( 'pods_field_' . $field[ 'name' ], $pod->field( array( 'name' => $field[ 'name' ], 'in_form' => true ) ), $field[ 'type' ], $field, $pod, $pod->id() ); ?>
                                                <?php echo PodsForm::comment( 'pods_field_' . $field[ 'name' ], $field[ 'description' ], $field ); ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                    <?php
                                        }
                                    ?>
                            </div>
                            <!-- /.inside -->
                        </div>
                        <!-- /#pods-meta-box -->
						<?php
                            }

							/**
							 * Action that runs after the main fields metabox in the editor for an Advanced Content Type
							 *
							 * Occurs at the bottom of #normal-sortables
							 *
							 * @param Pods $pod Current Pods object.
							 * @param PodsUI $obj Current PodsUI object.
							 *
							 * @since 2.4.1
							 */
							do_action( 'pods_act_editor_after_metabox', $pod, $obj );
						?>
                    </div>
                    <!-- /#normal-sortables -->

                <?php
                        }
                    }
                ?>

                    <!--<div id="advanced-sortables" class="meta-box-sortables ui-sortable">
                    </div>
                     /#advanced-sortables -->

                </div>
                <!-- /#post-body-content -->

                <br class="clear" />
            </div>
            <!-- /#post-body -->

            <br class="clear" />
        </div>
        <!-- /#poststuff -->
    </div>
</form>
<!-- /#pods-record -->

<script type="text/javascript">
    if ( 'undefined' == typeof ajaxurl ) {
        var ajaxurl = '<?php echo pods_slash( admin_url( 'admin-ajax.php' ) ); ?>';
    }

    jQuery( function ( $ ) {
        $( document ).Pods( 'validate' );
        $( document ).Pods( 'submit' );
        $( document ).Pods( 'dependency' );
        $( document ).Pods( 'confirm' );
        $( document ).Pods( 'exit_confirm' );
    } );

    if ( 'undefined' == typeof pods_form_thank_you ) {
        var pods_form_thank_you = null;
    }

    var pods_admin_submit_callback = function ( id ) {

        id = parseInt( id, 10 );
        var thank_you = '<?php echo esc_url_raw( $thank_you ); ?>';
        var thank_you_alt = '<?php echo esc_url_raw( $thank_you_alt ); ?>';

        if ( 'undefined' != typeof pods_form_thank_you && null !== pods_form_thank_you ) {
            thank_you = pods_form_thank_you;
        }

        if ( isNaN( id ) ) {
            document.location = thank_you_alt.replace( 'X_ID_X', String( 0 ) );
        }
        else {
            document.location = thank_you.replace( 'X_ID_X', String( id ) );
        }
    }
</script>
