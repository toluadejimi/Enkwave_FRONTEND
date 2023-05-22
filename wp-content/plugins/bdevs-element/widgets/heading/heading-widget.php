<?php

namespace BdevsElement\Widget;


use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Group_Control_Background;


defined('ABSPATH') || die();

class Heading extends BDevs_El_Widget
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
        return 'heading';
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
        return __('Heading', 'bdevselement');
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

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
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
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Description Text', 'bdevselement'),
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

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
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
                    'style_4' => __('Style 4: white text', 'bdevselement'),
                    'style_5' => __('Style 5: only button', 'bdevselement'),
                    'style_6' => __('Style 6: faq', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2', 'style_5', 'style_6']
                ],
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
                    '{{WRAPPER}} .bdevs-btn--icon-befor.bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after.bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
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
            'heading_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .section__heading--title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blend_mode',
            [
                'label' => __('Blend Mode', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __('Normal', 'bdevselement'),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'difference' => 'Difference',
                    'exclusion' => 'Exclusion',
                    'hue' => 'Hue',
                    'luminosity' => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .section__heading--title-small',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title-small',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__heading--title-small,{{WRAPPER}} .section__heading--title-small span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // content

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Content', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_desc_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading p,{{WRAPPER}} .faq-wrap p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_desc_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section__heading p,{{WRAPPER}} .faq-wrap p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .section__heading p,{{WRAPPER}} .faq-wrap p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'description',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading p,{{WRAPPER}} .faq-wrap p',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__heading p,{{WRAPPER}} .faq-wrap p' => 'color: {{VALUE}};',
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
                    'design_style' => ['style_2','style_5','style_6']
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
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .inline-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span,{{WRAPPER}} .inline-btn,{{WRAPPER}} .inline-btn span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .inline-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .inline-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .site-btn,{{WRAPPER}} .inline-btn',
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
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .site-btn span,{{WRAPPER}} .inline-btn,{{WRAPPER}} .inline-btn span,{{WRAPPER}} .inline-btn span::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn,{{WRAPPER}} .inline-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .site-btn:hover span,{{WRAPPER}} .inline-btn:hover,{{WRAPPER}} .inline-btn:hover span,{{WRAPPER}} .inline-btn:hover span::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .inline-btn:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .site-btn:hover,{{WRAPPER}} .site-btn:hover span,{{WRAPPER}} .inline-btn:hover' => 'border-color: {{VALUE}};',
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
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $title = bdevs_element_kses_basic($settings['title']);
        ?>
        <?php if ($settings['design_style'] === 'style_6'):
        $this->add_render_attribute('button', 'class', 'inline-btn');
        ?>
        <?php if (!empty($settings['title'])) : ?>
            <div class="faw-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="faq-wrap pt-45 pb-45">
                                <p>
                                    <?php echo bdevs_element_kses_basic($settings['title']); ?>
                                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                        printf('<a %1$s><span>%2$s</span></a>',
                                            $this->get_render_attribute_string('button'),
                                            esc_html($settings['button_text'])
                                        );
                                    elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                        ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                    <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                        if ($settings['button_icon_position'] === 'before'): ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                                <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-befor bdevs-btn-icon']); ?>
                                                <span><?php echo esc_html($settings['button_text']); ?></span>
                                            </a>
                                        <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                                <span><?php echo esc_html($settings['button_text']); ?></span>
                                                <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-after bdevs-btn-icon']); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php elseif ($settings['design_style'] === 'style_5'):
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        $this->add_render_attribute('button', 'class', 'site-btn');
        ?>
        <?php if (!empty($settings['title'])) : ?>
            <div class="button-area">
                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                    printf('<a %1$s>%2$s</a>',
                        $this->get_render_attribute_string('button'),
                        esc_html($settings['button_text']),
                        esc_url($settings['button_link']['url'])
                    );
                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                    ?>
                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                    if ($settings['button_icon_position'] === 'before'): ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>><span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-befor bdevs-btn-icon']); ?></span> <?php echo esc_html($settings['button_text']); ?>
                        </a>
                    <?php
                    else: ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>><?php echo esc_html($settings['button_text']); ?>
                            <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-after bdevs-btn-icon']); ?></span></a>
                    <?php
                    endif;
                endif; ?>
            </div>
        <?php endif; ?>
    <?php elseif ($settings['design_style'] === 'style_4'):
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('title', 'data-wow-delay', '.2s');
        ?>
        <div class="section__heading white">
            <?php if (!empty($settings['sub_title'])) : ?>
                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
            <?php endif; ?>
            <?php if (!empty($settings['description'])) : ?>
                <h1 class="section__heading--transparent"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></h1>
            <?php endif; ?>
            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                tag_escape($settings['title_tag']),
                $this->get_render_attribute_string('title'),
                $title
            ); ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_3'):
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $this->add_render_attribute('title', 'data-wow-delay', '.2s');
        ?>
        <div class="title-area-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="section-title section__title-3">
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                            <?php if (!empty($settings['description'])) : ?>
                                <p class="wow fadeInUp" data-wow-delay=".4s">
                                    <?php echo bdevs_element_kses_intermediate($settings['description']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($settings['design_style'] === 'style_2'):
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
        $this->add_render_attribute('button', 'class', 'site-btn mt-10');
        ?>
        <?php if ($settings['title']) : ?>
            <div class="container">
                <div class="row mb-20">
                    <div class="col-xl-6 col-lg-6 col-md-7">
                        <div class="section__heading">
                            <?php if (!empty($settings['sub_title'])) : ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5 text-md-right text-left mt-sm-3">
                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                            printf('<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string('button'),
                                esc_html($settings['button_text'])
                            );
                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            if ($settings['button_icon_position'] === 'before'): ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                    <span><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn--icon-befor bdevs-btn-icon']); ?></span>
                                    <?php echo esc_html($settings['button_text']); ?>
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
            </div>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($settings['title']) : ?>
            <div class="section__heading">
                <?php if (!empty($settings['sub_title'])) : ?>
                    <h4 class="section__heading--title-small">
                        <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?>
                    </h4>
                <?php endif; ?>
                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                    tag_escape($settings['title_tag']),
                    $this->get_render_attribute_string('title'),
                    $title
                ); ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p <?php $this->print_render_attribute_string('details'); ?>><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
        <?php
    }
}
