<?php
/**
* Sidebar Metabox.
*
* @package Kiddies
*/
if( !function_exists( 'kiddies_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function kiddies_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('kiddies_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function kiddies_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'kiddies_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function kiddies_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'kiddies_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function kiddies_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'kiddies_metabox' );

if( ! function_exists( 'kiddies_metabox' ) ):


    function  kiddies_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'kiddies' ),
            'kiddies_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'kiddies' ),
            'kiddies_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$kiddies_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'kiddies' ),
    'layout-2' => esc_html__( 'Banner Layout', 'kiddies' ),
);

$kiddies_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'kiddies' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'kiddies' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'kiddies' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'kiddies' ),
                ),
);

$kiddies_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'kiddies' ),
    'layout-2' => esc_html__( 'Banner Layout', 'kiddies' ),
);

$kiddies_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'kiddies' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'kiddies' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'kiddies_post_metafield_callback' ) ):
    
    function kiddies_post_metafield_callback() {
        global $post, $kiddies_post_sidebar_fields, $kiddies_post_layout_options,  $kiddies_page_layout_options, $kiddies_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'kiddies_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'kiddies'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'kiddies'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'kiddies'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','kiddies'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $kiddies_post_sidebar = esc_html( get_post_meta( $post->ID, 'kiddies_post_sidebar_option', true ) ); 
                            if( $kiddies_post_sidebar == '' ){ $kiddies_post_sidebar = 'global-sidebar'; }

                            foreach ( $kiddies_post_sidebar_fields as $kiddies_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="kiddies_post_sidebar_option" value="<?php echo esc_attr( $kiddies_post_sidebar_field['value'] ); ?>" <?php if( $kiddies_post_sidebar_field['value'] == $kiddies_post_sidebar ){ echo "checked='checked'";} if( empty( $kiddies_post_sidebar ) && $kiddies_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $kiddies_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','kiddies'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $kiddies_page_layout = esc_html( get_post_meta( $post->ID, 'kiddies_page_layout', true ) ); 
                                if( $kiddies_page_layout == '' ){ $kiddies_page_layout = 'layout-1'; }

                                foreach ( $kiddies_page_layout_options as $key => $kiddies_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="kiddies_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $kiddies_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $kiddies_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','kiddies'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $kiddies_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'kiddies_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="kiddies-header-overlay" name="kiddies_ed_header_overlay" value="1" <?php if( $kiddies_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="kiddies-header-overlay"><?php esc_html_e( 'Enable Header Overlay','kiddies' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','kiddies'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $kiddies_post_layout = esc_html( get_post_meta( $post->ID, 'kiddies_post_layout', true ) ); 

                                foreach ( $kiddies_post_layout_options as $key => $kiddies_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="kiddies_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $kiddies_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $kiddies_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','kiddies'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $kiddies_header_overlay = esc_html( get_post_meta( $post->ID, 'kiddies_header_overlay', true ) ); 
                                if( $kiddies_header_overlay == '' ){ $kiddies_header_overlay = 'global-layout'; }

                                foreach ( $kiddies_header_overlay_options as $key => $kiddies_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="kiddies_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $kiddies_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $kiddies_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>
<!-- 
                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php //esc_html_e('Navigation Setting','kiddies'); ?></h3>

                        <?php //$twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php //esc_html_e( 'Navigation Type','kiddies' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php //if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php //esc_html_e('Global Layout','kiddies'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php //esc_html_e('Disable Navigation','kiddies'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php //esc_html_e('Next Previous Navigation','kiddies'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php //esc_html_e('Ajax Load Next 3 Posts Contents','kiddies'); ?></option>

                            </select>

                        </div>
                    </div> -->

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $kiddies_ed_post_views = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_views', true ) );
                    $kiddies_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_read_time', true ) );
                    $kiddies_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_like_dislike', true ) );
                    $kiddies_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_author_box', true ) );
                    $kiddies_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_social_share', true ) );
                    $kiddies_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_reaction', true ) );
                    $kiddies_ed_post_rating = esc_html( get_post_meta( $post->ID, 'kiddies_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','kiddies'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-views" name="kiddies_ed_post_views" value="1" <?php if( $kiddies_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-views"><?php esc_html_e( 'Disable Post Views','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-read-time" name="kiddies_ed_post_read_time" value="1" <?php if( $kiddies_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-like-dislike" name="kiddies_ed_post_like_dislike" value="1" <?php if( $kiddies_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-author-box" name="kiddies_ed_post_author_box" value="1" <?php if( $kiddies_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-social-share" name="kiddies_ed_post_social_share" value="1" <?php if( $kiddies_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-reaction" name="kiddies_ed_post_reaction" value="1" <?php if( $kiddies_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','kiddies' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="kiddies-ed-post-rating" name="kiddies_ed_post_rating" value="1" <?php if( $kiddies_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="kiddies-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','kiddies' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'kiddies_save_post_meta' );

if( ! function_exists( 'kiddies_save_post_meta' ) ):

    function kiddies_save_post_meta( $post_id ) {

        global $post, $kiddies_post_sidebar_fields, $kiddies_post_layout_options, $kiddies_header_overlay_options,  $kiddies_page_layout_options;

        if ( !isset( $_POST[ 'kiddies_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kiddies_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $kiddies_post_sidebar_fields as $kiddies_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'kiddies_post_sidebar_option', true ) ); 
                $new = isset( $_POST['kiddies_post_sidebar_option'] ) ? kiddies_sanitize_sidebar_option_meta( wp_unslash( $_POST['kiddies_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'kiddies_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'kiddies_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? kiddies_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $kiddies_post_layout_options as $kiddies_post_layout_option ) {  
            
            $kiddies_post_layout_old = esc_html( get_post_meta( $post_id, 'kiddies_post_layout', true ) ); 
            $kiddies_post_layout_new = isset( $_POST['kiddies_post_layout'] ) ? kiddies_sanitize_post_layout_option_meta( wp_unslash( $_POST['kiddies_post_layout'] ) ) : '';

            if ( $kiddies_post_layout_new && $kiddies_post_layout_new != $kiddies_post_layout_old ){

                update_post_meta ( $post_id, 'kiddies_post_layout', $kiddies_post_layout_new );

            }elseif( '' == $kiddies_post_layout_new && $kiddies_post_layout_old ) {

                delete_post_meta( $post_id,'kiddies_post_layout', $kiddies_post_layout_old );

            }
            
        }



        foreach ( $kiddies_header_overlay_options as $kiddies_header_overlay_option ) {  
            
            $kiddies_header_overlay_old = esc_html( get_post_meta( $post_id, 'kiddies_header_overlay', true ) ); 
            $kiddies_header_overlay_new = isset( $_POST['kiddies_header_overlay'] ) ? kiddies_sanitize_header_overlay_option_meta( wp_unslash( $_POST['kiddies_header_overlay'] ) ) : '';

            if ( $kiddies_header_overlay_new && $kiddies_header_overlay_new != $kiddies_header_overlay_old ){

                update_post_meta ( $post_id, 'kiddies_header_overlay', $kiddies_header_overlay_new );

            }elseif( '' == $kiddies_header_overlay_new && $kiddies_header_overlay_old ) {

                delete_post_meta( $post_id,'kiddies_header_overlay', $kiddies_header_overlay_old );

            }
            
        }


        $kiddies_ed_post_views_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_views', true ) ); 
        $kiddies_ed_post_views_new = isset( $_POST['kiddies_ed_post_views'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_views'] ) ) : '';

        if ( $kiddies_ed_post_views_new && $kiddies_ed_post_views_new != $kiddies_ed_post_views_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_views', $kiddies_ed_post_views_new );

        }elseif( '' == $kiddies_ed_post_views_new && $kiddies_ed_post_views_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_views', $kiddies_ed_post_views_old );

        }



        $kiddies_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_read_time', true ) ); 
        $kiddies_ed_post_read_time_new = isset( $_POST['kiddies_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_read_time'] ) ) : '';

        if ( $kiddies_ed_post_read_time_new && $kiddies_ed_post_read_time_new != $kiddies_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_read_time', $kiddies_ed_post_read_time_new );

        }elseif( '' == $kiddies_ed_post_read_time_new && $kiddies_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_read_time', $kiddies_ed_post_read_time_old );

        }



        $kiddies_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_like_dislike', true ) ); 
        $kiddies_ed_post_like_dislike_new = isset( $_POST['kiddies_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_like_dislike'] ) ) : '';

        if ( $kiddies_ed_post_like_dislike_new && $kiddies_ed_post_like_dislike_new != $kiddies_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_like_dislike', $kiddies_ed_post_like_dislike_new );

        }elseif( '' == $kiddies_ed_post_like_dislike_new && $kiddies_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_like_dislike', $kiddies_ed_post_like_dislike_old );

        }



        $kiddies_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_author_box', true ) ); 
        $kiddies_ed_post_author_box_new = isset( $_POST['kiddies_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_author_box'] ) ) : '';

        if ( $kiddies_ed_post_author_box_new && $kiddies_ed_post_author_box_new != $kiddies_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_author_box', $kiddies_ed_post_author_box_new );

        }elseif( '' == $kiddies_ed_post_author_box_new && $kiddies_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_author_box', $kiddies_ed_post_author_box_old );

        }



        $kiddies_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_social_share', true ) ); 
        $kiddies_ed_post_social_share_new = isset( $_POST['kiddies_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_social_share'] ) ) : '';

        if ( $kiddies_ed_post_social_share_new && $kiddies_ed_post_social_share_new != $kiddies_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_social_share', $kiddies_ed_post_social_share_new );

        }elseif( '' == $kiddies_ed_post_social_share_new && $kiddies_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_social_share', $kiddies_ed_post_social_share_old );

        }



        $kiddies_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_reaction', true ) ); 
        $kiddies_ed_post_reaction_new = isset( $_POST['kiddies_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_reaction'] ) ) : '';

        if ( $kiddies_ed_post_reaction_new && $kiddies_ed_post_reaction_new != $kiddies_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_reaction', $kiddies_ed_post_reaction_new );

        }elseif( '' == $kiddies_ed_post_reaction_new && $kiddies_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_reaction', $kiddies_ed_post_reaction_old );

        }



        $kiddies_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'kiddies_ed_post_rating', true ) ); 
        $kiddies_ed_post_rating_new = isset( $_POST['kiddies_ed_post_rating'] ) ? absint( wp_unslash( $_POST['kiddies_ed_post_rating'] ) ) : '';

        if ( $kiddies_ed_post_rating_new && $kiddies_ed_post_rating_new != $kiddies_ed_post_rating_old ){

            update_post_meta ( $post_id, 'kiddies_ed_post_rating', $kiddies_ed_post_rating_new );

        }elseif( '' == $kiddies_ed_post_rating_new && $kiddies_ed_post_rating_old ) {

            delete_post_meta( $post_id,'kiddies_ed_post_rating', $kiddies_ed_post_rating_old );

        }

        foreach ( $kiddies_page_layout_options as $kiddies_post_layout_option ) {  
        
            $kiddies_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'kiddies_page_layout', true ) ); 
            $kiddies_page_layout_new = isset( $_POST['kiddies_page_layout'] ) ? kiddies_sanitize_post_layout_option_meta( wp_unslash( $_POST['kiddies_page_layout'] ) ) : '';

            if ( $kiddies_page_layout_new && $kiddies_page_layout_new != $kiddies_page_layout_old ){

                update_post_meta ( $post_id, 'kiddies_page_layout', $kiddies_page_layout_new );

            }elseif( '' == $kiddies_page_layout_new && $kiddies_page_layout_old ) {

                delete_post_meta( $post_id,'kiddies_page_layout', $kiddies_page_layout_old );

            }
            
        }

        $kiddies_ed_header_overlay_old = absint( get_post_meta( $post_id, 'kiddies_ed_header_overlay', true ) ); 
        $kiddies_ed_header_overlay_new = isset( $_POST['kiddies_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['kiddies_ed_header_overlay'] ) ) : '';

        if ( $kiddies_ed_header_overlay_new && $kiddies_ed_header_overlay_new != $kiddies_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'kiddies_ed_header_overlay', $kiddies_ed_header_overlay_new );

        }elseif( '' == $kiddies_ed_header_overlay_new && $kiddies_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'kiddies_ed_header_overlay', $kiddies_ed_header_overlay_old );

        }

    }

endif;   