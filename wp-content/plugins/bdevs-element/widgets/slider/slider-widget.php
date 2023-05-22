<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Slider extends BDevs_El_Widget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'slider';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Slider', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/slider/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-slider-full-screen';
    }

    public function get_keywords()
    {
        return ['slider', 'image', 'gallery', 'carousel'];
    }

    protected function register_content_controls()
    {


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'slider_item_style',
            [
                'label' => __('Slider Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Content Left', 'bdevselement'),
                    'style_2' => __('Content Center', 'bdevselement'),
                    'style_3' => __('Content Right', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'image_two',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image Two', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'image_three',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image Three', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'image_four',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image Four', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Sub Title', 'bdevselement'),
                'default' => __('Subtitle', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('Title Here', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevselement'),
                'default' => __('Here content', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button one
        $repeater->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        // button 2

        $repeater->add_control(
            'button_text_2',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link_2',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'button_icon_2',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon_2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position_2',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing_2',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __('Animation Speed', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __('Slide speed in milliseconds', 'bdevselement'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __('Autoplay speed in milliseconds', 'bdevselement'),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'slidetoshow',
            [
                'label' => __('Slide to Show', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'max' => 12,
                'default' => 1,
                'description' => __('How many item you want to show?', 'bdevselement'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __('Infinite Loop?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical Mode?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __('Navigation', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'bdevselement'),
                    'arrow' => __('Arrow', 'bdevselement'),
                    'dots' => __('Dots', 'bdevselement'),
                    'both' => __('Arrow & Dots', 'bdevselement'),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Slide Content', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bannertext__2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bannerSlide__item',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bannertext__2 .heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannertext__2 .heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bannertext__2 .heading',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Subtitle', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bannertext__2 .subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannertext__2 .subheading, {{WRAPPER}} .bannertext__2 .subheading span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bannertext__2 .subheading',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __('Navigation - Arrow', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __('Position', 'bdevselement'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'bdevselement'),
                'label_on' => __('Custom', 'bdevselement'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __('Vertical', 'bdevselement'),
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
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-next, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __('Horizontal', 'bdevselement'),
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
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .bannerSlide .owl-nav .owl-next, .bannerSlide .owl-nav .owl-prev',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev, {{WRAPPER}} .bannerSlide .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev, {{WRAPPER}} .bannerSlide .owl-nav .owl-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev, {{WRAPPER}} .bannerSlide .owl-nav .owl-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev:hover, {{WRAPPER}} .bannerSlide .owl-nav .owl-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev:hover, {{WRAPPER}} .bannerSlide .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-prev:hover, {{WRAPPER}} .bannerSlide .owl-nav .owl-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __('Navigation - Dots', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __('Vertical Position', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __('Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots .owl-dot' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs('_tabs_dots');
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots .owl-dot' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots .owl-dot:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __('Active', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannerSlide .owl-nav .owl-dots .owl-dot.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .site-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .site-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .site-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .bannertext__2 .video-play',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span,{{WRAPPER}} .bannertext__2 .video-play' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .bannertext__2 .video-play' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .site-btn:hover span,{{WRAPPER}} .bannertext__2 .video-play:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .bannertext__2 .video-play:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .site-btn:hover span,{{WRAPPER}} .bannertext__2 .video-play:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /** button 2 **/
        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __('Button 2', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .buttons .transparent,{{WRAPPER}} .buttons .transparent span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .buttons .transparent',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .buttons .transparent ',
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button2');

        $this->start_controls_tab(
            '_tab_button2_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button2_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button2_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button2_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .buttons .transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $slider_autoplay = ($settings['autoplay'] == 'yes') ? true : false;
        $slider_playspeed = $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
        $animation_speed = $settings['animation_speed'] ? $settings['animation_speed'] : '300';
        $slider_slideshow = $settings['slidetoshow'] ? $settings['slidetoshow'] : '1';
        $slider_infinite = ($settings['loop'] == 'yes') ? true : false;

        switch ($settings['navigation']) {
            case 'none':
                $slider_arrows = false;
                $slider_dots = false;
                break;
            case 'arrow':
                $slider_arrows = true;
                $slider_dots = false;
                break;
            case 'dots':
                $slider_arrows = false;
                $slider_dots = true;
                break;
            case 'both':
                $slider_arrows = true;
                $slider_dots = true;
                break;
        }


        $slider_settings = array(
            'autoplay' => $slider_autoplay,
            'arrows' => $slider_arrows,
            'speed' => $animation_speed,
            'dots' => $slider_dots,
            'playspeed' => $slider_playspeed,
            'slideshow' => $slider_slideshow,
            'infinite' => $slider_infinite,
        );


        if (empty($settings['slides'])) {
            return;
        }

        $this->add_render_attribute('button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp2');

        ?>

        <?php if ($settings['design_style'] === 'style_3'):

        $this->add_render_attribute('button', 'class', 'z-btn z-btn-border');

        ?>

        <section class="hero__area p-relative slider-settings"
                 data-settings='<?php print json_encode($slider_settings); ?>'>
            <div class="hero__shape">
                <img class="one" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-1.png"
                     alt="img">
                <img class="two" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-2.png"
                     alt="img">
                <img class="three"
                     src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-3.png" alt="img">
                <img class="four" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-4.png"
                     alt="img">
                <img class="five" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-6.png"
                     alt="img">
                <img class="six" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-7.png"
                     alt="img">
            </div>

            <?php foreach ($settings['slides'] as $key => $slide) :
                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                if (!$image) {
                    $image = $slide['image']['url'];
                }

                $image_two = wp_get_attachment_image_url($slide['image_two']['id'], $settings['thumbnail_size']);
                if (!$image_two) {
                    $image_two = $slide['image_two']['url'];
                }

                $image_three = wp_get_attachment_image_url($slide['image_three']['id'], $settings['thumbnail_size']);
                if (!$image_three) {
                    $image_three = $slide['image_three']['url'];
                }

                $image_four = wp_get_attachment_image_url($slide['image_four']['id'], $settings['thumbnail_size']);
                if (!$image_four) {
                    $image_four = $slide['image_four']['url'];
                }

                ?>
                <div class="hero__item hero__height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-5 order-last">
                                <div class="hero__thumb-wrapper ml-100 scene ">
                                    <?php if (!empty($image)): ?>
                                        <div class="hero__thumb one">
                                            <img class="layers" data-depth="0.2" src="<?php print esc_url($image); ?>"
                                                 alt="img">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image_two)): ?>
                                        <div class="hero__thumb two d-none d-md-block d-lg-none d-xl-block">
                                            <img class="layers" data-depth="0.3"
                                                 src="<?php print esc_url($image_two); ?>" alt="img">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image_three)): ?>
                                        <div class="hero__thumb three d-none d-sm-block">
                                            <img class="layers" data-depth="0.4"
                                                 src="<?php print esc_url($image_three); ?>" alt="img">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image_four)): ?>
                                        <div class="hero__thumb four d-none d-md-block d-lg-none d-xl-block">
                                            <img class="layers" data-depth="0.5"
                                                 src="<?php print esc_url($image_four); ?>" alt="img">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                                <div class="hero__content">
                                    <?php if (!empty($slide['subtitle'])): ?>
                                        <span class="wow fadeInUp"
                                              data-wow-delay=".2s"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['title'])) : ?>
                                        <h1 class="wow fadeInUp"
                                            data-wow-delay=".4s"><?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['desc'])) : ?>
                                        <p class="wow fadeInUp"
                                           data-wow-delay=".6s"><?php echo bdevs_element_kses_intermediate($slide['desc']); ?></p>
                                    <?php endif; ?>
                                    <div class="slide-btn wow fadeInUp" data-wow-delay=".8s">
                                        <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                            printf('<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string('button'),
                                                esc_html($slide['button_text']),
                                                esc_url($slide['button_link']['url'])
                                            );
                                        elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                        <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                            if ($slide['button_icon_position'] === 'before'): ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?>
                                                </a>
                                            <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($slide['button_text']); ?>
                                                    <span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                            <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'):

        $this->add_render_attribute('button', 'class', 'z-btn z-btn-transparent');

        ?>

        <section class="slider__area slider__area-2  slider-settings"
                 data-settings='<?php print json_encode($slider_settings); ?>'>
            <div class="slider-active">
                <?php foreach ($settings['slides'] as $key => $slide) :
                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                    if (!$image) {
                        $image = $slide['image']['url'];
                    }

                    $this->add_render_attribute('button_' . $key, 'class', 'z-btn z-btn-transparent');
                    $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                    ?>

                    <div class="single-slider single-slider-2 slider__height slider__height-2 d-flex align-items-center"
                         data-background="<?php print esc_url($image); ?>">
                        <div class="container">
                            <div class="row">
                                <?php if ($slide['slider_item_style'] === 'style_2'): ?>
                                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-9 offset-md-3 col-sm-10 offset-sm-2">
                                        <div class="slider__content slider__content-2 slider__content-3 text-center">
                                            <?php if ($slide['title']): ?>
                                                <h1 data-animation="fadeInUp" data-delay=".5s">
                                                    <?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                            <?php endif; ?>
                                            <?php if ($slide['desc']) : ?>
                                                <p data-animation="fadeInUp" data-delay=".7s">
                                                    <?php echo bdevs_element_kses_intermediate($slide['desc']); ?>
                                                </p>
                                            <?php endif; ?>

                                            <div class="slider__btn" data-animation="fadeInUp" data-delay=".9s">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf('<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before'): ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?>
                                                        </a>
                                                    <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?>
                                                            <span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                    <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($slide['slider_item_style'] === 'style_3'): ?>
                                    <div class="col-xl-7 offset-xl-6 col-lg-8 offset-lg-4 col-md-9 offset-md-3 col-sm-10 offset-sm-2">
                                        <div class="slider__content slider__content-2">
                                            <?php if ($slide['title']): ?>
                                                <h1 data-animation="fadeInUp" data-delay=".5s">
                                                    <?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                            <?php endif; ?>
                                            <?php if ($slide['desc']) : ?>
                                                <p data-animation="fadeInUp" data-delay=".7s">
                                                    <?php echo bdevs_element_kses_intermediate($slide['desc']); ?>
                                                </p>
                                            <?php endif; ?>
                                            <div class="slider__btn" data-animation="fadeInUp" data-delay=".9s">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf('<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before'): ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?>
                                                        </a>
                                                    <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?>
                                                            <span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                    <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-xl-6">
                                        <div class="slider__content slider__content-2 slider__content-4">
                                            <?php if ($slide['subtitle']): ?>
                                                <span data-animation="fadeInUp"
                                                      data-delay=".3s"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></span>
                                            <?php endif; ?>
                                            <?php if ($slide['title']): ?>
                                                <h1 data-animation="fadeInUp" data-delay=".5s">
                                                    <?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                            <?php endif; ?>
                                            <?php if ($slide['desc']) : ?>
                                                <p data-animation="fadeInUp" data-delay=".7s">
                                                    <?php echo bdevs_element_kses_intermediate($slide['desc']); ?>
                                                </p>
                                            <?php endif; ?>
                                            <div class="slider__btn" data-animation="fadeInUp" data-delay=".9s">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf('<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before'): ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?>
                                                        </a>
                                                    <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?>
                                                            <span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                    <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </section>

    <?php else:
        ?>

        <section class="banner__area banner__area--2 banner__area--3 slider-settings"
                 data-settings='<?php print json_encode($slider_settings); ?>'>
            <div class="bannerSlide owl-carousel">
                <?php foreach ($settings['slides'] as $key => $slide) :
                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                    if (!$image) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute('button_' . $key, 'class', 'site-btn');
                    $this->add_render_attribute('button_' . $key, 'data-animation', 'fadeInUp');
                    $this->add_render_attribute('button_' . $key, 'data-delay', '.7s');
                    $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);

                    $this->add_render_attribute('button2_' . $key, 'class', 'site-btn transparent');
                    $this->add_render_attribute('button2_' . $key, 'data-animation', 'fadeInUp');
                    $this->add_render_attribute('button2_' . $key, 'data-delay', '.9s');
                    $this->add_render_attribute('button2_' . $key, 'href', $slide['button_link']['url']);
                    ?>
                    <div class="bannerSlide__item bg_img" data-background="<?php print esc_url($image); ?>" data-overlay
                         data-opacity="7">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-xl-7 text-center">
                                    <div class="bannertext bannertext__2 bannertext__3">
                                        <?php if (!empty($slide['subtitle'])): ?>
                                            <h5 class="subheading mb-15" data-animation="fadeInUp"
                                                data-delay=".3s"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h5>
                                        <?php endif; ?>
                                        <?php if (!empty($slide['title'])) : ?>
                                            <h1 class="heading" data-animation="fadeInUp"
                                                data-delay=".5s"><?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['desc'])) : ?>
                                            <p class="decoration_text" data-animation="fadeInUp"
                                               data-delay=".8s"><?php echo bdevs_element_kses_intermediate($slide['desc']); ?></p>
                                        <?php endif; ?>

                                        <div class="buttons mt-25">
                                            <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                printf('<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string('button_' . $key),
                                                    esc_html($slide['button_text'])
                                                );
                                            elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                            <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                if ($slide['button_icon_position'] === 'before'): ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?>
                                                    </a>
                                                <?php
                                                else: ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?>
                                                        <span><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                endif;
                                            endif; ?>

                                            <?php if ($slide['button_text_2'] && ((empty($slide['button_selected_icon_2']) || empty($slide['button_selected_icon_2']['value'])) && empty($slide['button_icon_2']))) :
                                                printf('<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string('button2_' . $key),
                                                    esc_html($slide['button_text_2'])
                                                );
                                            elseif (empty($slide['button_text_2']) && ((!empty($slide['button_selected_icon_2']) || empty($slide['button_selected_icon_2']['value'])) || !empty($slide['button_icon_2']))) : ?>
                                                <a <?php $this->print_render_attribute_string('button2_' . $key); ?>><?php bdevs_element_render_icon($slide, 'button_icon_2', 'button_selected_icon_2'); ?></a>
                                            <?php elseif ($slide['button_text_2'] && ((!empty($slide['button_selected_icon_2']) || empty($slide['button_selected_icon_2']['value'])) || !empty($slide['button_icon_2']))) :
                                                if ($slide['button_icon_position_2'] === 'before'): ?>
                                                    <a <?php $this->print_render_attribute_string('button2_' . $key); ?>><span><?php bdevs_element_render_icon($slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2']); ?></span> <?php echo esc_html($slide['button_text_2']); ?>
                                                    </a>
                                                <?php
                                                else: ?>
                                                    <a <?php $this->print_render_attribute_string('button2_' . $key); ?>><?php echo esc_html($slide['button_text_2']); ?>
                                                        <span><?php bdevs_element_render_icon($slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                endif;
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="cricle cricle__1" data-animation="zoomIn" data-delay=".1s"></span>
                        <span class="cricle cricle__2" data-animation="zoomIn" data-delay=".3s"></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>


    <?php endif; ?>

        <?php
    }
}
