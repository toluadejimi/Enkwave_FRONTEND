<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Css_Filter;
use \Elementor\Scheme_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class Hero extends BDevs_El_Widget
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
        return 'hero';
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
        return __('Hero', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/hero/';
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
        return 'eicon-elementor';
    }

    public function get_keywords()
    {
        return ['hero', 'blurb', 'infobox', 'content', 'block', 'box'];
    }

    protected function register_content_controls()
    {

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
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => 'style_1'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label' => __('Image Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __('Top', 'bdevselement'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'bdevs-card--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Background Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Sub Title', 'bdevselement'),
                'placeholder' => __('Enter Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => __('Card Title', 'bdevselement'),
                'placeholder' => __('Enter Card Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Card description goes here', 'bdevselement'),
                'placeholder' => __('Enter card description', 'bdevselement'),
                'rows' => 4,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __('Video Url', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Video URL', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
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
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Fact List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1'
                ],
            ]
        );

        $this->add_control(
            'fact_show_hide',
            [
                'label' => __('Fact List Show?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Fact Number', 'bdevselement'),
                'default' => __('70', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'label' => __('Description', 'bdevselement'),
                'placeholder' => __('Type description here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(subtitle || "Carousel Item"); #>',
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
                ]
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
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
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
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

        $this->add_control(
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

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => 'style_1'
                ],
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __('Offset', 'bdevselement'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'bdevselement'),
                'label_on' => __('Custom', 'bdevselement'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __('Offset Left', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui'
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __('Offset Top', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Left image position styles
                    '(desktop){{WRAPPER}} .banner__area .banner-img img' => 'margin-left: {{image_offset_x.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}));',
                    '(tablet){{WRAPPER}} .banner__area .banner-img img' => 'margin-left: {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}));',
                    '(mobile){{WRAPPER}} .banner__area .banner-img img' => 'margin-left: {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}));'
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .banner__area .banner-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .banner__area .banner-img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .banner__area .banner-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .banner__area .banner-img',
                'separator' => 'after'
            ]
        );

        $this->start_controls_tabs(
            '_tabs_image_effects',
            [
                'separator' => 'before'
            ]
        );

        $this->start_controls_tab(
            '_tab_image_effects_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => __('Opacity', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner__area .banner-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters',
                'selector' => '{{WRAPPER}} .banner__area .banner-img img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => __('Opacity', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner__area:hover .banner-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters_hover',
                'selector' => '{{WRAPPER}} .banner__area:hover .banner-img img',
            ]
        );

        $this->add_control(
            'image_background_hover_transition',
            [
                'label' => __('Transition Duration', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ..banner__area:hover .banner-img img' => 'transition-duration: {{SIZE}}s;',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __('Hover Animation', 'bdevselement'),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title & Description', 'bdevselement'),
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
                    '{{WRAPPER}} .bannertext' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
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
                    '{{WRAPPER}} .bannertext > span,{{WRAPPER}} .bannertext__2 .subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannertext > span,{{WRAPPER}} .bannertext__2 .subheading,{{WRAPPER}} .bannertext__2 .subheading span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bannertext > span,{{WRAPPER}} .bannertext__2 .subheading,{{WRAPPER}} .bannertext__2 .subheading span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
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
                    '{{WRAPPER}} .bannertext .heading,{{WRAPPER}} .bannertext__2 .heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannertext .heading,{{WRAPPER}} .bannertext__2 .heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bannertext .heading,{{WRAPPER}} .bannertext__2 .heading',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bannertext h6,{{WRAPPER}} .bannertext__2 p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bannertext h6,{{WRAPPER}} .bannertext h6 span,{{WRAPPER}} .bannertext__2 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bannertext h6,{{WRAPPER}} .bannertext__2 p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

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
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .bannertext__2 .video-play' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn,{{WRAPPER}} .site-btn span,{{WRAPPER}} .bannertext__2 .video-play',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .bannertext__2 .video-play',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .bannertext__2 .video-play' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => 'style_10'
                ],
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn',
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
                    '{{WRAPPER}} .bdevs-btn.red' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'border-color: {{VALUE}};',
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

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'heading');

        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text');

        $this->add_inline_editing_attributes('button_text', 'none');
        $this->add_render_attribute('button_text', 'class', 'bdevs-btn-text');
        $this->add_render_attribute('button', 'class', 'bdevs-btn site-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <?php if ($settings['design_style'] === 'style_2'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
        ?>
        <section class="banner__area banner__area--2 pt-135 pb-135 bg_img"
                 data-background="<?php echo esc_url($bg_image); ?>">
            <div class="banner-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 offset-xl-6 col-lg-6 offset-lg-6 col-md-7 offset-md-5 col-sm-7 offset-sm-5">
                            <div class="bannertext bannertext__2">
                                <?php if ($settings['video_url']) : ?>
                                    <a href="<?php echo esc_url($settings['video_url']); ?>"
                                       data-rel="lightcase:myCollection"
                                       data-animation="fadeInLeft" data-delay=".1s" class="video-link mb-70">
                                        <div class="video-play-wrap">
                                            <div class="video-mark">
                                                <div class="wave-pulse wave-pulse-1"></div>
                                                <div class="wave-pulse wave-pulse-2"></div>
                                            </div>
                                            <div class="video-play">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php if ($settings['subtitle']) : ?>
                                    <h5 class="subheading mb-15"><span
                                                class="mr-10">//</span><?php echo bdevs_element_kses_intermediate($settings['subtitle']); ?>
                                    </h5>
                                <?php endif; ?>
                                <?php
                                if ($settings['title']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        bdevs_element_kses_basic($settings['title'])
                                    );
                                endif;
                                ?>
                                <?php if ($settings['description']) : ?>
                                    <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($settings['button_link'])) : ?>
                                    <div class="buttons mt-35">
                                        <!-- button one  -->
                                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                            $this->add_render_attribute('button', 'class', 'site-btn');
                                            printf('<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string('button'),
                                                esc_html($settings['button_text'])
                                            );
                                        elseif (empty($settings['button_text']) && (!(empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                        <?php elseif ($settings['button_text'] && (!(empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                            if ($settings['button_icon_position'] === 'before') :
                                                $this->add_render_attribute('button', 'class', 'site-btn bdevs-btn--icon-before');
                                                $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                                ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?><?php echo $button_text; ?></a>
                                            <?php
                                            else :
                                                $this->add_render_attribute('button', 'class', 'bdevs-btn--icon-after');
                                                $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                                ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php echo $button_text; ?><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                            <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else :
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
        ?>
        <section class="banner__area pt-180 pb-135 bg_img" data-background="<?php echo esc_url($bg_image); ?>">
            <div class="banner-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-7 col-sm-9">
                            <div class="bannertext">
                                <?php if ($settings['subtitle']) : ?>
                                    <span><?php echo bdevs_element_kses_intermediate($settings['subtitle']); ?></span>
                                <?php endif; ?>
                                <?php
                                if ($settings['title']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        bdevs_element_kses_basic($settings['title'])
                                    );
                                endif;
                                ?>

                                <?php if (!empty($settings['button_link'])) : ?>
                                    <div class="buttons mt-35">
                                        <!-- button one  -->
                                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                            $this->add_render_attribute('button', 'class', 'site-btn');
                                            printf('<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string('button'),
                                                esc_html($settings['button_text'])
                                            );
                                        elseif (empty($settings['button_text']) && (!(empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                        <?php elseif ($settings['button_text'] && (!(empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                            if ($settings['button_icon_position'] === 'before') :
                                                $this->add_render_attribute('button', 'class', 'site-btn bdevs-btn--icon-before');
                                                $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                                ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?><?php echo $button_text; ?></a>
                                            <?php
                                            else :
                                                $this->add_render_attribute('button', 'class', 'bdevs-btn--icon-after');
                                                $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                                ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php echo $button_text; ?><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                            <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($settings['description']) : ?>
                                    <h6><?php echo bdevs_element_kses_intermediate($settings['description']); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['slides']) && $settings['fact_show_hide'] == 'yes'): ?>
                            <div class="col-xl-4 col-lg-6 offset-xl-2 col-md-5 mmt-auto">
                                <div class="banner__rightbox">
                                    <?php foreach ($settings['slides'] as $slide) : ?>
                                        <div class="banner__rightbox--item">
                                            <div class="circle">
                                                <input type="text" class="knob" value="0"
                                                       data-rel="<?php echo esc_attr($slide['number']); ?>"
                                                       data-linecap="round" data-width="75"
                                                       data-height="75" data-bgcolor="#DEF5FF" data-fgcolor="#086AD8"
                                                       data-thickness=".10"
                                                       data-readonly="true" disabled>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($slide['subtitle'])) : ?>
                                                    <h3 class="title"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h3>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['description'])) : ?>
                                                    <p><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($image)) : ?>
                <div class="banner-img">
                    <img src="<?php echo esc_url($image); ?>" alt="Hello">
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

        <?php
    }

}