<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "build_app_online";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

       // global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => 'Build app online',
        // Name that appears at the top of your panel
        'display_version'      => '0.0.1',
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Build app online', 'redux-framework' ),
        'page_title'           => __( 'Build app online', 'redux-framework' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        'show_options_object' => false,

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
      
    );



    Redux::setArgs( $opt_name, $args );
   

    // -> Pages
 /*   Redux::setSection( $opt_name, array(
        'title' => __( 'Page Layouts', 'redux-framework' ),
        'id'    => 'opt_page_layout',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Page Layouts', 'redux-framework' ),
        'id'         => 'mstoreapp_page_layout',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'category_page_layout',
                'type'     => 'select',
                'title'    => 'Category Page',
                'subtitle' => 'Select category page layout',
                'options'  => array(
                    'layout1'    => 'Split Layout',
                    'layout2'    => 'List View',
                    'layout3'    => 'List View 2',
                    'layout6'    => 'List View 3',
                    'layout7'    => 'List View 4',
                    'layout8'    => 'List View 5',
                    'layout5'    => 'Split Layout 2',
                    'layout4'    => 'Expandable',
                    'layout9'    => 'Expandable 2',
                ),
                'default'  => 'layout1',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'stores_page_layout',
                'type'     => 'select',
                'title'    => 'Store Page',
                'subtitle' => 'Select store page layout',
                'options'  => array(
                    'layout1'    => 'Grid 1',
                    'layout2'    => 'Grid 2',
                    'layout3'    => 'List View 1',
                    'layout4'    => 'List View 2',
                    'layout5'    => 'List View 3',
                    'layout6'    => 'List View 4',
                    'layout7'    => 'List View 5',
                ),
                'default'  => 'layout1',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'login_page_layout',
                'type'     => 'select',
                'title'    => 'Login Page',
                'subtitle' => 'Select login page layout',
                'options'  => array(
                    'layout1'    => 'Layout 1',
                    'layout2'    => 'Layout 2',
                    'layout3'    => 'Layout 3',
                    'layout4'    => 'Layout 4',
                    'layout5'    => 'Layout 5',
                    'layout6'    => 'Layout 6',
                    'layout7'    => 'Layout 7',
                ),
                'default'  => 'layout1',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'account_page_layout',
                'type'     => 'select',
                'title'    => 'Account Page',
                'subtitle' => 'Select account page layout',
                'options'  => array(
                    'layout1'    => 'Layout 1',
                    'layout2'    => 'Layout 2',
                    'layout3'    => 'Layout 3',
                ),
                'default'  => 'layout1',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'product_page_layout',
                'type'     => 'select',
                'title'    => 'Product Page',
                'subtitle' => 'Select product page layout',
                'options'  => array(
                    'layout1'    => 'Layout 1',
                    'layout2'    => 'Layout 2',
                    'layout3'    => 'Layout 3',
                ),
                'default'  => 'layout1',
                'select2'  => array( 'allowClear' => false )
            ),
        )
    ) );*/





    /*Redux::setSection( $opt_name, array(
        'title' => __( 'Splash Screen', 'redux-framework' ),
        'id'    => 'splash_screen_blocks',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Splash Screen (Supports upto 5 Splash Screen)', 'redux-framework' ),
        'id'         => 'splash_screen_section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'splash_screens',
                'type'        => 'slides',
                'title'       => __( 'Splash Screen', 'redux-framework' ),
                'subtitle' => 'Add Splash Screen',
                'desc'     => __( 'Add Splash Screen. You can upload 5 splash screens. display randomly. It will dsiplay default splsh screen when empty', 'redux-framework' ),
                'placeholder' => array(
                    'title'       => __( 'Title', 'redux-framework' ),
                    'description' => __( 'Description', 'redux-framework' ),
                    'url'         => __( 'Url', 'redux-framework' ),
                ),
            ),
        )
    ) );*/

    // -> Settings
    /*Redux::setSection( $opt_name, array(
        'title' => __( 'Theme', 'redux-framework' ),
        'id'    => 'theme',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-brush'
    ) );

    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme', 'redux-framework' ),
        'id'         => 'mstoreapp_theme',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'primary_swatch',
                'type'     => 'select',
                'title'    => 'Primary Swatch',
                'subtitle' => 'Select Primary Swatch',
                'options'  => array(
                    'Colors.red'    => 'Red',
                    'Colors.pink'    => 'Pink',
                    'Colors.purple'    => 'Purple',
                    'Colors.deepPurple'    => 'Deep Purple',
                    'Colors.indigo'    => 'Indigo',
                    'Colors.blue'    => 'Blue',
                    'Colors.lightBlue'    => 'Light Blue',
                    'Colors.cyan'    => 'Cyan',
                    'Colors.teal'    => 'Teal',
                    'Colors.green'    => 'Green',
                    'Colors.lightGreen'    => 'Light Green',
                    'Colors.lime'    => 'Lime',
                    'Colors.yellow'    => 'Yellow',
                    'Colors.amber'    => 'Amber',
                    'Colors.orange'    => 'Orange',
                    'Colors.deepOrange'    => 'Deep Orange',
                    'Colors.brown'    => 'Brown',
                    'Colors.blueGrey'    => 'Blue Grey',
                ),
                'default'  => 'Colors.blue',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'primary_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'transparent' => false,
                'title'    => __( 'Primary color', 'redux-framework' ),
                'subtitle' => __( 'Choose the Primary color.', 'redux-framework' ),
                'default'  => '#FFFFFF',
                'validate' => 'color',
            ),
            array(
                'id'       => 'accent_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'transparent' => false,
                'title'    => __( 'Accent color', 'redux-framework' ),
                'subtitle' => __( 'Choose the accent color.', 'redux-framework' ),
                'default'  => '#007AFF',
                'validate' => 'color',
            ),
            array(
                'id'       => 'button_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'transparent' => false,
                'title'    => __( 'Button color', 'redux-framework' ),
                'subtitle' => __( 'Choose the button color.', 'redux-framework' ),
                'default'  => '#FFC107',
                'validate' => 'color',
            ),
        )
    ));*/
/*
    // -> Settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Typography', 'redux-framework' ),
        'id'    => 'typography',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-text-width'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Typography', 'redux-framework' ),
        'id'         => 'mstoreapp_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'body_text_1',
                'type' => 'typography',
                'title' => __( 'Body Text 1' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Body Text 1' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'body_text_2',
                'type' => 'typography',
                'title' => __( 'Body Text 2' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Body Text 2' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'subtitle_1',
                'type' => 'typography',
                'title' => __( 'Subtitle 1' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Subtitle 1' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '14', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'subtitle_2',
                'type' => 'typography',
                'title' => __( 'Subtitle 2' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Subtitle 2' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'caption',
                'type' => 'typography',
                'title' => __( 'Caption' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Caption' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '14', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'button',
                'type' => 'typography',
                'title' => __( 'Button' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Button' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '18', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_1',
                'type' => 'typography',
                'title' => __( 'Headline 1' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 1' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_2',
                'type' => 'typography',
                'title' => __( 'Headline 2' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 2' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_3',
                'type' => 'typography',
                'title' => __( 'Headline 3' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 3' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_4',
                'type' => 'typography',
                'title' => __( 'Headline 4' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 4' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_5',
                'type' => 'typography',
                'title' => __( 'Headline 5' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 5' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'headline_6',
                'type' => 'typography',
                'title' => __( 'Headline 6' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Headline 6' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
            array(
                'id' => 'overline',
                'type' => 'typography',
                'title' => __( 'Overline' , 'redux_docs_generator' ),
                'desc' => __( 'Typography for Overline' , 'redux_docs_generator' ),
                'font-style' => true,
                'units' => '',
                'subsets' => false,
                'text-align' => false,
                'font-weight' => true,
                'font-size' => true,
                'font-family' => true,
                'line-height' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'default'     => array(
                    'color'       => '#333333', 
                    'font-style'  => '400', 
                    'font-family' => 'Robot', 
                    'google'      => true,
                    'font-size'   => '16', 
                    'line-height' => '40'
                ),
            ),
        )
    ));*/

    // -> Settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Settings', 'redux-framework' ),
        'id'    => 'settings',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-adjust-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Settings', 'redux-framework' ),
        'id'         => 'mstoreapp_settings',
        'subsection' => true,
        'fields'     => array(
            /*array(
                'id'       => 'is_multivendor',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Multivendor', 'redux-framework' ),
                'subtitle' => __( 'Enable this for multivendod features. Ensure multivendor plugin is active in site', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'home_tab_bar',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Tab Bar in Home page', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to show Tab Bar in Home page', 'redux-framework' ),
                'default'  => true,
            ),
            array(
                'id'       => 'bottom_tab_labels',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable to Show Bottom Tab Labels', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to Show Bottom Tab Labels', 'redux-framework' ),
                'default'  => true,
            ),
            array(
                'id'       => 'add_to_cart_buttons',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable to Show Add to Cart Button in Listing', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to Show Add to Cart button in products listing. Best for Grocery', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footerAddToCartButton',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable to Show Add to Cart Button in Footer', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to Show Add to Cart button in Footer. Best for Grocery', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'home_type',
                'type'     => 'select',
                'title'    => 'Home Layout',
                'subtitle' => 'Select home page',
                'desc' => __( 'Select home page', 'redux-framework' ),
                'options'  => array(
                    'Home1'    => 'Home Layout 1',
                    'Home2'    => 'Home Layout 2',
                    'HomeNearBy'    => 'Home Near By Store (Only for local store with multivendor)',
                ),
                'default'  => 'Home',
                'select2'  => array( 'allowClear' => false )
            ),*/
            /*array(
                'id'       => 'show_latest',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable latest products', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to show latest products on home page', 'redux-framework' ),
                'default'  => true,
            ),
            array(
                'id'       => 'showHomeStoreList',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable to show stores in home page', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to show stores on home page', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'pull_to_refresh',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Pull to refresh', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enable or disable pull to refrsh in app', 'redux-framework' ),
                'default'  => false,
            ),*/
            array(
                'id'       => 'firebase_web_app_api_key',
                'type'     => 'text',
                'title'    => 'Firebase web app api key',
                'subtitle' => 'Enter Firebase web app api key',
                'placeholder' => 'AIza3sfTgf5MP7dSe_UiZXYhDtsOVPpQnxEHTc',
                'default'  => '',
            ),
            array(
                'id'       => 'firebase_server_key',
                'type'     => 'text',
                'title'    => 'Firebase Server Key',
                'subtitle' => 'Enter Firebase Server Key',
                'placeholder' => 'AAAAu8sIWr0:APA91bG15aYz9iKHcsOskRHjduIjslKoDgErWcrNWVBUoOBFhq9QGsPW4m8LDN5EHr16cu_hxTewzkCJcmmSzfJg3EK4MclC85xe3HuTyDjnOeXNdjenHNIuA',
                'default'  => '',
            ),
            array(
                'id'       => 'google_project_id',
                'type'     => 'text',
                'title'    => 'Firebase sender id',
                'subtitle' => 'Enter Firebase Sender id',
                'placeholder' => '807865301719',
                'default'  => '',
            ),
            array(
                'id'       => 'dynamic_link',
                'type'     => 'text',
                'title'    => 'Firebase Dynamic Links URL prefix',
                'subtitle' => 'Enter Firebase Dynamic Links URL prefix',
                'desc'     => 'Create Dynamic Link URL prefix from Firebase',
                'placeholder' => 'https://example.com.page.link',
                'default'  => '',
            ),
            /*array(
                'id'       => 'labels',
                'type'     => 'text',
                'title'    => __( 'Enter product tags to display on product', 'mstoreapp-admin' ),
                'subtitle' => __( 'Any one tag will be displayed on product. if its is attached to product', 'mstoreapp-admin' ),
                'placeholder' => 'New, Hot, Sale, Season',
            ),
            array(
                'id'       => 'popular_searches',
                'type'     => 'text',
                'title'    => __( 'Enter Popular searches to display on search page', 'mstoreapp-admin' ),
                'subtitle' => __( 'Popular searches will apear in search page. so customer can search easily', 'mstoreapp-admin' ),
                'placeholder' => 'hand bags, ladies tops, sofa set, candle',
            ),*/
            /*array(
                'id'       => 'enableReferral',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Refer and earn', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enable or disable Enable Refer and earn. Above dynamic link should be active and working', 'redux-framework' ),
                'default'  => false,
            ),*/
            /*array(
                'id'       => 'onesignal_app_id',
                'type'     => 'text',
                'title'    => 'OneSignal app id',
                'subtitle' => 'Enter OneSignal app id',
                'placeholder' => 'YhDtsOVPpQnxEHTcAIza3sfTgf5MP7dSe_UiZX',
                'default'  => '',
            ),
            array(
                'id'       => 'onesignal_app_rest_api_key',
                'type'     => 'text',
                'title'    => 'OneSignal rest api keys',
                'subtitle' => 'This will allow you to sent notification from WordPress admin panel',
                'placeholder' => 'ZXYhDtsOVPpQn_AIza3sfTgf5MP7dSe_UiZXYhDtsOVPpQnxEHTc',
                'default'  => '',
            ),*/
            array(
                'id'       => 'use_fcm',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Use firebase messaging for notification', 'redux-framework' ),
                'subtitle' => __( 'Enable to use firebase messaging for notification else One Signal is used for notification', 'redux-framework' ),
                'default'  => true,
            ),
            array(
                'id'       => 'send_push_on_product_publish',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Send push on product publish', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to send new push notification when you publsih a new product', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'send_push_on_new_order',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Customer Push Notification for order', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to send push notification to customer for order update and new order', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'vendor_push_on_new_order',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Vendor Push Notification for order', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to send push notification to vendor for order update and new order', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'admin_push_on_new_order',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Admin Push Notification for order', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to send push notification to admin for order update and new order', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'rate_app_ios_id',
                'type'     => 'text',
                'title'    => 'Rate app ios app id',
                'subtitle' => 'Enter Rate app ios app id',
                'default'  => '',
            ),
            array(
                'id'       => 'rate_app_android_id',
                'type'     => 'text',
                'title'    => 'Rate app android app link',
                'subtitle' => 'Enter Rate app android app link',
                'default'  => '',
            ),
            /*array(
                'id'       => 'rate_app_windows_id',
                'type'     => 'text',
                'title'    => 'Rate app windows app id',
                'subtitle' => 'Enter Rate app windows app id',
                'default'  => '',
            ),*/
            array(
                'id'       => 'share_app_android_link',
                'type'     => 'text',
                'title'    => 'Share app android link',
                'subtitle' => 'Enter Share app android link',
                'default'  => '',
            ),
            array(
                'id'       => 'share_app_ios_link',
                'type'     => 'text',
                'title'    => 'Share app ios link',
                'subtitle' => 'Enter Share app ios link',
                'default'  => '',
            ),
            /*array(
                'id'       => 'support_email',
                'type'     => 'text',
                'title'    => 'Support email',
                'subtitle' => 'Enter Support email',
                'validate' => 'email',
                'default'  => '',
            ),*/
            /*array(
                'id'       => 'enable_product_chat',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable product page chat', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enbale chat button in product page', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_home_chat',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable home page chat', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enbale chat button in home page', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'accountChatType',
                'type'     => 'select',
                'title'    => 'Account Chat Type',
                'subtitle' => 'Select Primary Swatch',
                'options'  => array(
                    'whatsapp'    => 'Whatsapp',
                    'call'    => 'Call',
                    'message'    => 'Message',
                    'mail'    => 'Mail',
                    'messenger'    => 'Messenger',
                    'firebaseChat'    => 'Firebase Chat',
                    'circular'    => 'Circular Fab',
                    'none'    => 'None',
                ),
                'default'  => 'whatsapp',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'facebookPage',
                'type'     => 'text',
                'title'    => 'Facebook PAGE NAME',
                'subtitle' => 'Enter Facebook Page PAGE_NAME',
                'desc'     => 'Enter only facebook page name not url',
                'default'  => '',
                'placeholder' => 'page_name',
            ),*/
            array(
                'id'       => 'country_dial_code',
                'type'     => 'text',
                'title'    => 'Default Country Phone Dial Code',
                'subtitle' => 'Enter Default Country Phone Dial Code',
                'validate' => 'text',
                'default'  => '+91',
            ),
            /*array(
                'id'       => 'whatsapp_number',
                'type'     => 'text',
                'title'    => 'Whatsapp number',
                'subtitle' => 'Enter Whatsapp number for chat',
                'validate' => 'text',
                'default'  => '+91XXXXXXXX',
            ),
            array(
                'id'       => 'show_blog',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable blog', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to show blog on account page', 'redux-framework' ),
                'desc'     => __( 'Make sure you install and activate json api plugins <a href="' . 'https://' . 'wordpress.org/plugins/json-api/" target="_blank">' . 'wordpress.org/plugins/json-api</a>', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_wallet',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Wallet', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to add wallet to mobile app', 'redux-framework' ),
                'desc'     => __( 'Make sure you install woo wallet plugin <a href="' . 'https://' . 'wordpress.org/plugins/woo-wallet/" target="_blank">' . 'wordpress.org/plugins/woo-wallet</a>', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_downloads',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Download Products', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enable downloads for downloa products', 'redux-framework' ),
                'desc'     => __( 'Customer will be able to download products from account section', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enableStoreTab',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Store Tab', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to show store tab in mobile app bootom bar', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'geoLocation',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Geo Location', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enable app for location based serice', 'redux-framework' ),
                'desc'     => __( 'Customer will be able to select thier location before shopping', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_refund',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Refund', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to add refund request to mobile app', 'redux-framework' ),
                'desc' => __( 'Make sure you install yith advanced refund plugin (free version) <a href="' . 'https://' . 'yithemes.com/themes/plugins/yith-advanced-refund-system-for-woocommerce/" target="_blank">' . 'yithemes.com/themes/plugins/yith-advanced-refund-system-for-woocommerce</a>', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switchWpml',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'WPML', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable WordPress Multilingual Plugin.', 'redux-framework' ),
                'desc'     => __( 'Make sure you install wpml plugin <a href="' . 'https://' . 'wpml.org/" target="_blank">' . 'wpml.org</a>', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switchCurrrencies',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'WPML Multi Currency', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable WPML Multi Currency.', 'redux-framework' ),
                'desc'     => __( 'Make sure you install wpml plugin and enable multicurrency <a href="' . 'https://' . 'wpml.org/" target="_blank">' . 'wpml.org</a>', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'disableGuestCheckout',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Disable Guest Checkout', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable Guest Checkout.', 'redux-framework' ),
                'desc'     => __( 'This will enable Guest checkout. will be asked to login or register during checkout', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switchWebViewCheckout',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Webview Checkout', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable Webview Checkout.', 'redux-framework' ),
                'desc'     => __( 'This will enable webview checkout. checkout will be proccessed in the webview', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switchRewardPoints',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable or Reard Points', 'redux-framework' ),
                'subtitle' => __( 'WooCommerce  .', 'redux-framework' ),
                'desc'     => __( 'Make sure you install WooCommerce Points and Rewards plugin <a href="' . 'https://' . 'woocommerce.com/products/woocommerce-points-and-rewards/?aff=7531" target="_blank">' . 'https://' . 'woocommerce.com/products/woocommerce-points-and-rewards</a>

', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switchAddons',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable or Product Add-Ons', 'redux-framework' ),
                'subtitle' => __( 'WooCommerce Product Add-Ons.', 'redux-framework' ),
                'desc'     => __( 'Make sure you install Product Add-Ons plugin <a href="' . 'https://' . 'woocommerce.com/products/product-add-ons/?aff=7531" target="_blank">' . 'https://' . 'woocommerce.com/products/product-add-ons</a>', 'redux-framework' ),
                'default'  => false,
            ),*/
        )
    ) );

    // -> Pages
    Redux::setSection( $opt_name, array(
        'title' => __( 'Pages', 'redux-framework' ),
        'id'    => 'opt_pages',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Pages', 'redux-framework' ),
        'id'         => 'mstoreapp_pages',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'pages',
                'type'        => 'slides',
                'title'       => __( 'Pages', 'redux-framework' ),
                'subtitle' => 'Add Pages',
                'desc'     => __( 'This will allow you to add additional pages. Page link will apear on account screen', 'redux-framework' ),
                'placeholder' => array(
                    'title'       => __( 'Name (e.g., About Us, Privacy Policy, Terms & Conditions etc)', 'redux-framework' ),
                    'description' => __( 'Type (e.g., post, page, link)', 'redux-framework' ),
                    'url'         => __( 'Post id or url link ( url when above type is link ) (e.g., 1, https://example.com/privacy-policy)', 'redux-framework' ),
                ),
            ),
        )
    ) );

    /*Redux::setSection( $opt_name, array(
        'title'      => __( 'Geo Location Filter', 'redux-framework' ),
        'id'         => 'geo_location_filter',
        'desc'  => __( 'Geo Location works for location based app only', 'redux-framework' ),
        //'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'switch_geo_location_filter',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable location filter', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable the location filter.', 'redux-framework' ),
                'desc' => __( 'This will allow customer to select address', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switch_store_location_filter',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Store Locations', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable the store location filter.', 'redux-framework' ),
                'desc' => __( 'This will enable to filter store based on geo location', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switch_products_location_filter',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Products Locations', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable the products location filter.', 'redux-framework' ),
                'desc' => __( 'This will enable to filter products based on geo location', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switch_category_location_filter',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Category Locations', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable the categories location filter.', 'redux-framework' ),
                'desc' => __( 'This will enable to filter categories based on geo location', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'distance',
                'type'     => 'text',
                'title'    => 'Distance in km',
                'subtitle' => 'Radius distance to filter',
                'desc' => __( 'This will enable to filter store, products, categories with in the given radius', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 10,
            ),
        )
    ) );*/

/*    // -> Theme
    Redux::setSection( $opt_name, array(
        'title' => __( 'Theme', 'redux-framework' ),
        'id'    => 'theme',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    // -> Dimensions
    Redux::setSection( $opt_name, array(
        'title' => __( 'Dimensions', 'redux-framework' ),
        'id'    => 'dimensions',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Dimensions', 'redux-framework' ),
        'id'         => 'mstoreapp_dimensions',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'imageHeight',
                'type'     => 'text',
                'title'    => 'Product image height ratio',
                'subtitle' => 'Enter in % Product image height ratio',
                'desc' => __( 'Image (height/width) x 100', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 100,
            ),
            array(
                'id'       => 'productSliderWidth',
                'type'     => 'text',
                'title'    => 'Width of product in scroll',
                'subtitle' => 'Enter in % Width of product in scroll',
                'desc' => __( 'This will allow you to adjust width of products (Related, Up-Sell etc)', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 42,
            ),
            array(
                'id'       => 'latestPerRow',
                'type'     => 'select',
                'title'    => 'Latest product per row in home screen',
                'subtitle' => 'Select Latest products per row',
                'desc' => 'This will allow you to set number of product per line on home screen',
                'options'  => array(1 => 1, 2 => 2, 3 => 3, 4 => 4),
                'default'  => 2,
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'productsPerRow',
                'type'     => 'select',
                'title'    => 'Product per row in products screen',
                'subtitle' => 'Select products per row',
                'desc' => 'This will allow you to set number of product per line on products screen',
                'options'  => array(1 => 1, 2 => 2, 3 => 3, 4 => 4),
                'default'  => 2,
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'searchPerRow',
                'type'     => 'select',
                'title'    => 'Product per row in search screen',
                'subtitle' => 'Select search products per row',
                'desc' => 'This will allow you to set number of product per line on search screen',
                'options'  => array(1 => 1, 2 => 2, 3 => 3, 4 => 4),
                'default'  => 2,
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'productBorderRadius',
                'type'     => 'text',
                'title'    => 'Product border radius',
                'subtitle' => 'Enter product border radius in px',
                'desc' => __( 'This will allow you to set rounded corner for product images. If you set radius, Set padding between product below', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 5,
            ),
            array(
                'id'       => 'suCatBorderRadius',
                'type'     => 'text',
                'title'    => 'Sub category border radius',
                'subtitle' => 'Enter product border radius in px',
                'desc' => __( 'This will allow you to set rounded corner for sub category images.', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 5,
            ),
            array(
                'id'       => 'productPadding',
                'type'     => 'text',
                'title'    => 'Padding between products',
                'subtitle' => 'Enter padding between products in px',
                'desc' => __( 'This will allow you to set gap between products', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 8,
            ),
            array(
                'id'       => 'product_shadow',
                'type'     => 'select',
                'title'    => 'Box shadow',
                'subtitle' => 'Select product box shadow',
                'desc' => __( 'Do not use Apply shadow when product padding 0', 'redux-framework' ),
                'options'  => array(
                    'shadow'    => 'Apply shadow',
                    'border'    => 'Apply border',
                    'no-shadow'    => 'None',
                ),
                'default'  => 'shadow',
                'select2'  => array( 'allowClear' => false )
            ),
        )
    ) );

    // -> Dimensions
    Redux::setSection( $opt_name, array(
        'title' => __( 'Map Locations', 'redux-framework' ),
        'id'    => 'opt_locations',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Map Locations', 'redux-framework' ),
        'id'         => 'mstoreapp_locations',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'switchLocations',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Status', 'redux-framework' ),
                'subtitle' => __( 'Enable or disable the map location.', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'mapApiKey',
                'type'     => 'text',
                'title'    => 'Google map api key',
                'subtitle' => 'Enter Google map api key',
                'placeholder' => 'QPazGyB8pf6ZdFTj5qw7rc_HSGrhUwqKfIe9Qzd',
                'default'  => '',
            ),
            array(
                'id'       => 'mapZoom',
                'type'     => 'text',
                'title'    => 'Map zoom',
                'subtitle' => 'Enter map zoom',
                'desc' => __( 'This will allow you to set map zoom', 'redux-framework' ),
                'validate' => 'numeric',
                'default'  => 16,
            ),
            array(
                'id'          => 'locations',
                'type'        => 'slides',
                'title'       => __( 'Locations', 'redux-framework' ),
                'subtitle' => 'Add Locations',
                'desc'     => __( 'Enter Location Name, Location, Latitude and Longitude', 'redux-framework' ),
                'placeholder' => array(
                    'title'       => __( 'Name (e.g., New York City)', 'redux-framework' ),
                    'description' => __( 'Latitude (e.g., 43.071584)', 'redux-framework' ),
                    'url'         => __( 'Longitude (e.g., -89.38012)', 'redux-framework' ),
                ),
            ),
        )
    ) );
*/
   
    // -> Vendor Settings
 /*   Redux::setSection( $opt_name, array(
        'title' => __( 'Vendor', 'redux-framework' ),
        'id'    => 'vendor_details',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Settings', 'redux-framework' ),
        'id'         => 'mstoreapp_vendor_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_sold_by',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Sold by in listing page', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enbale sold by in product listing page', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_sold_by_product',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable Sold by in product detail page', 'redux-framework' ),
                'subtitle' => __( 'This will allow you to enbale sold by in product detail page', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_vendor_chat',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Enable vendor chat', 'redux-framework' ),
                'subtitle' => __( 'This will allow user to chat with vendor', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'enable_vendor_map',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Show vendor map location', 'redux-framework' ),
                'subtitle' => __( 'This will allow user to see vendor location', 'redux-framework' ),
                'default'  => false,
            ),
            array(
                'id'       => 'vendor_push_on_new_order',
                'type'     => 'switch',
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Vendor Push Notification for order', 'redux-framework' ),
                'subtitle' => __( 'Enbaling this will allow you to send push notification to vendor for order update and new order', 'redux-framework' ),
                'default'  => false,
            )
        )
    ) );
*/

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 15 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 15, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

