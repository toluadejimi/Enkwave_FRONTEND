<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bngtech
 */

/**
*
* bngtech header
*/

function bngtech_check_header() {
    $bngtech_header_style = function_exists('get_field') ? get_field( 'header_style' ) : NULL;
    $bngtech_default_header_style = get_theme_mod('choose_default_header', 'header-style-1' );

    if( $bngtech_header_style == 'header-style-1' ) {
        bngtech_header_style_1();
    }
    elseif( $bngtech_header_style == 'header-style-2' ) {
        bngtech_header_style_2();
    }  
    elseif( $bngtech_header_style == 'header-style-3' ) {
        bngtech_header_style_3();
    }  
    else {
        
        /** default header style **/
        if($bngtech_default_header_style == 'header-style-2') {
            bngtech_header_style_2();
        }
        elseif($bngtech_default_header_style == 'header-style-3') {
            bngtech_header_style_3();
        }
        else {
            bngtech_header_style_1();
        }
    }

}
add_action('bngtech_header_style', 'bngtech_check_header', 10);

/**
* header style 1 + default
*/

function bngtech_header_style_1() {
    $bngtech_topbar_switch = get_theme_mod('bngtech_topbar_switch', false);
    $bngtech_show_header_search = get_theme_mod('bngtech_show_header_search' , false);
    $bngtech_show_lang = get_theme_mod('bngtech_show_lang', false);
    $bngtech_show_button = get_theme_mod('bngtech_show_button', false);
    $bngtech_header_right = get_theme_mod('bngtech_header_right', false);
    $bngtech_show_header_cta = get_theme_mod('bngtech_show_header_cta', false);

    $bngtech_cta_label = get_theme_mod('bngtech_cta_label',  __('Have Any Questions? ','bngtech'));
    $bngtech_cta_phone = get_theme_mod('bngtech_cta_phone',  __('+2-300-521-362','bngtech'));

    // top left
    $bngtech_mail_id = get_theme_mod('bngtech_mail_id', __('info@webmail.com','bngtech'));
    $bngtech_mail_url = get_theme_mod('bngtech_mail_url', __('#','bngtech'));
    $bngtech_phone = get_theme_mod('bngtech_phone', __('+876 864 764 764','bngtech'));
    $bngtech_phone_url = get_theme_mod('bngtech_phone_url', __('tel:876864764764','bngtech'));
    $bngtech_address = get_theme_mod('bngtech_address', __('12/A, Mirnada City Tower, NYC','bngtech'));
    $bngtech_info_text = get_theme_mod('bngtech_info_text', __('Open Hours of City Government Mon - Fri: 8.00 am - 6.00 pm, NYC','bngtech'));

    // top right
    $bngtech_support = get_theme_mod('bngtech_support', __('Support','bngtech'));
    $bngtech_support_url = get_theme_mod('bngtech_support_url', __('#','bngtech'));
    $bngtech_terms = get_theme_mod('bngtech_terms', __('Terms & Coditions','bngtech'));
    $bngtech_terms_url = get_theme_mod('bngtech_terms_url', __('#','bngtech'));

    // menu collum
    $bngtech_menu_col =  $bngtech_header_right ? 'col-xl-6 col-lg-7' : 'col-xl-9 col-lg-10';
    $bngtech_menu_right =  $bngtech_header_right ? '' : 'text-right';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bngtech_button_text_rtl', __('Get A Quote','bngtech'));
     }
    else { 
        $btn_text = get_theme_mod('bngtech_button_text', __('Get A Quote','bngtech'));
    }
    
    $btn_link = get_theme_mod('bngtech_button_link',  __('#','bngtech'));    
 
    ?>
    <!-- header start -->
    <header class="header header-default">
        <?php if(!empty($bngtech_topbar_switch)) : ?>
        <div class="header__top">
            <div class="container-fluid">
                 <div class="row align-items-center">
                     <div class="col-xl-5 col-lg-7 col-md-12">
                         <div class="header__top--info">
                             <ul>
                                 <?php if(!empty($bngtech_mail_id)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_mail_url); ?>"><span class="icon"><i class="fal fa-envelope"></i></span> <?php echo esc_html($bngtech_mail_id); ?></a></li>
                                 <?php endif; ?>
                                 <?php if(!empty($bngtech_phone)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_phone_url); ?>"><span class="icon"><i class="fal fa-phone"></i></span> <?php echo esc_html($bngtech_phone); ?></a></li>
                                 <?php endif; ?>
                             </ul>
                         </div>
                     </div>
                     <div class="col-xl-7 col-lg-5 col-md-12">
                        <div class="header__top--info--right">
                            <?php if(!empty($bngtech_info_text)) : ?>
                            <div class="top-cta text-center text-md-right">
                                <span><?php echo bngtech_kses_intermediate($bngtech_info_text); ?></span>
                            </div>
                            <?php endif; ?>
                            <div class="header_social__icons d-none d-xl-block">
                                <?php bngtech_header_social_profiles(); ?>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="navarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 my-auto">
                        <div class="header__logo">
                            <?php bngtech_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9">
                        <div class="header__menu f-left <?php print esc_attr($bngtech_menu_right); ?>">
                            <nav id="mobile-menu">
                                <?php bngtech_header_menu(); ?>
                            </nav>
                        </div>
                        <div class="navarea__right d-none d-lg-block f-right ">
                            <?php if( !empty($bngtech_show_button) ): ?>
                            <div class="btn-right f-right">
                                <a href="<?php print esc_attr( $btn_link ); ?>" class="site-btn">
                                    <?php print esc_html($btn_text); ?> <span>+</span>
                                </a>
                            </div>
                            <?php endif;  ?>

                            <?php if(!empty($bngtech_show_header_cta)) : ?>
                            <div class="header-cta-info f-right">
                                <div class="header-cta-icon">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="header-cta-text">
                                    <span class="primary-color"><?php echo esc_html($bngtech_cta_label); ?> </span>
                                    <h5><?php echo esc_html($bngtech_cta_phone); ?></h5>
                                </div>
                            </div>
                            <?php endif;  ?>

                            <?php if(!empty($bngtech_show_header_search)) : ?>
                            <div class="search-right f-right">
                                <button class="search-trigger">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                            <?php endif;  ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    
<?php 
}

/**
* header style 2 
*/
function bngtech_header_style_2() {
    // top left
    $bngtech_mail_id = get_theme_mod('bngtech_mail_id', __('info@webmail.com','bngtech'));
    $bngtech_mail_url = get_theme_mod('bngtech_mail_url',__('#','bngtech'));
    $bngtech_phone = get_theme_mod('bngtech_phone',__('+876 864 764 764','bngtech'));
    $bngtech_phone_url = get_theme_mod('bngtech_phone_url',__('tel:876864764764','bngtech'));
    $bngtech_address = get_theme_mod('bngtech_address',__('12/A, Mirnada City Tower, NYC','bngtech'));

    $bngtech_topbar_switch = get_theme_mod('bngtech_topbar_switch', false);
    $bngtech_cart_hide = get_theme_mod('bngtech_cart_hide', false);
    $bngtech_show_button = get_theme_mod('bngtech_show_button', false);
    $bngtech_show_cta = get_theme_mod('bngtech_show_cta', false);
    $bngtech_hamburger_hide = get_theme_mod('bngtech_hamburger_hide', false);
    $bngtech_show_header_search = get_theme_mod('bngtech_show_header_search' , false);
    $btn_text_from_page = get_post_meta(get_the_ID(), 'button_text_from_page', true);
    $bngtech_info_text = get_theme_mod('bngtech_info_text',__('Are you a Carer, Occupational Therapist or Physiotherapist? Join our Newsletter','bngtech'));

    $bngtech_header_middile =  $bngtech_info_text ? '' : 'bngtech-header-middle';

    $bngtech_header_right = get_theme_mod('bngtech_header_right', false);

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bngtech_button_text_rtl', __('Get A Quote','bngtech'));
    }
    else { 
        $btn_text = get_theme_mod('bngtech_button_text', __('Get A Quote','bngtech'));
    }
    
    $btn_link = get_theme_mod('bngtech_button_link', __('#','bngtech'));

    ?>

    <!-- header start -->
    <header class="header header--2">
        <?php if(!empty($bngtech_topbar_switch)) : ?>
        <div class="header__top header__top--2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-8">
                        <div class="header__top--info header__top--info--2">
                            <ul>
                                 <?php if(!empty($bngtech_mail_id)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_mail_url); ?>"><?php echo esc_html($bngtech_mail_id); ?></a></li>
                                 <?php endif; ?>
                                 <?php if(!empty($bngtech_phone)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_phone_url); ?>"><?php echo esc_html($bngtech_phone); ?></a></li>
                                 <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-4">
                        <div class="header__top--info--right header__top--info--right--2">
                            <div class="lang">
                                <?php bngtech_header_lang_defualt(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;  ?>
        <div class="navarea navarea--2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navarea-wrap">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-4 my-auto">
                                    <div class="header__logo">
                                        <?php bngtech_header_logo(); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7">
                                    <div class="header__menu header__menu--2">
                                        <nav id="mobile-menu">
                                            <?php bngtech_header_menu(); ?>
                                        </nav>
                                        <div class="mobile-menu"></div>
                                    </div>
                                </div>
                                <?php if( !empty($bngtech_header_right) ): ?>
                                <div class="col-xl-3 col-lg-3 col-md-8 my-auto d-none d-xl-block d-lg-block">
                                    <div class="navarea__right">
                                        <?php if( !empty($bngtech_show_button) ): ?>
                                        <a href="<?php print esc_attr( $btn_link ); ?>" class="site-btn">
                                            <?php print esc_html($btn_text); ?> <span>+</span>
                                        </a>
                                        <?php endif;  ?>
                                        <?php if(!empty($bngtech_show_header_search)) : ?>
                                        <button class="search-trigger">
                                            <i class="fal fa-search"></i>
                                        </button>
                                        <?php endif;  ?>
                                    </div>
                                </div>
                                <?php endif;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


<?php 
}
/**
* header style 3
*/
function bngtech_header_style_3() {
    $bngtech_topbar_switch = get_theme_mod('bngtech_topbar_switch', false);
    $bngtech_cart_hide = get_theme_mod('bngtech_cart_hide', false);
    $bngtech_show_button = get_theme_mod('bngtech_show_button', false);
    $bngtech_show_cta = get_theme_mod('bngtech_show_cta', false);
    $bngtech_hamburger_hide = get_theme_mod('bngtech_hamburger_hide', false);
    $bngtech_show_header_search = get_theme_mod('bngtech_show_header_search' , false);
    $btn_text_from_page = get_post_meta(get_the_ID(), 'button_text_from_page', true);
    $bngtech_info_text = get_theme_mod('bngtech_info_text', __('Are you a Carer, Occupational Therapist or Physiotherapist? Join our Newsletter','bngtech'));

    $bngtech_header_middile =  $bngtech_info_text ? '' : 'bngtech-header-middle';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bngtech_button_text_rtl',  __('Appointment','bngtech'));
    }
    else { 
        $btn_text = get_theme_mod('bngtech_button_text',  __('Appointment','bngtech'));
    }
    
    $btn_link = get_theme_mod('bngtech_button_link',  __('#','bngtech'));

    ?>
    <header class="header header--2 header--3">
        <div class="navarea navarea--2 navarea--3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-4 my-auto">
                        <div class="header__logo">
                            <?php bngtech_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="header__menu header__menu--2 header__menu--3">
                            <nav id="mobile-menu">
                                <?php bngtech_header_menu(); ?>
                            </nav>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-8 my-auto d-none d-xl-block d-lg-block">
                        <div class="navarea__right navarea__right--2">
                            <?php if( !empty($bngtech_show_button) ): ?>
                            <a href="<?php print esc_attr( $btn_link ); ?>" class="site-btn">
                                <?php print esc_html($btn_text); ?> <span>+</span>
                            </a>
                            <?php endif;  ?>
                            <button class="search-trigger">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php 
}

/**
* header style 4
*/

function bngtech_header_style_4() {
    $bngtech_topbar_switch = get_theme_mod('bngtech_topbar_switch', false);
    $bngtech_show_header_search = get_theme_mod('bngtech_show_header_search' , false);
    $bngtech_show_lang = get_theme_mod('bngtech_show_lang', false);
    $bngtech_show_button = get_theme_mod('bngtech_show_button', false);
    $bngtech_header_right = get_theme_mod('bngtech_header_right', false);

    // top left
    $bngtech_mail_id = get_theme_mod('bngtech_mail_id', __('info@webmail.com','bngtech'));
    $bngtech_mail_url = get_theme_mod('bngtech_mail_url', __('#','bngtech'));
    $bngtech_phone = get_theme_mod('bngtech_phone', __('+876 864 764 764','bngtech'));
    $bngtech_phone_url = get_theme_mod('bngtech_phone_url', __('tel:876864764764','bngtech'));
    $bngtech_address = get_theme_mod('bngtech_address', __('12/A, Mirnada City Tower, NYC','bngtech'));

    // top right
    $bngtech_support = get_theme_mod('bngtech_support', __('Support','bngtech'));
    $bngtech_support_url = get_theme_mod('bngtech_support_url', __('#','bngtech'));
    $bngtech_terms = get_theme_mod('bngtech_terms', __('Terms & Coditions','bngtech'));
    $bngtech_terms_url = get_theme_mod('bngtech_terms_url', __('#','bngtech'));

    // menu collum
    $bngtech_menu_col =  $bngtech_header_right ? 'col-xl-7 col-lg-7' : 'col-xl-10 col-lg-10';
    $bngtech_menu_right =  $bngtech_header_right ? '' : 'text-right';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bngtech_button_text_rtl', __('Get A Quote','bngtech'));
     }
    else { 
        $btn_text = get_theme_mod('bngtech_button_text', __('Get A Quote','bngtech'));
    }
    
    $btn_link = get_theme_mod('bngtech_button_link',  __('#','bngtech'));    

    if (rtl_enable()) {
        $top_btn_text = get_theme_mod('bngtech_top_btn_rtl',  __('Get Job Feeds','bngtech'));
     }
    else { 
        $top_btn_text = get_theme_mod('bngtech_top_bt',  __('Get Job Feeds','bngtech'));
    }
    
    $top_btn_link = get_theme_mod('bngtech_top_btn_link',  __('#','bngtech'));
 
    ?>
    <!-- header start -->
    <header class="header">
        <?php if(!empty($bngtech_topbar_switch)) : ?>
        <div class="header__top">
            <div class="container-fluid">
                 <div class="row">
                     <div class="col-xl-6 col-lg-7 col-md-12">
                         <div class="header__top--info">
                             <ul>
                                 <?php if(!empty($bngtech_mail_id)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_mail_url); ?>"><span class="icon"><i class="fal fa-envelope"></i></span> <?php echo esc_html($bngtech_mail_id); ?></a></li>
                                 <?php endif; ?>
                                 <?php if(!empty($bngtech_phone)) : ?>
                                 <li><a href="<?php echo esc_url($bngtech_phone_url); ?>"><span class="icon"><i class="fal fa-phone"></i></span> <?php echo esc_html($bngtech_phone); ?></a></li>
                                 <?php endif; ?>
                             </ul>
                         </div>
                     </div>
                     <div class="col-xl-6 col-lg-5 col-md-12">
                        <div class="header__top--info--right">
                            <div class="lang">
                                <?php bngtech_header_lang_defualt(); ?>
                            </div>
                            <?php if( !empty($top_btn_link) ): ?>
                            <a href="<?php print esc_attr( $top_btn_link ); ?>" class="job-btn"><i class="fal fa-briefcase"></i> <?php print esc_html($top_btn_text); ?></a>
                            <?php endif;  ?>
                        </div>
                     </div>
                 </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="navarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-4 my-auto">
                        <div class="header__logo">
                            <?php bngtech_header_logo(); ?>
                        </div>
                    </div>
                    <div class="<?php print esc_attr($bngtech_menu_col); ?>">
                        <div class="header__menu <?php print esc_attr($bngtech_menu_right); ?>">
                            <nav id="mobile-menu">
                                <?php bngtech_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    
                    <?php if( !empty($bngtech_header_right) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-8 my-auto d-none d-xl-block d-lg-block">
                        <div class="navarea__right">
                            <?php if( !empty($bngtech_show_button) ): ?>
                            <a href="<?php print esc_attr( $btn_link ); ?>" class="site-btn">
                                <?php print esc_html($btn_text); ?> <span>+</span>
                            </a>
                            <?php endif;  ?>
                            <?php if(!empty($bngtech_show_header_search)) : ?>
                            <button class="search-trigger">
                                <i class="fal fa-search"></i>
                            </button>
                            <?php endif;  ?>
                        </div>
                    </div>
                    <?php endif;  ?>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    
<?php 
}


/** 
 * [bngtech_header_lang description]
 * @return [type] [description]
 */
function bngtech_header_lang_defualt() {
    $bngtech_header_lang            = get_theme_mod('bngtech_header_lang',false);
    if( $bngtech_header_lang ): ?>

    <div class="lang__icon">
        <a href="#0" class="lang__btn"><?php print esc_html__('English', 'bngtech'); ?> <i class="fal fa-angle-down"></i></a>
        <?php do_action('bngtech_language'); ?>
    </div>

    <?php endif; ?>
<?php 
}


/** 
 * [bngtech_language_list description]
 * @return [type] [description]
 */
function _bngtech_language($mar) {
        return $mar;
}
function bngtech_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="lang__list">';
            foreach($languages as $lan){
                $active = $lan['active']==1?'active':'';
                $mar .= '<li class="'.$active.'"><a href="'.$lan['url'].'">'.$lan['translated_name'].'</a></li>';
            }
        $mar .= '</ul>';
    }else{
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="lang__list">';
            $mar .= '<li><a href="#">'.esc_html__('USA','bngtech').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('UK','bngtech').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('CA','bngtech').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('AU','bngtech').'</a></li>';
        $mar .= ' </ul>';
    }
    print _bngtech_language($mar);
}
add_action('bngtech_language','bngtech_language_list');

// favicon logo
function bngtech_favicon_logo_func() {
    $bngtech_favicon = get_template_directory_uri() . '/assets/images/logo/favicon.ico';
    $bngtech_favicon_url = get_theme_mod('favicon_url', $bngtech_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $bngtech_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'bngtech_favicon_logo_func');

// header logo
function bngtech_header_logo() {
    ?>
            <?php 
            $bngtech_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
            $bngtech_logo = get_template_directory_uri() . '/assets/images/logo/logo.png';
            $bngtech_logo_white = get_template_directory_uri() . '/assets/images/logo/logo-white.png';

            $bngtech_site_logo = get_theme_mod('logo', $bngtech_logo);
            $bngtech_secondary_logo = get_theme_mod('seconday_logo', $bngtech_logo_white);
            ?>
             
            <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if( !empty($bngtech_logo_on) ) { ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($bngtech_secondary_logo); ?>" alt="<?php print esc_attr('logo','bngtech'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($bngtech_site_logo); ?>" alt="<?php print esc_attr('logo','bngtech'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 


/** 
 * [bngtech_header_social_profiles description]
 * @return [type] [description]
 */
function bngtech_header_social_profiles() {
    $bngtech_topbar_fb_url             = get_theme_mod('bngtech_topbar_fb_url', __('#','bngtech'));
    $bngtech_topbar_twitter_url       = get_theme_mod('bngtech_topbar_twitter_url', __('#','bngtech'));
    $bngtech_topbar_instagram_url      = get_theme_mod('bngtech_topbar_instagram_url', __('#','bngtech'));
    $bngtech_topbar_linkedin_url      = get_theme_mod('bngtech_topbar_linkedin_url', __('#','bngtech'));
    $bngtech_topbar_youtube_url        = get_theme_mod('bngtech_topbar_youtube_url', __('#','bngtech'));
    ?>
        <?php if (!empty($bngtech_topbar_fb_url)): ?>
          <a href="<?php print esc_url($bngtech_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>

        <?php if (!empty($bngtech_topbar_twitter_url)): ?>
            <a href="<?php print esc_url($bngtech_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>

        <?php if (!empty($bngtech_topbar_instagram_url)): ?>
            <a href="<?php print esc_url($bngtech_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>

        <?php if (!empty($bngtech_topbar_linkedin_url)): ?>
            <a href="<?php print esc_url($bngtech_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
        <?php endif; ?>        

        <?php if (!empty($bngtech_topbar_youtube_url)): ?>
            <a href="<?php print esc_url($bngtech_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
<?php 
}


function bngtech_footer_social_profiles() {
    $bngtech_footer_fb_url             = get_theme_mod('bngtech_footer_fb_url', __('#','bngtech'));
    $bngtech_footer_youtube_url       = get_theme_mod('bngtech_footer_youtube_url', __('#','bngtech'));
    $bngtech_footer_linkedin_url      = get_theme_mod('bngtech_footer_linkedin_url', __('#','bngtech'));
    $bngtech_footer_twitter_url        = get_theme_mod('bngtech_footer_twitter_url', __('#','bngtech'));
    $bngtech_footer_instagram_url        = get_theme_mod('bngtech_footer_instagram_url', __('#','bngtech'));
    ?>

    <?php if (!empty($bngtech_footer_fb_url)): ?>
    <a href="<?php print esc_url($bngtech_footer_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
    <?php endif; ?>

    <?php if (!empty($bngtech_footer_youtube_url)): ?>
    <a href="<?php print esc_url($bngtech_footer_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
    <?php endif; ?>

    <?php if (!empty($bngtech_footer_linkedin_url)): ?>
    <a href="<?php print esc_url($bngtech_footer_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
    <?php endif; ?>

    <?php if (!empty($bngtech_footer_twitter_url)): ?>
    <a href="<?php print esc_url($bngtech_footer_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
    <?php endif; ?>

    <?php if (!empty($bngtech_footer_instagram_url)): ?>
    <a href="<?php print esc_url($bngtech_footer_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
    <?php endif; ?>

<?php 
}

/** 
 * [bngtech_header_menu description]
 * @return [type] [description]
 */
function bngtech_header_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

function bngtech_header_3_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
            ));
           ?>
    <?php 
}


/** 
 * [bngtech_footer_menu description]
 * @return [type] [description]
 */
function bngtech_footer_menu() { 
    
    wp_nav_menu(array(
        'theme_location'    => 'footer-menu',
        'menu_class'        => 'm-0',
        'container'         => '',
        'fallback_cb'       => 'Navwalker_Class::fallback',
        'walker'            => new Navwalker_Class
    ));
 
}


/**
*
* bngtech footer
*/
add_action('bngtech_footer_style', 'bngtech_check_footer', 10);

function bngtech_check_footer() {
    $bngtech_footer_style = function_exists('get_field') ? get_field( 'footer_style' ) : NULL;
    $bngtech_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1' );
   

    if( $bngtech_footer_style == 'footer-style-1' ) {
        bngtech_footer_style_1();
    }    
    elseif( $bngtech_footer_style == 'footer-style-2' ) {
        bngtech_footer_style_2();
    }    
    elseif( $bngtech_footer_style == 'footer-style-3' ) {
        bngtech_footer_style_3();
    }elseif( $bngtech_footer_style == 'footer-style-4' ) {
        bngtech_footer_style_4();
    }
    else{

        /** default footer style **/
        if($bngtech_default_footer_style == 'footer-style-2') {
           bngtech_footer_style_2();
        }        
        elseif($bngtech_default_footer_style == 'footer-style-3') {
           bngtech_footer_style_3();
        }
        elseif($bngtech_default_footer_style == 'footer-style-4') {
           bngtech_footer_style_4();
        }
        else {
            bngtech_footer_style_1();
        }

    }
}

/**
* footer  style_defaut
*/
function bngtech_footer_style_1() {

    $footer_bg_img = get_theme_mod('bngtech_footer_bg');
    $footer_social_switch = get_theme_mod('footer_social_switch');
    $footer_copy_center = $footer_social_switch ? 'col-md-7' : 'col-xl-12 text-center';
    $bngtech_footer_bg_url_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg') : '';
    $bngtech_footer_bg_color_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bngtech_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bngtech_footer_bg_url_from_page['url']) ? $bngtech_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bngtech_footer_bg_color_from_page) ? $bngtech_footer_bg_color_from_page : $footer_bg_color;   

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-md-6 col-lg-3 footer-1';
        $footer_class[2] = 'col-md-6 col-lg-3 footer-2';
        $footer_class[3] = 'col-md-6 col-lg-3 footer-3';
        $footer_class[4] = 'col-md-6 col-lg-3 footer-4';
        break;
        default:
        $footer_class = 'col-md-6 col-lg-3';
        break;
    }  

?>

    <!-- footer area start -->
    <footer class="site__footer site__footer--2 site__footer--3 footer-default">
        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') ): ?>
        <div class="footer-1-area pt-90 pb-50" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
            <div class="container">
                <div class="row">
                        <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-md-6 col-lg-3 footer-1">';
                            dynamic_sidebar( 'footer-1');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3 footer-2">';
                            dynamic_sidebar( 'footer-2');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3 footer-3">';
                            dynamic_sidebar( 'footer-3');
                            print '</div>'; 

                            print '<div class="col-md-6 col-lg-3 footer-4">';
                            dynamic_sidebar( 'footer-4');
                            print '</div>';       
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-'. $num );
                                print '</div>';
                            }  
                        }

                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="copyright__area copyright__area--2">
            <div class="container">
                <div class="row">
                    <div class="<?php print esc_attr($footer_copy_center); ?>">
                        <div class="copyright-text">
                            <p><?php print bngtech_copyright_text(); ?></p>
                        </div>
                    </div>

                    <?php if (!empty($footer_social_switch)) : ?>
                    <div class="col-md-5">
                        <div class="footer-social text-center text-md-right">
                            <?php bngtech_footer_social_profiles(); ?>
                        </div>
                    </div> 
                    <?php endif; ?> 

                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
<?php 
}

/**
* footer  style 2
*/
function bngtech_footer_style_2() {
    $footer_bg_img = get_theme_mod('bngtech_footer_bg');
    $bngtech_footer_bg_url_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg') : '';
    $bngtech_footer_bg_color_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bngtech_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bngtech_footer_bg_url_from_page['url']) ? $bngtech_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bngtech_footer_bg_color_from_page) ? $bngtech_footer_bg_color_from_page : $footer_bg_color;  

    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-'. $num ) ){
            $footer_columns++;
        }
    }



    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6 col-sm-12';
        $footer_class[2] = 'col-lg-6 col-md-6 col-sm-12';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>

    <footer class="site__footer footer-style-2 site__footer--2 bg-none">
        <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') ): ?>
        <div class="footer-2-area footer-black pt-90 pb-50" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
            <div class="container">
                <div class="row">
                    <?php
                        if ( $footer_columns < 3 ) {
                            print '<div class="col-xl-4 col-lg-6 col-md-5">';
                            dynamic_sidebar( 'footer-2-1');
                            print '</div>';
                        
                            print '<div class="col-xl-4 col-lg-6 col-md-7">';
                            dynamic_sidebar( 'footer-2-2');
                            print '</div>';
                        
                            print '<div class="col-xl-4 col-lg-6">';
                            dynamic_sidebar( 'footer-2-3');
                            print '</div>';
                        }

                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-'. $num );
                                print '</div>';
                            }  
                        }

                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="copyright__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="copyright-text">
                            <div class="row">
                                <div class="col-xl-12 text-center">
                                    <p><?php print bngtech_copyright_text(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 
}


/**
* footer  3
*/
function bngtech_footer_style_3() {

    $footer_bg_img = get_theme_mod('bngtech_footer_bg');
    $bngtech_footer_bg_url_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg') : '';
    $bngtech_footer_bg_color_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bngtech_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bngtech_footer_bg_url_from_page['url']) ? $bngtech_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bngtech_footer_bg_color_from_page) ? $bngtech_footer_bg_color_from_page : $footer_bg_color;    

    $footer_columns = 0;

    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets+1; $num++ ) {
        if ( is_active_sidebar( 'footer-3-'. $num ) ){
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-12';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-sm-6 col-6';
        $footer_class[3] = 'col-xl-4 col-lg-6';       
        case '4':
        $footer_class[1] = 'col-xl-3 col-lg-3 col-md-6';
        $footer_class[2] = 'col-xl-3 col-lg-3 col-md-6 ';
        $footer_class[3] = 'col-xl-3 col-lg-3 col-md-6';
        $footer_class[4] = 'col-xl-3 col-lg-3 col-md-6';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>

    <!-- footer area start -->
    <footer class="site-footer bg_img pt-100 footer-style-3" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <div class="container">
            <div class="row">
                <?php
                    if ( $footer_columns < 4 ) {
                        print '<div class="col-xl-3 col-lg-3 col-md-6">';
                        dynamic_sidebar( 'footer-3-1');
                        print '</div>';
                    
                        print '<div class="col-xl-3 col-lg-3 col-sm-6 col-6">';
                        dynamic_sidebar( 'footer-3-2');
                        print '</div>';
                    
                        print '<div class="col-xl-3 col-lg-3 col-sm-6 col-6 mt-30">';
                        dynamic_sidebar( 'footer-3-3');
                        print '</div>';

                        print '<div class="col-xl-4 col-lg-3 col-md-6">';
                        dynamic_sidebar( 'footer-3-4');
                        print '</div>';

                    }
                    else{
                        for( $num=1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-3-'. $num ) ) continue;
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-3-'. $num );
                            print '</div>';
                        } 
                    }
                ?>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="copyright-text mt-60">
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <p><?php print bngtech_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

<?php 
}


/**
* footer  style_defaut
*/
function bngtech_footer_style_4() {

    $footer_bg_img = get_theme_mod('bngtech_footer_bg');
    $bngtech_footer_bg_url_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg') : '';
    $bngtech_footer_bg_color_from_page = function_exists('get_field') ? get_field('bngtech_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bngtech_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bngtech_footer_bg_url_from_page['url']) ? $bngtech_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bngtech_footer_bg_color_from_page) ? $bngtech_footer_bg_color_from_page : $footer_bg_color;   

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-4-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }  

?>

    <!-- footer area start -->
    <footer class="site__footer site__footer--2 site__footer--3 footer-style-4">
        <?php if ( is_active_sidebar('footer-4-1') OR is_active_sidebar('footer-4-2') OR is_active_sidebar('footer-4-3') ): ?>
        <div class="footer-1-area pt-90 pb-50" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
            <div class="container">
                <div class="row">
                        <?php
                        if ( $footer_columns < 3 ) {     
                            print '<div class="col-xl-4 col-lg-6 col-md-5">';
                            dynamic_sidebar( 'footer-4-1');
                            print '</div>';
                        
                            print '<div class="col-xl-4 col-lg-6 col-md-7">';
                            dynamic_sidebar( 'footer-4-2');
                            print '</div>';
                        
                            print '<div class="col-xl-4 col-lg-6">';
                            dynamic_sidebar( 'footer-4-3');
                            print '</div>';       
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-4-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-4-'. $num );
                                print '</div>';
                            }  
                        }

                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="copyright__area copyright__area--2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="copyright-text">
                            <div class="row">
                                <div class="col-xl-12 text-center">
                                    <p><?php print bngtech_copyright_text(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
<?php 
}



function bngtech_copyright_text(){
    if( rtl_enable() ){
        print get_theme_mod('bngtech_copyright_rtl', esc_html__('Copyright ©2021 BasicTheme. All Rights Reserved','bngtech'));
    }
    else{
       print get_theme_mod('bngtech_copyright', esc_html__('Copyright ©2021 BasicTheme. All Rights Reserved','bngtech'));
    }
    
}



/** 
 * [bngtech_breadcrumb_func description]
 * @return [type] [description]
 */
function bngtech_breadcrumb_func() { 

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog ','bngtech'));
        $breadcrumb_class = 'home_front_page';
        
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog ','bngtech'));
        $breadcrumb_show = 0;

    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts' ) );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_the_title(); 
        else
            $title = get_the_title();
        
    }
    elseif ( is_single() && 'product' == get_post_type() ) { 
        $title = get_theme_mod('breadcrumb_product_details', __('Shop','bngtech'));
    }   
    elseif ( is_single() && 'bdevs-services' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_department_details_rtl','Services');
        else
            $title = get_theme_mod('breadcrumb_department_details','Services');
    }    
    elseif ( is_single() && 'bdevs-doctor' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_doctor_details_rtl', __('Doctor Details','bngtech'));
        else
            $title = get_theme_mod('breadcrumb_doctor_details', __('Doctor Details','bngtech'));

    }    
    elseif ( is_single() && 'bdevs-case_study' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_case_study_details_rtl', __('Gallery','bngtech'));
        else
            $title = get_theme_mod('breadcrumb_case_study_details', __('Gallery','bngtech'));

    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'bngtech' ) . get_search_query();
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'bngtech' );
    }
    elseif ( function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop','Shop ');
    }
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    
    if( empty($is_breadcrumb) && $breadcrumb_show == 1 ) { 

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image') : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';
        $back_title = function_exists('get_field') ? get_field('breadcrumb_back_title') : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if( $hide_bg_img ){
            $bg_img = '';
        }
        else {
          $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;  
        } ?>

        <div class="breadcrumb pt-140 pb-150 bg_img breadcrumb-spacings <?php print esc_attr($breadcrumb_class); ?>" data-overlay="dark" data-opacity="8" data-background="<?php print esc_attr($bg_img);?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="breadcrumb__wrap">
                            <h2 class="breadcrumb-title"><?php echo wp_kses_post( $title );?></h2>
                            <div class="breadcrumb__nav mt-15">
                                <?php bngtech_breadcrumb_callback();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php 
    }
}
add_action('bngtech_before_main_content', 'bngtech_breadcrumb_func');


function bngtech_breadcrumb_callback() {
    $args = array(
        'show_browse'   => false,
        'post_taxonomy' => array( 'product' =>'product_cat' )
    );
    $breadcrumb = new Breadcrumb_Class( $args );
    
    return $breadcrumb->trail();
}


// gru_search_form
function bngtech_search_form() { ?>
        <!-- Modal Search -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fal fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get" action="<?php print esc_url(home_url('/')); ?>" >
                        <div class="search-field-holder">
                            <input type="search" name="s" class="main-search-input" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr('Search Your Keyword...', 'bngtech'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php 
}

add_action('bngtech_before_main_content', 'bngtech_search_form');

/**
*
* pagination
*/
if( !function_exists('bngtech_pagination') ) {

    function _bngtech_pagi_callback($pagination) {
        return $pagination;
    }

    //page navegation
    function bngtech_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print _bngtech_pagi_callback($pagi);
    }
}




// rtl_enable
function rtl_enable(){
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        return true;
    }
    else {
        return false;
    }
}

// header top bg color
function bngtech_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'bngtech_breadcrumb_bg_color','#222');
    wp_enqueue_style( 'bngtech-custom', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('bngtech-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bngtech_breadcrumb_bg_color');

// breadcrumb-spacing top
function bngtech_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'bngtech_breadcrumb_spacing','160px');
    wp_enqueue_style( 'bngtech-custom', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('bngtech-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bngtech_breadcrumb_spacing');

// breadcrumb-spacing bottom
function bngtech_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'bngtech_breadcrumb_bottom_spacing','160px');
    wp_enqueue_style( 'bngtech-custom', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('bngtech-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bngtech_breadcrumb_bottom_spacing');


// scrollup
function bngtech_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'bngtech_scrollup_switch', false);
    wp_enqueue_style( 'bngtech-custom', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('bngtech-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bngtech_scrollup_switch');


// theme color
function bngtech_custom_color(){
    $color_code = get_theme_mod( 'bngtech_color_option','#086ad8');
    wp_enqueue_style( 'bngtech-custom', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".mean-container .mean-nav,.mean-container a.meanmenu-reveal span,.blog-post-tag a:hover,blockquote cite::before,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.sidebar-tad li a:hover, .tagcloud a:hover,.sidebar-search-form button,.widget .widget__title::after,.wpcf7-submit.site-btn,.pricing__lists li:hover .icon,.pricing:hover .pricing__head, .pricing.active .pricing__head,.about__box--4 .nav li a:hover,.about__box--4 .nav li a.active,.whychoose__box--2:hover,.faq-wrap a span::after,.service__box--lists-wrap:hover .icon,.about__wrap--2::after,.progress-bar,.service__box--4:hover .inline-btn::after,.service__box--4 .icon:after, .service__box--4 .icon::before,.timeline__box:hover .content,.timeline__box:hover .year,.team-box .social-links a:hover,.support__box:hover,.exp-dots span,.service__box--3:hover,.about__bg--3 .call-box,.bannerSlide .owl-nav div:hover,.social__icons--list a:hover,.site-btn.transparent:hover,.webmasterpice__box:nth-child(1),.integration__btns .transparent:hover,.faqs .card__body::after,.service__box--2:hover .icon,.header__menu--2 ul li a::after,.blog__date,.testimonials .owl-dots .active,.casestudy__box--content::after, .casestudy__box--content::before,.about__box--item::after,.section__heading--content::after,.site-btn,.header__menu ul li .sub-menu::after,.service__box--lists li:hover .icon{ background: ".$color_code."}";

        $custom_css .= ".mean-container a.meanmenu-reveal,.post-meta a:hover,blockquote::before,.widget ul li a::before,.widget li a:hover,.blog-title:hover,.post-meta span i,.contact__form .form__group label,.pricing__head .price span,.pricing__lists li .icon,.pricing__head .price,.whychoose__box--2 .icon,.portfolio__box .cat a,.portfolio__box .content .transparent span,.feature__box .title span,.service__box--lists-wrap .icon,.service__box--4:hover .inline-btn,.timeline__box:hover .year::after,.support__box .icon i,.author-desination h6,.ot-pricing-table .inner-table .details ul li i,.ot-pricing-table .inner-table h2,.service__box-white .icon i,.about__box--3 .nav li a:hover,.about__box--3 .nav li a.active,.section__heading--content-2 span,.section__heading--content-2 p a,.blog__box .content .cat a,.footer-style-3 .recent-posts-footer .widget-posts-meta i,.blog__box .content .title a:hover,.blog__box .content .cat,.integration__icons--box,.faqs .card__header .btn-link::after,.lang__btn:hover,.lang__list a:hover,.header__top--info ul li a:hover,.navarea__right .search-trigger,.link-btn:hover::after,.footer-social a:hover,.blog__meta span i,.blog__content h2:hover a,.link-btn:hover,.blog__meta span:hover,.blog__meta span:hover,.footer__widget li a::after,.footer__widget li a:hover,.widget-posts-title a:hover,.authore--content .designatin,.casestudy__box--content .sub-title,.video-play,.about__box--icon i,.section__heading--title span,.bannertext > span,.bannertext .heading span,.bannertext h6 span,.section__heading--title-small span,.service__box--lists li .icon,.header-default .header__top--info ul li .icon,.header_social__icons a:hover,.header-cta-icon i,.header-default .navarea__right .search-trigger,.header__menu ul li:hover a,.header__menu ul li .sub-menu li:hover > a{ color: ".$color_code."}";

        $custom_css .= ".mean-container a.meanmenu-reveal,.comment-form textarea:focus,.blog-post-tag a:hover,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.pricing__lists li:hover .icon,.whychoose__box--2:hover,.feature__box:hover,.team-box .social-links a:hover,.timeline__box:hover .year,.support__box:hover,.about-quote,.testimonials__3 .owl-item.center .testimonial,.about__box--3 .nav li a:hover,.about__box--3 .nav li a.active,.section__heading--content-2,.bannertext__3 .buttons .transparent:hover,.cta__area .cta__btns .transparent:hover,.lang__list,.navarea__right .search-trigger:hover{ border-color: ".$color_code."}";
        $custom_css .= ".details__lists--2,.ctn-preloader .animation-preloader .spinner{ border-top-color: ".$color_code."}";
        wp_add_inline_style('bngtech-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bngtech_custom_color');

// bngtech Google font
function bngtech_custom_font() {
    $bngtech_heading_font = get_theme_mod( 'bngtech_heading_font',"Cerebri Sans");
    $bngtech_heading_font_rtl = get_theme_mod( 'bngtech_heading_font_rtl',"Cerebri Sans");
    $bngtech_body_font = get_theme_mod( 'bngtech_body_font',"'Roboto', sans-serif");
    $bngtech_body_font_rtl = get_theme_mod( 'bngtech_body_font_rtl',"'Roboto', sans-serif");

    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    
    wp_enqueue_style( 'bngtech-heading-font', BNGTECH_THEME_CSS_DIR . 'bngtech-custom.css', array());
    $custom_css = '';
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        $custom_css .= "h1,h2,h3,h4,h5,h6{ font-family: " . $bngtech_heading_font_rtl . "}";
        $custom_css .= "body{ font-family: " . $bngtech_body_font_rtl . "}";
    }
    else {
        $custom_css .= "h1,h2,h3,h4,h5,h6{ font-family: " . $bngtech_heading_font . "}";
        $custom_css .= "body{ font-family: " . $bngtech_body_font . "}";
    } 
    wp_add_inline_style('bngtech-heading-font',$custom_css);
}
add_action('wp_enqueue_scripts', 'bngtech_custom_font');




function bngtech_kses_intermediate( $string = '' ) {
    return wp_kses( $string, bngtech_get_allowed_html_tags( 'intermediate' ) );
}


function bngtech_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => []
        ]
    ];

    return $allowed_html;
}