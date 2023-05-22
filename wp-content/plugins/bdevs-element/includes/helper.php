<?php 
namespace BdevsElement;

class Helper {

    /** 
    * Get widgets list
    */
    public static function get_widgets() {

        return [
            'advanced-price' => [
                'title' => __( 'Advanced Price', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],
            'hero' => [
                'title' => __( 'Hero', 'bdevselement' ),
                'icon' => 'eicon-tabs',
                'ispro' =>true
            ],

            'cta' => [
                'title' => __( 'CTA', 'bdevselement' ),
                'icon' => 'fa fa-time',
                'ispro' =>true
            ], 
            
            'faq' => [
                'title' => __( 'FAQ', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],                                                        

            'about' => [
                'title' => __( 'About', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ], 

            'brand' => [
                'title' => __( 'Brand', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],


            'service' => [
                'title' => __( 'Service', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],          

            'services-tab' => [
                'title' => __( 'Services Tab', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],

            'cf7' => [
                'title' => __( 'Contact Form 7', 'bdevselement' ),
                'icon' => 'fa fa-form',
            ],

            'contact-info' => [
                'title' => __( 'Contact Info', 'bdevselement' ),
                'icon' => 'fa fa-form',
            ],

            'heading' => [
                'title' => __( 'Heading Title', 'bdevselement' ),
                'icon' => 'fa fa-icon-box',
            ],

            'history' => [
                'title' => __( 'History', 'bdevselement' ),
                'icon' => 'fa fa-icon-box',
            ],

            'infobox' => [
                'title' => __( 'Info Box', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ],

            'icon-box' => [
                'title' => __( 'Icon Box', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ],

            'member' => [
                'title' => __( 'Team Member', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ],            

            'member-slider' => [
                'title' => __( 'Team Member Slider', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ],             

            'member-details' => [
                'title' => __( 'Member Details', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ], 


            'fact' => [
                'title' => __( 'Fact', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ],

            'pricing-table' => [
                'title' => __( 'Pricing Table', 'bdevselement' ),
                'icon' => 'fa fa-file-cabinet',
            ],
            
            'skill' => [
                'title' => __( 'Skill', 'bdevselement' ),
                'icon' => 'fa fa-image-slider',
            ],

            'slider' => [
                'title' => __( 'Slider', 'bdevselement' ),
                'icon' => 'fa fa-image-slider',
            ],

            'featured-list' => [
                'title' => __( 'Featured List', 'bdevselement' ),
                'icon' => 'fa fa-flip-card',
            ],            

            'post-list' => [
                'title' => __( 'Post List', 'bdevselement' ),
                'icon' => 'fa fa-post-list',
            ],

            'post-tab' => [
                'title' => __( 'Post Tab', 'bdevselement' ),
                'icon' => 'fa fa-post-tab',
            ], 

            'project' => [
                'title' => __( 'Project', 'bdevselement' ),
                'icon' => 'fa fa-post-list',
            ], 

            'subscribe' => [
                'title' => __( 'Mainchimp Subscribe', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ],           

            'testimonial-slider' => [
                'title' => __( 'Testimonial Slider', 'bdevselement' ),
                'icon' => 'fa fa-testimonial',
                'css' => ['testimonial'],
                'js' => [],
                'vendor' => [
                    'css' => [],
                    'js' => [],
                ],
            ]

        ];
    }

    /**
    *  Get WooCommerce widgets list   
    **/
    public static function get_woo_widgets() { 

        return [
            'woo-product' => [
                'title' => __( 'Woo Product', 'bdevselement' ),
                'icon' => 'fa fa-card'
            ]

        ];
    }
}


