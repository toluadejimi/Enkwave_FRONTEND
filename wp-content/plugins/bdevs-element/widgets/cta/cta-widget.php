<?php

namespace BdevsElement\Widget;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;


defined('ABSPATH') || die();

class CTA extends BDevs_El_Widget
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
        return 'cta';
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
        return __('CTA', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/widgets/gradient-heading/';
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
        return 'eicon-t-letter';
    }

    public function get_keywords()
    {
        return ['gradient', 'advanced', 'heading', 'title', 'colorful'];
    }

    protected function register_content_controls()
    {

        //Settings
        $this->start_controls_section(
            '_section_settings',
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
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        //desc
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Desccription', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevselement'),
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
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'desccription',
            [
                'label' => __('Desccription', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Desccription Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
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
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4']
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
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
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
                'default' => 'h2',
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
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
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
                    'design_style' => 'style_4'
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
            'fact',
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


        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2'],
                ],
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
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'fea_bg',
            [
                'label' => __('BG Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'selectors' => [
                    '{{WRAPPER}}  {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'fea_text_color',
            [
                'label' => __('Tex Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'title',
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
                ]
            ]
        );

        $this->end_controls_section();

        //button
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
                'label' => __('Button Text', 'bdevselement'),
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


        // 2nd btn
        $this->add_control(
            'button_text2',
            [
                'label' => __('Button Text 2', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_4']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link2',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_4']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'button_icon2',
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
                'button_selected_icon2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position2',
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
            'button_icon_spacing2',
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
            '_section_title_style',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading, {{WRAPPER}} .faqs--2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small, {{WRAPPER}} .section__heading--title-small span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title-small',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__heading h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading h2',
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
                    '{{WRAPPER}} .integration__content p, {{WRAPPER}} .section__heading--content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .integration__content p, {{WRAPPER}} .section__heading--content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .integration__content p, {{WRAPPER}} .section__heading--content p',
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
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn',
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
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn, {{WRAPPER}} .integration__btns .site-btn, {{WRAPPER}} .site-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn:hover, {{WRAPPER}} .integration__btns .site-btn:hover, {{WRAPPER}} .site-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn:hover, {{WRAPPER}} .integration__btns .site-btn:hover, {{WRAPPER}} .site-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .site-btn:hover, {{WRAPPER}} .integration__btns .site-btn:hover, {{WRAPPER}} .site-btn:hover' => 'border-color: {{VALUE}};',
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
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent',
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
                    '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .transparent, {{WRAPPER}} .integration__btns .transparent, {{WRAPPER}} .site-btn.transparent' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .cta__area .cta__btns .transparent:hover, {{WRAPPER}} .integration__btns .transparent:hover, {{WRAPPER}} .site-btn.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__btns .transparent:hover, {{WRAPPER}} .integration__btns .transparent:hover, {{WRAPPER}} .site-btn.transparent:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .cta__area .cta__btns .transparent:hover, {{WRAPPER}} .integration__btns .transparent:hover, {{WRAPPER}} .site-btn.transparent:hover' => 'border-color: {{VALUE}};',
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
        $title = bdevs_element_kses_basic($settings['title']);

        ?>

        <?php if ($settings['design_style'] === 'style_6'):


        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');

        $this->add_render_attribute('button', 'class', 'site-btn mt-95');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }


        if (!empty($image)) {
            $image = $settings['image']['url'];
        }

        ?>

        <section class="cta__area cta__area--2 cta__area--3 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="section__heading mb-40">
                            <?php if ($settings['sub_title']) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <?php if ($settings['desccription']) : ?>
                                <div class="section__heading--content mt-20">
                                    <p><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 text-right">
                        <?php if (!empty($settings['button_link']['url'])) : ?>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                <?php
                                endif;
                            endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_5'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');

        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button2', 'class', 'site-btn white transparent');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        if (!empty($settings['button_link2'])) {
            $this->add_link_attributes('button2', $settings['button_link2']);
        }

        if (!empty($image)) {
            $image = $settings['image']['url'];
        }

        ?>

        <section class="cta__area cta__area--2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="section__heading mb-40">
                            <?php if ($settings['sub_title']) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <?php if ($settings['desccription']) : ?>
                                <div class="section__heading--content mt-20">
                                    <p><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 text-right mt-95">
                        <?php if (!empty($settings['button_link']['url'])) : ?>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                <?php
                                endif;
                            endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_4'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');

        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button2', 'class', 'site-btn white transparent');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        if (!empty($settings['button_link2'])) {
            $this->add_link_attributes('button2', $settings['button_link2']);
        }

        ?>

        <section class="itstaffs-areas">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="section__heading white mb-40">
                            <?php if ($settings['sub_title']) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="itstaffs__btns">
                            <?php if (!empty($settings['button_link']['url'])) : ?>
                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text'])
                                    );
                                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                    if ($settings['button_icon_position'] === 'before'): ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                        </a>
                                    <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                    <?php
                                    endif;
                                endif; ?>
                            <?php endif; ?>

                            <!-- btn 2 -->
                            <?php if (!empty($settings['button_link2']['url'])) : ?>
                                <?php if ($settings['button_text2'] && ((empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) && empty($settings['button_icon2']))) :
                                    printf('<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string('button2'),
                                        esc_html($settings['button_text2'])
                                    );
                                elseif (empty($settings['button_text2']) && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) : ?>
                                    <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2'); ?></a>
                                <?php elseif ($settings['button_text2'] && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) :
                                    if ($settings['button_icon_position2'] === 'before'): ?>
                                        <a <?php $this->print_render_attribute_string('button2'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span> <?php echo esc_html($settings['button_text2']); ?>
                                        </a>
                                    <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string('button2'); ?>><?php echo esc_html($settings['button_text2']); ?>
                                            <span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span></a>
                                    <?php
                                    endif;
                                endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($settings['fact_show_hide'] == 'yes'): ?>
                        <div class="col-xl-4 offset-xl-1">
                            <div class="itstaffs-wrap">
                                <?php foreach ($settings['fact'] as $slide) : ?>
                                    <div class="banner__rightbox">
                                        <div class="banner__rightbox--item mr-30">
                                            <div class="circle">
                                                <input type="text" class="knob" value="0"
                                                       data-rel="<?php echo esc_attr($slide['number']); ?>"
                                                       data-linecap="round" data-width="75"
                                                       data-height="75" data-bgcolor="#DEF5FF" data-fgcolor="#086AD8"
                                                       data-thickness=".10" data-readonly="true"
                                                       disabled>
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
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_3'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');

        $this->add_render_attribute('button', 'class', 'site-btn mt-40');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }

        ?>

        <section class="cta__area cta__area--2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="section__heading white">
                            <?php if ($settings['sub_title']) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                    </div>
                    <div class="col-xl-6 text-right">
                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                            printf('<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string('button'),
                                esc_html($settings['button_text'])
                            );
                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            if ($settings['button_icon_position'] === 'before'): ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                </a>
                            <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                    <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                            <?php
                            endif;
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');

        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button2', 'class', 'site-btn white transparent');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        if (!empty($settings['button_link2'])) {
            $this->add_link_attributes('button2', $settings['button_link2']);
        }

        if (!empty($image)) {
            $image = $settings['image']['url'];
        }

        ?>

        <section class="integration__areas">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="integration">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 text-center">
                                    <div class="section__heading white mb-15">
                                        <?php if ($settings['sub_title']) : ?>
                                            <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                                        <?php endif; ?>

                                        <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            $title
                                        ); ?>

                                    </div>
                                    <div class="integration__content">
                                        <?php if ($settings['desccription']) : ?>
                                            <p><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
                                        <?php endif; ?>
                                        <div class="integration__btns mt-35">
                                            <?php if (!empty($settings['button_link']['url'])) : ?>
                                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                                    printf('<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button'),
                                                        esc_html($settings['button_text'])
                                                    );
                                                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                                    if ($settings['button_icon_position'] === 'before'): ?>
                                                        <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                                        </a>
                                                    <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                    <?php
                                                    endif;
                                                endif; ?>
                                            <?php endif; ?>

                                            <!-- btn 2 -->
                                            <?php if (!empty($settings['button_link2']['url'])) : ?>
                                                <?php if ($settings['button_text2'] && ((empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) && empty($settings['button_icon2']))) :
                                                    printf('<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button2'),
                                                        esc_html($settings['button_text2'])
                                                    );
                                                elseif (empty($settings['button_text2']) && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2'); ?></a>
                                                <?php elseif ($settings['button_text2'] && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) :
                                                    if ($settings['button_icon_position2'] === 'before'): ?>
                                                        <a <?php $this->print_render_attribute_string('button2'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span> <?php echo esc_html($settings['button_text2']); ?>
                                                        </a>
                                                    <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string('button2'); ?>><?php echo esc_html($settings['button_text2']); ?>
                                                            <span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span></a>
                                                    <?php
                                                    endif;
                                                endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="integration__icon">
                                <?php if (!empty($settings['slides'])):
                                    foreach ($settings['slides'] as $key => $slide):
                                        if (!empty($slide['image']['id'])) {
                                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                        }
                                        ?>
                                        <div class="integration__icons--box elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                            <?php if (!empty($slide['selected_icon'])): ?>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php else:

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');

        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button2', 'class', 'site-btn white transparent');

        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        if (!empty($settings['button_link2'])) {
            $this->add_link_attributes('button2', $settings['button_link2']);
        }
        ?>

        <section class="cta__area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 text-center">
                        <div class="section__heading white mb-40">
                            <?php if ($settings['sub_title']) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <div class="cta__btns">
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                <?php
                                endif;
                            endif; ?>

                            <!-- btn 2 -->
                            <?php if ($settings['button_text2'] && ((empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) && empty($settings['button_icon2']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button2'),
                                    esc_html($settings['button_text2'])
                                );
                            elseif (empty($settings['button_text2']) && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) : ?>
                                <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2'); ?></a>
                            <?php elseif ($settings['button_text2'] && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) :
                                if ($settings['button_icon_position2'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button2'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span> <?php echo esc_html($settings['button_text2']); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button2'); ?>><?php echo esc_html($settings['button_text2']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?></span></a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

        <?php
    }
}
