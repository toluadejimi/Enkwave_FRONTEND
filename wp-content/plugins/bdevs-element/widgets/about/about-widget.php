<?php

namespace BdevsElement\Widget;

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

class About extends BDevs_El_Widget
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
        return 'about';
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
        return __('About', 'bdevselement');
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
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
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
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5: About page', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
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
            'heading_switch',
            [
                'label' => __('Show', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevselement'),
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
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'quote',
            [
                'label' => __('Quote', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Quote here', 'bdevselement'),
                'placeholder' => __('Type quote description', 'bdevselement'),
                'rows' => 4,
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
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'experience',
            [
                'label' => __('Experience Content', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Experience here', 'bdevselement'),
                'placeholder' => __('Type Experience description', 'bdevselement'),
                'rows' => 4,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
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

        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Profile & Video', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Big Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __('Video URL', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Type Video URL Here', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'profile_image',
            [
                'label' => __('Profile Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'profile_name',
            [
                'label' => __('Profile Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Type Profile  Title', 'bdevselement'),
                'placeholder' => __('Type Profile Title', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_5'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'profile_designation',
            [
                'label' => __('Profile Designation', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Type Designation', 'bdevselement'),
                'placeholder' => __('Type Designation', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_5'],
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_6'],
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
                    'style_4' => __('Style 4', 'bdevselement'),
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
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} span.fea_title' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
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

        $repeater->add_control(
            'desc',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
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


        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
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
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
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
                'default' => 'after',
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
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __('Icon / Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ],
            ]
        );

        $this->add_responsive_control(
            'media_icon_size',
            [
                'label' => __('Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-play' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'media_icon_color',
            [
                'label' => __('Icon Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}  .video-play' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'media_icon_bg_color',
            [
                'label' => __('Icon Bg Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .video-play' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'media_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about__bg' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about__bg' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Description style
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
                    '{{WRAPPER}} .ab-wrapper .section__heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'sub_title_spacing',
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
            'sub_title_color',
            [
                'label' => __('Sub Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small,{{WRAPPER}} .section__heading--title-small span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title-small',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'title_heading',
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
                    '{{WRAPPER}} .section__heading--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title,{{WRAPPER}} .section__heading--title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'quote_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Quote', 'bdevselement'),
                'separator' => 'before',
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'quote_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-text .about-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quote_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-text .about-quote' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'quote_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .about-text .about-quote',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'description_heading',
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
                    '{{WRAPPER}} .section__heading--content, {{WRAPPER}} .section__heading--content-3 p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__heading--content p, {{WRAPPER}} .section__heading--content-3 p, {{WRAPPER}} .about-text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .section__heading--content::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .about__content p, {{WRAPPER}} .section__heading--content-3 p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1', 'style_6'],
                ],
            ]
        );

        $this->add_control(
            'item_icon_color',
            [
                'label' => __('Icon Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}  .about__box--icon i, {{WRAPPER}} .service__box--lists li .icon, {{WRAPPER}} .service__box--lists-wrap .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_icon_bg_color',
            [
                'label' => __('Icon Bg Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .service__box--lists li:hover .icon,{{WRAPPER}} .service__box--lists-wrap:hover .icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_icon_border',
                'selector' => '{{WRAPPER}} .service__box--lists li .icon,{{WRAPPER}} .service__box--lists-wrap .icon',
                'condition' => [
                    'design_style' => ['style_2', 'style_6'],
                ],
            ]
        );

        $this->add_responsive_control(
            'item_icon_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service__box--lists li .icon,{{WRAPPER}} .service__box--lists-wrap .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_6'],
                ],
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label' => __('Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about__box--icon i, {{WRAPPER}} .service__box--lists li .icon,{{WRAPPER}} .service__box--lists-wrap .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'item_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Heading', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'item_heading_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}  .about__box--content .about__box--title, {{WRAPPER}} .service__box--lists li, {{WRAPPER}} .service__box--lists-wrap' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_typography',
                'selector' => '{{WRAPPER}} .about__box--content .about__box--title, {{WRAPPER}} .service__box--lists li, {{WRAPPER}} .service__box--lists-wrap',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'item_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'item_description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .about__box--content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_desc_typography',
                'selector' => '{{WRAPPER}} .about__box--content p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_2', 'style_3', 'style_4', 'style_5', 'style_6'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn',
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
                    '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-content-wrap .site-btn,{{WRAPPER}} .site-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .video-content-wrap .site-btn:hover,{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .site-btn:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-content-wrap .site-btn:hover,{{WRAPPER}} .site-btn:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .video-content-wrap .site-btn:hover,{{WRAPPER}} .site-btn:hover' => 'border-color: {{VALUE}};',
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
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('button', 'class', 'site-btn');
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>

        <section class="about__area about__area--7 pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 pr-55">
                        <div class="about__bg about__bg--7 bg_img" data-background="<?php echo esc_attr($bg_image) ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 pl-20">
                        <div class="about__wrap about__wrap--4">
                            <div class="section__heading mb-35">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <h4 class="section__heading--title-small">
                                        <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                                    </h4>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                                <?php if ($settings['quote']): ?>
                                    <div class="section__heading--content-3 mt-20">
                                        <p><?php echo bdevs_element_kses_intermediate($settings['quote']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row service__box--lists mb-20">
                                <?php if (!empty($settings['slides'])):
                                    foreach ($settings['slides'] as $key => $slide):
                                        if (!empty($slide['image']['id'])) {
                                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                        }
                                        ?>
                                        <div class="col-xl-6">
                                            <div class="service__box--lists-wrap">
                                                <span class="icon">
                                                    <?php if (!empty($slide['selected_icon'])): ?>
                                                        <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                                                    <?php endif; ?>
                                                </span>
                                                <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></span></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                        <?php echo esc_html($settings['button_text']); ?></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_5'):

        $bg_image = '';
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $profile_image = '';
        if (!empty($settings['profile_image']['id'])) {
            $profile_image = wp_get_attachment_image_url($settings['profile_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'site-btn mt-35');
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>

        <section class="about-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="about-left-side pos-rel mb-30">
                            <?php if (!empty($bg_image)): ?>
                                <div class="about-front-img about-front-img-2">
                                    <img src="<?php echo esc_url($bg_image); ?>" alt="logo">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['experience'])): ?>
                                <div class="about-exp">
                                    <?php echo bdevs_element_kses_intermediate($settings['experience']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about-right-side mb-30 mt-15">
                            <div class="section__heading mb-30">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <div class="about-text">
                                <?php if (!empty($settings['quote'])): ?>
                                    <p class="about-quote"><?php echo bdevs_element_kses_intermediate($settings['quote']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($settings['description'])): ?>
                                    <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="about-author d-flex align-items-center">
                                <?php if (!empty($profile_image)): ?>
                                    <div class="author-ava">
                                        <img src="<?php echo esc_url($profile_image); ?>" alt="logo">
                                    </div>
                                <?php endif; ?>
                                <div class="author-desination">
                                    <?php if (!empty($settings['profile_name'])): ?>
                                        <h4><?php echo bdevs_element_kses_basic($settings['profile_name']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['profile_designation'])): ?>
                                        <h6><?php echo bdevs_element_kses_basic($settings['profile_designation']); ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($settings['button_text']) && (empty($settings['button_selected_icon']['value']) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && (!empty($settings['button_selected_icon']['value']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></span></a>
                            <?php elseif (!empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                        <?php echo esc_html($settings['button_text']); ?></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] === 'style_4'):

        $bg_image = '';
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'site-btn mt-35');
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>
        <section class="about__area about__area--2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section__heading mb-30">
                            <?php if (!empty($settings['sub_title'])): ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <?php if (!empty($settings['quote'])): ?>
                                <div class="section__heading--content mt-20">
                                    <p><?php echo bdevs_element_kses_intermediate($settings['quote']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="about__box about__box--2">
                            <?php if (!empty($settings['description'])): ?>
                                <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></span></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                        <?php echo esc_html($settings['button_text']); ?></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                    <?php if (!empty($bg_image)): ?>
                        <div class="col-xl-6 col-lg-6 text-right">
                            <div class="about__bg about__bg--2" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($bg_image); ?>" alt="prifle image">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] === 'style_2'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'site-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>
        <section class="video__area bg_img pt-100 pb-130" data-background="<?php echo esc_url($bg_image); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <div class="video-content-wrap">
                            <div class="section__heading mb-35">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                                <?php if ($settings['description']): ?>
                                    <div class="section__heading--content-3 mt-20">
                                        <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row mt-none-20">
                                <?php if (!empty($settings['slides'])):
                                    foreach ($settings['slides'] as $key => $slide): ?>
                                        <div class="col-xl-6 col-md-6 mt-20">
                                            <ul class="service__box--lists">
                                                <li>
                                                    <span class="icon"><?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text']),
                                    esc_url($settings['button_link']['url'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></span></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                        <?php echo esc_html($settings['button_text']); ?></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <?php echo esc_html($settings['button_text']); ?>
                                        <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-2 offset-lg-1 col-lg-3 align-self-center video-btn-wrap">
                        <?php if (!empty($settings['video_url'])): ?>
                            <a href="<?php echo esc_url($settings['video_url']); ?>" data-rel="lightcase:myCollection"
                               data-animation="fadeInLeft" data-delay=".1s" class="video-link">
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
                    </div>
                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] === 'style_3'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'site-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>
        <section class="webmasterpice-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="section__heading mb-35">
                            <?php if (!empty($settings['sub_title'])): ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                            <?php if ($settings['quote']): ?>
                                <div class="section__heading--content mt-20">
                                    <p><?php echo bdevs_element_kses_intermediate($settings['quote']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="webmasterpice__content mt-35">
                            <?php if ($settings['description']): ?>
                                <p><?php echo bdevs_element_kses_intermediate($settings['quote']); ?></p>
                            <?php endif; ?>

                            <div class="mt-25">
                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text']),
                                        esc_url($settings['button_link']['url'])
                                    );
                                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></span></a>
                                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                    if ($settings['button_icon_position'] === 'before'): ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                            <?php echo esc_html($settings['button_text']); ?></a>
                                    <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>>
                                            <?php echo esc_html($settings['button_text']); ?>
                                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span>
                                        </a>
                                    <?php
                                    endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row webmasterpice">
                            <?php if (!empty($settings['slides'])):
                                foreach ($settings['slides'] as $key => $slide):
                                    if (!empty($slide['image']['id'])) {
                                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                    }
                                    ?>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="webmasterpice__box elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?> mb-30">
                                            <div class="icon">
                                                <?php if (!empty($slide['selected_icon'])): ?>
                                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                                                <?php endif; ?>
                                            </div>
                                            <span class="fea_title"><?php echo bdevs_element_kses_basic($slide['title']); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else:
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        } ?>
        <section class="about__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="about__wrap pt-95 pb-95" data-overlay>
                            <div class="row justify-content-end">
                                <?php if (!empty($bg_image)): ?>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="about__bg">
                                        <img src="<?php echo esc_url($bg_image); ?>" alt="Hello">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 mt-30">
                                    <?php endif; ?>
                                    <div class="ab-wrapper">
                                        <div class="section__heading mb-35">
                                            <?php if (!empty($settings['sub_title'])): ?>
                                                <h4 class="section__heading--title-small">
                                                    <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                                                </h4>
                                            <?php endif; ?>
                                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['title_tag']),
                                                $this->get_render_attribute_string('title'),
                                                $title
                                            ); ?>
                                            <?php if ($settings['description']): ?>
                                                <div class="section__heading--content mt-20">
                                                    <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="about__box">
                                            <div class="row mt-none-30">
                                                <?php if (!empty($settings['slides'])):
                                                    foreach ($settings['slides'] as $key => $slide): ?>
                                                        <div class="col-xl-6 col-md-6 mt-30">
                                                            <div class="about__box--item">
                                                                <?php if (!empty($slide['selected_icon'])): ?>
                                                                    <div class="about__box--icon">
                                                                        <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="about__box--content">
                                                                    <?php if (!empty($slide['title'])) : ?>
                                                                        <h5 class="about__box--title">
                                                                            <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                                                        </h5>
                                                                    <?php endif; ?>
                                                                    <?php if (!empty($slide['desc'])) : ?>
                                                                        <p><?php echo bdevs_element_kses_intermediate($slide['desc']); ?></p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($bg_image)): ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
        <?php
    }
}