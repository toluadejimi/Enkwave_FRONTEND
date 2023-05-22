<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
use \Elementor\Scheme_Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

defined('ABSPATH') || die();

class Pricing_Table extends BDevs_El_Widget
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
        return 'pricing_table';
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
        return __('Pricing Table', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/pricing-table/';
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
        return 'eicon-table-of-contents';
    }

    public function get_keywords()
    {
        return ['pricing', 'price', 'table', 'package', 'product', 'plan'];
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

        $this->add_control(
            'active_price',
            [
                'label' => __('Active Price', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => false,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_media',
            [
                'label' => __('Icon / Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
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

        $this->add_control(
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
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
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
            $this->add_control(
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_header',
            [
                'label' => __('Header', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Basic', 'bdevselement'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('description', 'bdevselement'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => __('Pricing', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __('Currency', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => __('None', 'bdevselement'),
                    'baht' => '&#3647; ' . _x('Baht', 'Currency Symbol', 'bdevselement'),
                    'bdt' => '&#2547; ' . _x('BD Taka', 'Currency Symbol', 'bdevselement'),
                    'dollar' => '&#36; ' . _x('Dollar', 'Currency Symbol', 'bdevselement'),
                    'euro' => '&#128; ' . _x('Euro', 'Currency Symbol', 'bdevselement'),
                    'franc' => '&#8355; ' . _x('Franc', 'Currency Symbol', 'bdevselement'),
                    'guilder' => '&fnof; ' . _x('Guilder', 'Currency Symbol', 'bdevselement'),
                    'krona' => 'kr ' . _x('Krona', 'Currency Symbol', 'bdevselement'),
                    'lira' => '&#8356; ' . _x('Lira', 'Currency Symbol', 'bdevselement'),
                    'peseta' => '&#8359 ' . _x('Peseta', 'Currency Symbol', 'bdevselement'),
                    'peso' => '&#8369; ' . _x('Peso', 'Currency Symbol', 'bdevselement'),
                    'pound' => '&#163; ' . _x('Pound Sterling', 'Currency Symbol', 'bdevselement'),
                    'real' => 'R$ ' . _x('Real', 'Currency Symbol', 'bdevselement'),
                    'ruble' => '&#8381; ' . _x('Ruble', 'Currency Symbol', 'bdevselement'),
                    'rupee' => '&#8360; ' . _x('Rupee', 'Currency Symbol', 'bdevselement'),
                    'indian_rupee' => '&#8377; ' . _x('Rupee (Indian)', 'Currency Symbol', 'bdevselement'),
                    'shekel' => '&#8362; ' . _x('Shekel', 'Currency Symbol', 'bdevselement'),
                    'won' => '&#8361; ' . _x('Won', 'Currency Symbol', 'bdevselement'),
                    'yen' => '&#165; ' . _x('Yen/Yuan', 'Currency Symbol', 'bdevselement'),
                    'custom' => __('Custom', 'bdevselement'),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => __('Custom Symbol', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Price', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => '9.99',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => __('Period', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Per Month', 'bdevselement'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features',
            [
                'label' => __('Features', 'bdevselement'),
            ]
        );

        $this->add_control(
            'features_title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Features', 'bdevselement'),
                'separator' => 'after',
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'features_switch',
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

        $repeater = new Repeater();

        $repeater->add_control(
            'active_list',
            [
                'label' => __('Disable List', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Exciting Feature', 'bdevselement'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'type' => Controls_Manager::ICON,
                    'label_block' => false,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-check',
                    'include' => [
                        'fa fa-check',
                        'fa fa-close',
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'fa-solid',
                    ],
                    'recommended' => [
                        'fa-regular' => [
                            'check-square',
                            'window-close',
                        ],
                        'fa-solid' => [
                            'check',
                        ]
                    ]
                ]
            );
        }

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'text' => __('Standard Feature', 'bdevselement'),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __('Another Great Feature', 'bdevselement'),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __('Obsolete Feature', 'bdevselement'),
                        'icon' => 'fa fa-close',
                    ],
                    [
                        'text' => __('Exciting Feature', 'bdevselement'),
                        'icon' => 'fa fa-check',
                    ],
                ],
                'title_field' => '<# print(text); #>',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_footer',
            [
                'label' => __('Price Footer', 'bdevselement'),
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
                    '{{WRAPPER}} .bdevs-btn--icon-before.bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after.bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_badge',
            [
                'label' => __('Badge', 'bdevselement'),
            ]
        );

        $this->add_control(
            'show_badge',
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
            'badge_position',
            [
                'label' => __('Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'left',
                'style_transfer' => true,
                'condition' => [
                    'show_badge' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Badge Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Recommended', 'bdevselement'),
                'placeholder' => __('Type badge text', 'bdevselement'),
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'dynamic' => [
                    'active' => true
                ]
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
                    '{{WRAPPER}} .ot-pricing-table .inner-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ot-pricing-table .inner-table .title-table span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-pricing-table .inner-table .title-table span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .ot-pricing-table .inner-table .title-table span',
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
                    '{{WRAPPER}} .ot-pricing-table .inner-table h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-pricing-table .inner-table h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .ot-pricing-table .inner-table h2',
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
                    '{{WRAPPER}} .ot-pricing-table .inner-table .short-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-pricing-table .inner-table .short-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .ot-pricing-table .inner-table .short-text',
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
                    '{{WRAPPER}} .site-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .site-btn',
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
                'selector' => '{{WRAPPER}} .site-btn',
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
                    '{{WRAPPER}} .site-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .site-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    private static function get_currency_symbol($symbol_name)
    {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset($symbols[$symbol_name]) ? $symbols[$symbol_name] : '';
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['currency'] === 'custom') {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol($settings['currency']);
        }
        ?>

        <?php if ($settings['design_style'] === 'style_2'):
        $class_name = ($settings['active_price'] == true) ? " spacial active" : "";

        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button', 'href', $settings['button_link']['url']);
        ?>
        <div class="pricing <?php print esc_attr($class_name); ?>">
            <div class="pricing__head">
                <div class="title-price">
                    <?php if ($settings['sub_title']) : ?>
                        <div class="short-sub-title">
                            <?php echo bdevs_element_kses_basic($settings['sub_title']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($settings['title']) : ?>
                        <h4 class="title"><?php echo bdevs_element_kses_basic($settings['title']); ?></h4>
                    <?php endif; ?>
                    <?php if (!empty($settings['price'])) : ?>
                        <h2 class="price">
                            <span><?php echo esc_html($currency); ?></span>
                            <?php echo bdevs_element_kses_basic($settings['price']); ?>
                            <span><?php echo bdevs_element_kses_basic($settings['period']); ?></span>
                        </h2>
                    <?php endif; ?>
                </div>

                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                    printf('<a %1$s>%2$s</a>',
                        $this->get_render_attribute_string('button'),
                        esc_html($settings['button_text'])
                    );
                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                    if ($settings['button_icon_position'] === 'before'): ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>>
                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-before bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                        </a>
                    <?php
                    else: ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-after bdevs-btn-icon']); ?></span>
                        </a>
                    <?php
                    endif;
                endif; ?>
            </div>
            <?php if (!empty($settings['image']['id']) && $settings['type'] === 'image') : ?>
                <div class="pricing-icon text-center">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php else: ?>
                <div class="pricing-icon text-center">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>
            <?php if ($settings['description']) : ?>
                <div class="short-text">
                    <?php echo bdevs_element_kses_basic($settings['description']); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['features_switch'])) : ?>
                <?php if ($settings['features_title']) : ?>
                    <div class="short-title">
                        <?php echo bdevs_element_kses_basic($settings['features_title']); ?>
                    </div>
                <?php endif; ?>
                <div class="pricing__lists br-0">
                    <ul>
                        <?php foreach ($settings['features_list'] as $feature) :
                            $feature_class = ($feature['active_list'] == 'yes') ? " active" : "";
                            ?>
                            <li class="<?php print esc_attr($feature_class); ?>">
                                <span class="icon">
                                    <?php if (!empty($feature['icon']) || !empty($feature['selected_icon']['value'])) :
                                        bdevs_element_render_icon($feature, 'icon', 'selected_icon');
                                    endif; ?>
                                </span>
                                <?php echo bdevs_element_kses_intermediate($feature['text']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if ($settings['show_badge']) : ?>
                        <div class="pricing__bottom">
                            <div class="icon"><i class="fal fa-check"></i></div>
                            <h5><?php echo esc_html($settings['badge_text']); ?></h5>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php else:
        $class_name = ($settings['active_price'] == true) ? " is-featured" : "";
        $this->add_render_attribute('button', 'class', 'site-btn');
        $this->add_render_attribute('button', 'href', $settings['button_link']['url']);
        ?>
        <div class="ot-pricing-table <?php print esc_attr($class_name); ?>">
            <?php if ($settings['show_badge']) : ?>
                <div class="badge-price">
                    <span <?php $this->print_render_attribute_string('badge_text'); ?>><?php echo esc_html($settings['badge_text']); ?></span>
                </div>
            <?php endif; ?>
            <div class="layer-behind"></div>
            <div class="inner-table">
                <?php if ($settings['title']) : ?>
                    <h6 class="title-table"><span><?php echo bdevs_element_kses_basic($settings['title']); ?></span>
                    </h6>
                <?php endif; ?>
                <?php if (!empty($settings['price'])) : ?>
                    <h2>
                        <sup><?php echo esc_html($currency); ?></sup> <?php echo bdevs_element_kses_basic($settings['price']); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($settings['period']) : ?>
                    <p><?php echo bdevs_element_kses_basic($settings['period']); ?></p>
                <?php endif; ?>

                <?php if ($settings['sub_title']) : ?>
                    <div class="short-sub-title">
                        <?php echo bdevs_element_kses_basic($settings['sub_title']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['image']['id']) && $settings['type'] === 'image') : ?>
                    <div class="pricing-icon">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                    </div>
                <?php else: ?>
                    <div class="pricing-icon">
                        <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($settings['description']) : ?>
                    <div class="short-text">
                        <?php echo bdevs_element_kses_basic($settings['description']); ?>
                    </div>
                <?php endif; ?>

                <?php if ($settings['features_title']) : ?>
                    <div class="short-title">
                        <?php echo bdevs_element_kses_basic($settings['features_title']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['features_switch'])) : ?>
                    <div class="details">
                        <ul>
                            <?php foreach ($settings['features_list'] as $key => $feature) :
                                $feature_class = ($feature['active_list'] == 'yes') ? " active" : "";
                                ?>
                                <li class="<?php print esc_attr($feature_class); ?>">
                                    <?php echo bdevs_element_kses_intermediate($feature['text']); ?>
                                    <?php if (!empty($feature['icon']) || !empty($feature['selected_icon']['value'])) :
                                        bdevs_element_render_icon($feature, 'icon', 'selected_icon');
                                    endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                    printf('<a %1$s>%2$s</a>',
                        $this->get_render_attribute_string('button'),
                        esc_html($settings['button_text'])
                    );
                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                    if ($settings['button_icon_position'] === 'before'): ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>>
                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-before bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                        </a>
                    <?php
                    else: ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-after bdevs-btn-icon']); ?></span>
                        </a>
                    <?php
                    endif;
                endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <?php
    }
}
