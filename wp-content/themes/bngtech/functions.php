<?php
/**
 * bngtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bngtech
 */

if ( ! function_exists( 'bngtech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bngtech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bngtech, use a find and replace
		 * to change 'bngtech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bngtech', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'bngtech' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bngtech_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Enable custom header
		add_theme_support('custom-header');
		


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );


		add_image_size( 'bngtech-case-details', 1170, 600, array('center','center') );
		add_image_size( 'bngtech-post-thumb', 500, 350, array('center','center') );
		add_image_size( 'bngtech-case-thumb', 700, 544, array('center','center') );
		add_image_size( 'bngtech-service-thumb', 430, 275, array('center','center') );
	}
endif;
add_action( 'after_setup_theme', 'bngtech_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bngtech_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bngtech_content_width', 640 );
}
add_action( 'after_setup_theme', 'bngtech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bngtech_widgets_init() {

	$footer_style_2_switch = get_theme_mod('footer_style_2_switch', true );
	$footer_style_3_switch = get_theme_mod('footer_style_3_switch', true );
	$footer_style_4_switch = get_theme_mod('footer_style_4_switch', true );

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bngtech' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget__title mb-30">',
		'after_title'   => '</h3>',
	) );

	$footer_widgets = get_theme_mod('footer_widget_number', 4);


	for( $num=1; $num <= $footer_widgets; $num++ ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer '. $num, 'bngtech'),
			'id'            => 'footer-'. $num,
			'description'   => esc_html__( 'Footer '. $num, 'bngtech' ),
			'before_widget' => '<div id="%1$s" class="footer__widget footer__widget--2 footer__widget--3 mb-40 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title mb-30">',
			'after_title'   => '</h4>',
		) );			
	}


	// footer 2
	if ( $footer_style_2_switch ) {
		for( $num=1; $num <= $footer_widgets - 1; $num++ ) {

			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 2: '. $num, 'bngtech'),
				'id'            => 'footer-2-'. $num,
				'description'   => esc_html__( 'Footer Style 2: '. $num, 'bngtech' ),
				'before_widget' => '<div id="%1$s" class="footer__widget footer__widget--2 mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}

	// footer 3
	if ( $footer_style_3_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__(  'Footer Style 3: '. $num, 'bngtech'),
				'id'            => 'footer-3-'. $num,
				'description'   => esc_html__( 'Footer Style 3: '. $num, 'bngtech' ),
				'before_widget' => '<div id="%1$s" class="footer__widget mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}	

	// footer 4
	if ( $footer_style_4_switch ) {
		for( $num=1; $num <= $footer_widgets - 1; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__(  'Footer Style 4: '. $num, 'bngtech'),
				'id'            => 'footer-4-'. $num,
				'description'   => esc_html__( 'Footer Style 4: '. $num, 'bngtech' ),
				'before_widget' => '<div id="%1$s" class="footer__widget mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}	

	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'bngtech' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'bngtech' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);	

	/**
	* Portfolio Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Portfolio Sidebar', 'bngtech' ),
			'id' 			=> 'portfolio-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'bngtech' ),
			'before_title' 	=> '<div class="widget-title-box mb-30"><h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);	

	/**
	* Offer Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Offer Sidebar', 'bngtech' ),
			'id' 			=> 'offer-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Offer Details Sidebar.', 'bngtech' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

	/**
	* FAQ Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'FAQ Sidebar', 'bngtech' ),
			'id' 			=> 'faq-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on FAQ Details Sidebar.', 'bngtech' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);


}
add_action( 'widgets_init', 'bngtech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define('BNGTECH_THEME_DIR', get_template_directory());
define('BNGTECH_THEME_URI', get_template_directory_uri());
define('BNGTECH_THEME_CSS_DIR', BNGTECH_THEME_URI . '/assets/css/');
define('BNGTECH_THEME_JS_DIR', BNGTECH_THEME_URI . '/assets/js/');
define('BNGTECH_THEME_INC', BNGTECH_THEME_DIR . '/inc/');

/** 
 * bngtech_scripts description
 * @return [type] [description]
 */
function bngtech_scripts() {
	/**
	* all css files
	*/
	wp_enqueue_style( 'bngtech-fonts', bngtech_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'bootstrap', BNGTECH_THEME_CSS_DIR.'bootstrap.min.css', array() );
	wp_enqueue_style( 'animate', BNGTECH_THEME_CSS_DIR.'animate.min.css', array() );
	wp_enqueue_style( 'fontawesome-pro', BNGTECH_THEME_CSS_DIR.'fontawesome.pro.min.css', array() );
	wp_enqueue_style( 'flaticon', BNGTECH_THEME_CSS_DIR.'flaticon.css', array() );
	wp_enqueue_style( 'lightcase', BNGTECH_THEME_CSS_DIR.'lightcase.css', array() );
	wp_enqueue_style( 'meanmenu', BNGTECH_THEME_CSS_DIR.'meanmenu.css', array() );
	wp_enqueue_style( 'jquery-ui', BNGTECH_THEME_CSS_DIR.'jquery-ui.min.css', array() );
	wp_enqueue_style( 'nice-select', BNGTECH_THEME_CSS_DIR.'nice-select.css', array() );
	wp_enqueue_style( 'owl-carousel', BNGTECH_THEME_CSS_DIR.'owl.carousel.min.css', array() );
	wp_enqueue_style( 'slick', BNGTECH_THEME_CSS_DIR.'slick.css', array() );
	wp_enqueue_style( 'magnific-popup', BNGTECH_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'bngtech-core', BNGTECH_THEME_CSS_DIR.'bngtech-core.css', array() );
	wp_enqueue_style( 'bngtech-unit', BNGTECH_THEME_CSS_DIR.'bngtech-unit.css', array() );
	wp_enqueue_style( 'bngtech-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bngtech-responsive', BNGTECH_THEME_CSS_DIR.'responsive.css', array() );

	$my_current_lang = apply_filters( 'wpml_current_language', NULL );
	$rtl_enable =get_theme_mod( 'rtl_switch',false);
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
		wp_enqueue_style( 'bngtech-rtl', BNGTECH_THEME_CSS_DIR . 'rtl.css', array() );
		wp_enqueue_style( 'bngtech-responsive-rtl', BNGTECH_THEME_CSS_DIR . 'responsive-rtl.css', array() );
	}


	// all js
	wp_enqueue_script( 'popper', BNGTECH_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', BNGTECH_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'counterup', BNGTECH_THEME_JS_DIR.'counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'circle-progress', BNGTECH_THEME_JS_DIR.'circle-progress.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'isotope-pkgd', BNGTECH_THEME_JS_DIR.'isotope.pkgd.min.js', array('imagesloaded'), false, true );
	wp_enqueue_script( 'slick', BNGTECH_THEME_JS_DIR.'slick.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-meanmenu', BNGTECH_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-nice-select', BNGTECH_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-scrollup', BNGTECH_THEME_JS_DIR.'jquery.scrollUp.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'lightcase', BNGTECH_THEME_JS_DIR.'lightcase.js', array('jquery'), false, true );
	wp_enqueue_script( 'owl-carousel', BNGTECH_THEME_JS_DIR.'owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'waypoint', BNGTECH_THEME_JS_DIR.'waypoint.js', array('jquery'), false, true );
	wp_enqueue_script( 'tilt-jquery', BNGTECH_THEME_JS_DIR.'tilt.jquery.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-appear', BNGTECH_THEME_JS_DIR.'js_jquery.appear.js', array('jquery'), false, true );
	wp_enqueue_script( 'tijs-jquery-knob', BNGTECH_THEME_JS_DIR.'js_jquery.knob.js', array('jquery'), false, true );
	wp_enqueue_script( 'magnific-popup', BNGTECH_THEME_JS_DIR.'magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'wow', BNGTECH_THEME_JS_DIR.'wow.min.js', array('jquery'), false, true );

	if ( $my_current_lang  != 'en' && $rtl_enable ) {
		wp_enqueue_script( 'bngtech-rtl-main', BNGTECH_THEME_JS_DIR.'rtl-main.js', array('jquery'), false, true );
	}
	else {
		wp_enqueue_script( 'bngtech-rtl-main', BNGTECH_THEME_JS_DIR.'main.js', array('jquery'), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'bngtech_scripts' );

/*
Register Fonts
*/
function bngtech_fonts_url() {
	$bngtech_fonts_url = get_theme_mod( 'bngtech_fonts_url',"Roboto:300,400,500,700,900");
	$bngtech_fonts_url_rtl = get_theme_mod( 'bngtech_fonts_url_rtl',"Roboto:300,400,500,700,900");
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
	$my_current_lang = apply_filters( 'wpml_current_language', NULL );
	$rtl_enable =get_theme_mod( 'rtl_switch',false);

    if ( $my_current_lang  != 'en' && $rtl_enable &&  'off' !== _x( 'on', 'Google font: on or off', 'bngtech' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $bngtech_fonts_url_rtl ), "//fonts.googleapis.com/css" );
    }
    elseif(  'off' !== _x( 'on', 'Google font: on or off', 'bngtech' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $bngtech_fonts_url ), "//fonts.googleapis.com/css" );
    }
    return $font_url;

}


// wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
            do_action( 'wp_body_open' );
    }
}



/**
 * Implement the Custom Header feature.
 */
require BNGTECH_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BNGTECH_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require BNGTECH_THEME_INC . 'template-helper.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BNGTECH_THEME_INC . 'jetpack.php';
}

/**
* include bngtech functions file
*/
require_once BNGTECH_THEME_INC . 'class-breadcrumb.php';
require_once BNGTECH_THEME_INC . 'class-navwalker.php';
require_once BNGTECH_THEME_INC . 'class-customizer.php';
require_once BNGTECH_THEME_INC . 'customizer_data.php';
require_once BNGTECH_THEME_INC . 'class-tgm-plugin-activation.php';
require_once BNGTECH_THEME_INC . 'add_plugin.php';



/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bngtech_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bngtech_pingback_header' );


/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'bngtech_comment_form_default_fields_func');

function bngtech_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
    <div class="col-xl-6">
    	<div class="contacts-name">
        	<input type="text" name="author" placeholder="'.esc_attr__('Your name *','bngtech').'">
        </div>
    </div>';
	$default['email'] = '<div class="col-xl-6">
		<div class="contacts-email ">
        <input type="text" name="email" placeholder="'.esc_attr__('Your email *','bngtech').'">
    	</div>
    </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
	<div class="contacts-message">
     <textarea id="comment" name="comment" cols="30" rows="10" placeholder="'.esc_attr__('Comments *','bngtech').'"></textarea>
    </div>';
	return $default;
}

add_filter('comment_form_defaults', 'bngtech_comment_form_defaults_func');

function bngtech_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	}else {
		$info['comment_field'] = '<div class="comments-textarea contacts-message contact-icon"><textarea id="comment" name="comment" cols="30" rows="10" placeholder="'.esc_attr__('Comments *','bngtech').'"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="site-btn boxed yellow" type="submit"><i class="fal fa-comments"></i> '.esc_html__('Post Comment','bngtech').' </button>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('bngtech_comment') ) {
	function bngtech_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fas fa-reply-all"></i> Reply';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}



/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'bngtech_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function bngtech_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}


// bngtech_search_filter_form
if( !function_exists('bngtech_search_filter_form')) {
  function bngtech_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar-form"><form class="sidebar-search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/') ),
		esc_attr( get_search_query() ),
		esc_html__('Search','bngtech')
	);

    return $form;
  }
  add_filter( 'get_search_form','bngtech_search_filter_form');
}

add_action('admin_enqueue_scripts', 'bngtech_admin_custom_scripts');

function bngtech_admin_custom_scripts() {
	wp_enqueue_media();
	wp_register_script('bngtech-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('bngtech-admin-custom');
}


