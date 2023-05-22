<?php
/** 
 * bngtech Customizer data
 */
function _customizer_data( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'bngtech',
			'name' => esc_html__('BngTech Customizer','bngtech'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'bngtech' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'bngtech' ),
							'id' => 'bngtech_topbar_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),		
						// Show Search						
						array(
							'name' => esc_html__( 'Show Search', 'bngtech' ),
							'id' => 'bngtech_show_header_search',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Show Search						
						array(
							'name' => esc_html__( 'Show CTA', 'bngtech' ),
							'id' => 'bngtech_show_header_cta',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),						
						// Show Language
						array(
							'name' => esc_html__( 'Show Language', 'bngtech' ),
							'id' => 'bngtech_header_lang',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						// Show Cart
						array(
							'name' => esc_html__( 'Show Cart', 'bngtech' ),
							'id' => 'bngtech_cart_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Info Text
						array(
							'name' => esc_html__( 'Info Open Text', 'bngtech' ),
							'id' => 'bngtech_info_text',
							'default' => esc_html__('Open Hours of City Government Mon - Fri: 8.00 am - 6.00 pm, NYC','bngtech'),
							'type' => 'textarea',
							'transport'	=> 'refresh' 
						),

						// topbar left
						array(
							'name' => esc_html__( 'Mail ID', 'bngtech' ),
							'id' => 'bngtech_mail_id',
							'default' => esc_html__('info@webmail.com','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Mail URL', 'bngtech' ),
							'id' => 'bngtech_mail_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Phone 
						array(
							'name' => esc_html__( 'Phone Number', 'bngtech' ),
							'id' => 'bngtech_phone',
							'default' => esc_html__('+876 864 764 764','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Phone URL', 'bngtech' ),
							'id' => 'bngtech_phone_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	

						// address
						array(
							'name' => esc_html__( 'Address', 'bngtech' ),
							'id' => 'bngtech_address',
							'default' => esc_html__('12/A, Mirnada City Tower, NYC','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Support 
						array(
							'name' => esc_html__( 'Support Text', 'bngtech' ),
							'id' => 'bngtech_support',
							'default' => esc_html__('Support','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Support URL', 'bngtech' ),
							'id' => 'bngtech_support_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),							

						// Terms 
						array(
							'name' => esc_html__( 'Terms Text', 'bngtech' ),
							'id' => 'bngtech_terms',
							'default' => esc_html__('Terms & Condition','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Terms URL', 'bngtech' ),
							'id' => 'bngtech_terms_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	

						// cta
						array(
							'name' => esc_html__( 'Header Right', 'bngtech' ),
							'id' => 'bngtech_header_right',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Show Button						
						array(
							'name' => esc_html__( 'Show Button', 'bngtech' ),
							'id' => 'bngtech_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'BTN Text', 'bngtech' ),
							'id' => 'bngtech_top_btn',
							'default' => esc_html__('Get Job Feeds','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Top Bar BTN Text RTL', 'bngtech' ),
							'id' => 'bngtech_top_btn_rtl',
							'default' => esc_html__('Get Job Feeds','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'BTN Link', 'bngtech' ),
							'id' => 'bngtech_top_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),


						// cta text
						array(
							'name' => esc_html__( 'Cta label', 'bngtech' ),
							'id' => 'bngtech_cta_label',
							'default' => esc_html__('Have Any Questions?','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Cta Number', 'bngtech' ),
							'id' => 'bngtech_cta_phone',
							'default' => esc_html__('+2-300-521-362','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// button
						array(
							'name' => esc_html__( 'Button Text RTL', 'bngtech' ),
							'id' => 'bngtech_button_text_rtl',
							'default' => esc_html__('Get A Quote','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Button Link', 'bngtech' ),
							'id' => 'bngtech_button_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
					) 
				),
				'header_social_setting'=> array(
					'name'=> esc_html__('Header Social','bngtech'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'bngtech'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'bngtech' ),
							'id' => 'bngtech_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'bngtech' ),
							'id' => 'bngtech_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'bngtech' ),
							'id' => 'bngtech_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'bngtech' ),
							'id' => 'bngtech_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'bngtech' ),
							'id' => 'bngtech_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'bngtech' ),
					'priority' => 12,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'bngtech' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => esc_html__( 'Header Style 1', 'bngtech' ),
								'header-style-2' => esc_html__( 'Header Style 2', 'bngtech' ),
								'header-style-3' => esc_html__( 'Header Style 3', 'bngtech' ),
							),
							'default' => 'header-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Logo', 'bngtech' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/assets/images/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header White Logo', 'bngtech' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/assets/images/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'bngtech' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/assets/images/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),							
					) 
				),	
				'bngtech_side_setting'=> array(
					'name'=> esc_html__('Side Info Setting','bngtech'),
					'priority'=> 13,
					'fields'=> array(
						// Show Hamburger
						array(
							'name' => esc_html__( 'Show Hamburger', 'bngtech' ),
							'id' => 'bngtech_hamburger_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Logo Side','bngtech'),
							'id'=>'bngtech_extra_info_logo',
							'default' => get_template_directory_uri() . '/assets/images/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh'  
						),
						// about info
						array(
							'name' => esc_html__( 'About Us Tite', 'bngtech' ),
							'id' => 'bngtech_extra_about_title',
							'default'=> esc_html__('About Us','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'About Us Desc..', 'bngtech' ),
							'id' => 'bngtech_extra_about_text',
							'default'=> esc_html__('Description Text..','bngtech'),
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'bngtech' ),
							'id' => 'bngtech_extra_button',
							'default'=> esc_html__('Contact Us','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Button URL', 'bngtech' ),
							'id' => 'bngtech_extra_button_url',
							'default'=> '#',
							'type' => 'text' 
						),
						// contact info		
						array(
							'name' => esc_html__( 'Contact Info Title', 'bngtech' ),
							'id' => 'bngtech_extra_contact_title',
							'default'=> esc_html__('Contact Us','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Office Address Icon', 'bngtech' ),
							'id' => 'bngtech_extra_address_icon',
							'default'=> esc_html__('fal fa-rocket','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Office Address', 'bngtech' ),
							'id' => 'bngtech_extra_address',
							'default'=> esc_html__('123/A, Miranda City Likaoli Prikano, Dope United States','bngtech'),
							'type' => 'textarea' 
						),		
						array(
							'name' => esc_html__( 'Phone Number Icon', 'bngtech' ),
							'id' => 'bngtech_extra_phone_icon',
							'default'=> esc_html__('far fa-phone','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Phone Number', 'bngtech' ),
							'id' => 'bngtech_extra_phone',
							'default'=> esc_html__('+0989 7876 9865 9','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Email Icon', 'bngtech' ),
							'id' => 'bngtech_extra_email_icon',
							'default'=> esc_html__('far fa-envelope-open','bngtech'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Email ID', 'bngtech' ),
							'id' => 'bngtech_extra_email',
							'default'=> esc_html__('info@basictheme.net','bngtech'),
							'type' => 'text' 
						),
					)
				),
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','bngtech'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name'=>esc_html__('Breadcrumb BG Color','bngtech'),
							'id'=>'bngtech_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','bngtech'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','bngtech'),
							'id'=>'bngtech_breadcrumb_spacing',
							'default'=> esc_html__('160px','bngtech'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','bngtech'),
							'id'=>'bngtech_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','bngtech'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'bngtech' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'bngtech' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'bngtech' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'bngtech' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'bngtech' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'bngtech' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'bngtech' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'bngtech' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','bngtech'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'bngtech' ),
							'id' => 'bngtech_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'bngtech' ),
							'id' => 'bngtech_blog_btn',
							'default' => esc_html__('Read More','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text RTL', 'bngtech' ),
							'id' => 'bngtech_blog_btn_rtl',
							'default' => esc_html__('Read More','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),													
						array(
							'name' => esc_html__( 'Blog Title', 'bngtech' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'bngtech' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','bngtech'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'bngtech_footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','bngtech'),
					'priority'=> 16,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Footer Style', 'bngtech' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => esc_html__( 'Footer Style 1', 'bngtech' ),
								'footer-style-2' => esc_html__( 'Footer Style 2', 'bngtech' ),
								'footer-style-3' => esc_html__( 'Footer Style 3', 'bngtech' ),
							),
							'default' => 'footer-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Widget Number', 'bngtech' ),
							'id' => 'footer_widget_number',
							'type'     => 'select',
							'choices'  => array(
								'3' => esc_html__( 'Widget Number 3', 'bngtech' ),
								'2' => esc_html__( 'Widget Number 2', 'bngtech' ),
							),
							'default' => '3',
							'transport'	=> 'refresh'
						),

						array(
							'name'=>esc_html__('Footer Social On/Off','bngtech'),
							'id'=>'footer_social_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),

						array(
							'name' => esc_html__( 'Footer Background Image', 'bngtech' ),
							'id' => 'bngtech_footer_bg',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),					
						array(
							'name'=>esc_html__('Footer BG Color','bngtech'),
							'id'=>'bngtech_footer_bg_color',
							'default'=> esc_html__('#f4f9fc','bngtech'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right','bngtech'),
							'id'=>'bngtech_copyright',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme. All Rights Reserved','bngtech'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right RTL','bngtech'),
							'id'=>'bngtech_copyright_rtl',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme. All Rights Reserved','bngtech'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Scrollup Hide','bngtech'),
							'id'=>'bngtech_scrollup_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Social Hide','bngtech'),
							'id'=>'bngtech_footer_social_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 2 Switch','bngtech'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 3 Switch','bngtech'),
							'id'=>'footer_style_3_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','bngtech'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','bngtech'),
							'id'=>'bngtech_color_option',
							'default'=> esc_html__('#086ad8','bngtech'),
							'transport'	=> 'refresh'  
						)													
					)
				),
				'typography_setting'=> array(
					'name'=> esc_html__('Typography Setting','bngtech'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('Google Font URL','bngtech'),
							'id'=>'bngtech_fonts_url',
							'description' => esc_html__( 'Example: Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap', 'bngtech' ),
							'default'=> esc_html__("Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body Font','bngtech'),
							'id'=>'bngtech_body_font',
							'default'=> esc_html__("'Roboto', sans-serif",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading Font','bngtech'),
							'id'=>'bngtech_heading_font',
							'default'=> esc_html__("Cerebri Sans",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),	

						array(
							'name'=>esc_html__('Google Font RTL URL ','bngtech'),
							'id'=>'bngtech_fonts_url_rtl',
							'description' => esc_html__( 'Example: Rajdhani:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&display=swap', 'bngtech' ),
							'default'=> esc_html__("Rajdhani:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&display=swap",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body RTL Font','bngtech'),
							'id'=>'bngtech_body_font_rtl',
							'default'=> esc_html__("Cerebri Sans",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading RTL Font','bngtech'),
							'id'=>'bngtech_heading_font_rtl',
							'default'=> esc_html__("'Roboto', sans-serif",'bngtech'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),												
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','bngtech'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','bngtech'),
							'id'=>'bngtech_error_404_text',
							'default'=> esc_html__('404','bngtech'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','bngtech'),
							'id'=>'bngtech_error_title',
							'default'=> esc_html__('Page not found','bngtech'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','bngtech'),
							'id'=>'bngtech_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','bngtech'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','bngtech'),
							'id'=>'bngtech_error_link_text',
							'default'=> esc_html__('Back To Home','bngtech'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'rtl_setting'=> array(
					'name'=> esc_html__('RTL Setting','bngtech'),
					'priority'=> 20,
					'fields'=> array(
						array(
							'name'=>esc_html__('Switch RTL','bngtech'),
							'id'=>'rtl_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						)
					)
				),
			),
		)
	);

}

add_filter('_customizer_data', '_customizer_data');


