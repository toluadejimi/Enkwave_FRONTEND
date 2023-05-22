<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Fact extends BDevs_El_Widget
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
        return 'fact';
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
        return __('Fact', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/fact/';
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
        return 'eicon-save-o';
    }

    public function get_keywords()
    {
        return ['fact', 'image', 'counter'];
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
            '_section_slides',
            [
                'label' => __('Fact List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
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
                        'type' => 'icon',
                        'field_condition' => ['style_2'],
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
                        'type' => 'icon',
                        'field_condition' => ['style_2'],
                    ]
                ]
            );
        }

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

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5']
                ],
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
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
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
                'label' => __('Title & Desccription', 'bdevselement'),
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
                    '{{WRAPPER}} .counter__item .counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter__item .counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .counter__item .counter',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .counter__item .counter',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .counter__item .counter' => 'mix-blend-mode: {{VALUE}};',
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
                    '{{WRAPPER}} .counter__item .cta__content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter__item .cta__content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .counter__item span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter__item span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .counter__item span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .counter__item span',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title_2', 'class', 'section-title white-color');
        $this->add_render_attribute('title', 'class', 'title');

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes('button_text', 'none');
            $this->add_render_attribute('button_text', 'class', 'bdevs-btn-text');
            $this->add_render_attribute('button', 'class', 'bdevs-btn bt-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text');

        if (empty($settings['slides'])) {
            return;
        }
        ?>

        <?php if ($settings['design_style'] === 'style_3'): ?>
        <section class="counter__area">
            <div class="container">
                <div class="counter__inner white-bg wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $key => $slide) : ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="counter__item text-center mb-30">
                                    <h2 class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?></h2>
                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <span><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['description'])) : ?>
                                        <p class="mt-15"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'): ?>
        <section class="counter__area counter__area-2">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide) : ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="counter__item counter__item-2 text-center mb-30">
                                <h2 class="counter elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>"><?php echo bdevs_element_kses_basic($slide['number']); ?></h2>
                                <?php if (!empty($slide['subtitle'])) : ?>
                                    <span><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($slide['description'])) : ?>
                                    <p class="mt-15"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_3'):
        // bg_image
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (!$bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }
        }
        ?>
        <section class="features2">
            <div class="features2__item1">
                <div class="features2__thumb1" data-background="<?php echo esc_url($bg_image); ?>"></div>
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col-xl-6 offset-xl-6">
                            <div class="features2__item1__wrapper">
                                <div class="title_style1 mb-65">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>

                                    <?php printf('<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>
                                </div>
                                <div class="row">
                                    <?php foreach ($settings['slides'] as $key => $slide) : ?>
                                        <div class="col-sm-6 text-center">
                                            <div class="counter1__item mb-50">
                                                <div class="progress-circular mb-30">
                                                    <input type="text" class="knob" value="0"
                                                           data-rel="<?php echo bdevs_element_kses_basic($slide['number']); ?>"
                                                           data-linecap="round"
                                                           data-width="200" data-height="200" data-bgcolor="#314D79"
                                                           data-fgcolor="<?php echo bdevs_element_kses_basic($slide['skill_color']); ?>"
                                                           data-thickness=".10" data-readonly="true" disabled/>
                                                </div>
                                                <div class="counter1__content">
                                                    <?php if (!empty($slide['back_number'])) : ?>
                                                        <h3 class="counter1__content--bg"><?php echo bdevs_element_kses_basic($slide['back_number']); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if (!empty($slide['subtitle'])) : ?>
                                                        <h4><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h4>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_4'): ?>
        <section class="counter-wraper">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-couter single-couter-2 mb-30">
                                <div class="counter-icon">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <figure>
                                            <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                                <div class="counter-text-box">
                                    <?php if (!empty($slide['number'])) : ?>
                                        <h1>
                                            <span class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?> </span>+
                                        </h1>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <h3><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h3>
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
        </section>
    <?php else: ?>
        <div class="fact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="counter__wrap">
                            <div class="row mt-none-30">
                                <?php foreach ($settings['slides'] as $slide) : ?>
                                    <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
                                        <div class="counter__box">
                                            <?php if (!empty($slide['number'])) : ?>
                                                <h2 class="title">
                                                    <span class="counter big"><?php echo bdevs_element_kses_basic($slide['number']); ?></span><?php if (!empty($slide['subtitle'])) : ?><span class="big"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></span><?php endif; ?>+
                                                </h2>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['description'])) : ?>
                                                <p><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

        <?php
    }
}
