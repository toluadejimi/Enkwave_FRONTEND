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

defined('ABSPATH') || die();

class Testimonial_Slider extends BDevs_El_Widget
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
        return 'testimonial_slider';
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
        return __('Testimonial Slider', 'bdevselement');
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
        return 'eicon-blockquote';
    }

    public function get_keywords()
    {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
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
                    'style_3' => __('Style 3', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => ['style_10']
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
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
                    'style_1' => __('Style 1', 'bdevselement')
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('profile Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Message', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Client Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Designation Name', 'bdevselement'),
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
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

    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('Slider Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Slide Content', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_10']
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
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
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
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
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
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
                'label' => __('Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_2','style_3']
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
            'border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonials__3 .owl-item .testimonial' => 'border-color: {{VALUE}};',
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
            'border_color_active',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonials__3 .owl-item.center .testimonial' => 'border-color: {{VALUE}};',
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
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
                    '{{WRAPPER}} .testimonials .owl-dots div' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .testimonials .owl-dots div:hover' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .testimonials .owl-dots .active' => 'background: {{VALUE}};',
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

        if (empty($settings['slides'])) {
            return;
        }

        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'big_title mb-0');
        ?>

        <?php if ($settings['design_style'] == 'style_3'):
        if (!empty($settings['image']['id'])) {
            $large_image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
        ?>

        <?php if (!empty($settings['slides'])): ?>
        <section class="testimonial__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testimonials__2 testimonials__3 testimonials__4 owl-carousel">
                            <?php foreach ($settings['slides'] as $slide) :
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                }
                                ?>
                                <div class="testimonial">
                                    <?php if (!empty($settings['title'])) : ?>
                                        <h4 class="title mb-25">
                                            <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                                        </h4>
                                    <?php endif; ?>
                                    <?php if ($slide['message']): ?>
                                        <p class="white-color"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                    <?php endif; ?>
                                    <div class="authore mt-35 d-flex align-items-center">
                                        <?php if (!empty($image)): ?>
                                            <div class="authore--thumb mr-20">
                                                <img src="<?php print esc_url($slide['image']['url']); ?>" alt="Hello"/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="authore--content">
                                            <?php if ($slide['client_name']): ?>
                                                <h5 class="name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h5>
                                            <?php endif; ?>
                                            <?php if ($slide['designation_name']): ?>
                                                <span class="designatin"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($large_image)): ?>
                                        <img src="<?php print esc_url($large_image); ?>" alt="Hello" class="quote-icon">
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php elseif ($settings['design_style'] == 'style_2'):
        if (!empty($settings['image']['id'])) {
            $large_image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
        ?>

        <?php if (!empty($settings['slides'])): ?>
        <section class="testimonial__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testimonials__2 testimonials__3 owl-carousel">
                            <?php foreach ($settings['slides'] as $slide) :
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                }
                                ?>
                                <div class="testimonial">
                                    <?php if (!empty($settings['title'])) : ?>
                                        <h4 class="title mb-25">
                                            <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                                        </h4>
                                    <?php endif; ?>
                                    <?php if ($slide['message']): ?>
                                        <p class="white-color"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                    <?php endif; ?>
                                    <div class="authore mt-35 d-flex align-items-center">
                                        <?php if (!empty($image)): ?>
                                            <div class="authore--thumb mr-20">
                                                <img src="<?php print esc_url($slide['image']['url']); ?>" alt="Hello"/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="authore--content">
                                            <?php if ($slide['client_name']): ?>
                                                <h5 class="name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h5>
                                            <?php endif; ?>
                                            <?php if ($slide['designation_name']): ?>
                                                <span class="designatin"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($large_image)): ?>
                                        <img src="<?php print esc_url($large_image); ?>" alt="Hello" class="quote-icon">
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php else:
        if (!empty($settings['image']['id'])) {
            $large_image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
        ?>

        <?php if (!empty($settings['slides'])): ?>
        <section class="testimonial-area">
            <div class="container">
                <div class="testimonials owl-carousel">
                    <?php foreach ($settings['slides'] as $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        }
                        ?>
                        <div class="test-item">
                            <div class="testimonial">
                                <?php if (!empty($settings['title'])) : ?>
                                    <h4 class="title mb-20">
                                        <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if ($slide['message']): ?>
                                    <p class="white-color"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                <?php endif; ?>
                                <div class="authore mt-25 d-flex align-items-center">
                                    <?php if (!empty($image)): ?>
                                        <div class="authore--thumb mr-20">
                                            <img src="<?php print esc_url($slide['image']['url']); ?>" alt="Hello"/>
                                        </div>
                                    <?php endif; ?>
                                    <div class="authore--content">
                                        <?php if ($slide['client_name']): ?>
                                            <h5 class="name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h5>
                                        <?php endif; ?>
                                        <?php if ($slide['designation_name']): ?>
                                            <span class="designatin"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (!empty($large_image)): ?>
                                    <img src="<?php print esc_url($large_image); ?>" alt="Hello" class="quote-icon">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php endif; ?>
        <?php
    }
}
