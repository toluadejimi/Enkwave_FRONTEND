<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();


class Subscribe extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'subscribe';
    }


    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Subscribe', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/fact/';
	}

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_keywords() {
        return [ 'subscribe', 'image', 'list' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social_link',
            [
                'label' => __( 'Social Links', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2']
                ]
            ]
        );

        $this->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your facebook link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $this->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your twitter link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your instagram link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $this->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your linkedin link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'bdevselement' ),
                'placeholder' => __( 'Add your youtube link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Google Plus', 'bdevselement' ),
                'placeholder' => __( 'Add your Google Plus link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'bdevselement' ),
                'placeholder' => __( 'Add your flickr link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'bdevselement' ),
                'placeholder' => __( 'Add your vimeo link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'bdevselement' ),
                'placeholder' => __( 'Add your hehance link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'bdevselement' ),
                'placeholder' => __( 'Add your dribbble link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'bdevselement' ),
                'placeholder' => __( 'Add your pinterest link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Github', 'bdevselement' ),
                'placeholder' => __( 'Add your github link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10']
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs Info Box Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'big_title',
            [
                'label' => __( 'Big Title', 'bdevselement' ),
                'label_block' => true,
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'title here', 'bdevselement' ),
                'placeholder' => __( 'Type big title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'bdevselement' ),
                'label_block' => true,
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs subtitle here', 'bdevselement' ),
                'placeholder' => __( 'Type subtitle here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'desccription',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_mailchimp_title',
            [
                'label' => __( 'Mailchimp', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mailchimp_shortcode',
            [
                'label' => __( 'Mailchimp Shortcode', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __( 'Add Mailchimp Shortcode.', 'bdevselement' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __( 'Vertical Position', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['design_style'] === 'style_2'):

        ?>

        <div class="newslater-1 newslater--2-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="social__icons--list">
                            <?php if( !empty($settings['web_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['web_title'] ); ?>">
                                <i class="far fa-globe"></i>
                                <i class="far fa-globe"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['email_title'] ) ) : ?> 
                            <a href="mailto:<?php echo esc_url( $settings['email_title'] ); ?>">
                                <i class="fal fa-envelope"></i>
                                <i class="fal fa-envelope"></i>
                            </a>
                            <?php endif; ?>  

                            <?php if( !empty($settings['phone_title'] ) ) : ?> 
                            <a href="tell:<?php echo esc_url( $settings['phone_title'] ); ?>">
                                <i class="fas fa-phone"></i>
                                <i class="fas fa-phone"></i>
                            </a>
                            <?php endif; ?>  

                            <?php if( !empty($settings['facebook_title'] ) ) : ?>  
                            <a href="<?php echo esc_url( $settings['facebook_title'] ); ?>">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['twitter_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['twitter_title'] ); ?>">
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-twitter"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['instagram_title'] ) ) : ?>   
                            <a href="<?php echo esc_url( $settings['instagram_title'] ); ?>">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['linkedin_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['linkedin_title'] ); ?>">
                                <i class="fab fa-linkedin-in"></i>
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['youtube_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['youtube_title'] ); ?>">
                                <i class="fab fa-youtube"></i>
                                <i class="fab fa-youtube"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['googleplus_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['googleplus_title'] ); ?>">
                                <i class="fab fa-google-plus-g"></i>
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['flickr_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['flickr_title'] ); ?>">
                                <i class="fab fa-flickr"></i>
                                <i class="fab fa-flickr"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['vimeo_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['vimeo_title'] ); ?>">
                                <i class="fab fa-vimeo-v"></i>
                                <i class="fab fa-vimeo-v"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['behance_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['behance_title'] ); ?>">
                                <i class="fab fa-behance"></i>
                                <i class="fab fa-behance"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['dribble_title'] ) ) : ?>  
                            <a href="<?php echo esc_url( $settings['dribble_title'] ); ?>">
                                <i class="fab fa-dribbble"></i>
                                <i class="fab fa-dribbble"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['pinterest_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['pinterest_title'] ); ?>">
                                <i class="fab fa-pinterest-p"></i>
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['gitub_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['gitub_title'] ); ?>">
                                <i class="fab fa-github"></i>
                                <i class="fab fa-github"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1">
                        <?php if ( $settings['mailchimp_shortcode'] ) : ?>
                        <div class="newslater__form">
                            <?php print do_shortcode($settings['mailchimp_shortcode']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php else: ?>

        <div class="newslater-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="social__icons--list">
                            <?php if( !empty($settings['web_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['web_title'] ); ?>">
                                <i class="far fa-globe"></i>
                                <i class="far fa-globe"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['email_title'] ) ) : ?> 
                            <a href="mailto:<?php echo esc_url( $settings['email_title'] ); ?>">
                                <i class="fal fa-envelope"></i>
                                <i class="fal fa-envelope"></i>
                            </a>
                            <?php endif; ?>  

                            <?php if( !empty($settings['phone_title'] ) ) : ?> 
                            <a href="tell:<?php echo esc_url( $settings['phone_title'] ); ?>">
                                <i class="fas fa-phone"></i>
                                <i class="fas fa-phone"></i>
                            </a>
                            <?php endif; ?>  

                            <?php if( !empty($settings['facebook_title'] ) ) : ?>  
                            <a href="<?php echo esc_url( $settings['facebook_title'] ); ?>">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['twitter_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['twitter_title'] ); ?>">
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-twitter"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['instagram_title'] ) ) : ?>   
                            <a href="<?php echo esc_url( $settings['instagram_title'] ); ?>">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['linkedin_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['linkedin_title'] ); ?>">
                                <i class="fab fa-linkedin-in"></i>
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['youtube_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['youtube_title'] ); ?>">
                                <i class="fab fa-youtube"></i>
                                <i class="fab fa-youtube"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['googleplus_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['googleplus_title'] ); ?>">
                                <i class="fab fa-google-plus-g"></i>
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['flickr_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['flickr_title'] ); ?>">
                                <i class="fab fa-flickr"></i>
                                <i class="fab fa-flickr"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['vimeo_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['vimeo_title'] ); ?>">
                                <i class="fab fa-vimeo-v"></i>
                                <i class="fab fa-vimeo-v"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['behance_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['behance_title'] ); ?>">
                                <i class="fab fa-behance"></i>
                                <i class="fab fa-behance"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['dribble_title'] ) ) : ?>  
                            <a href="<?php echo esc_url( $settings['dribble_title'] ); ?>">
                                <i class="fab fa-dribbble"></i>
                                <i class="fab fa-dribbble"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['pinterest_title'] ) ) : ?> 
                            <a href="<?php echo esc_url( $settings['pinterest_title'] ); ?>">
                                <i class="fab fa-pinterest-p"></i>
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                            <?php endif; ?>

                            <?php if( !empty($settings['gitub_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['gitub_title'] ); ?>">
                                <i class="fab fa-github"></i>
                                <i class="fab fa-github"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1">
                        <?php if ( $settings['mailchimp_shortcode'] ) : ?>
                        <div class="newslater__form">
                            <?php print do_shortcode($settings['mailchimp_shortcode']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
        <?php
    }
}
