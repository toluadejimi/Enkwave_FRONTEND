<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Scheme_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined('ABSPATH') || die();

class FAQ extends BDevs_El_Widget
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
        return 'faq';
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
        return __('FAQ', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/contact-7-form/';
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
        return 'eicon-edit';
    }

    public function get_keywords()
    {
        return ['services', 'tab'];
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
            '_section_title',
            [
                'label' => __('Title ', 'bdevselement'),
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

        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'tab_big_image',
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
            'tab_image_1',
            [
                'label' => __('Image', 'bdevselement'),
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
            'tab_image_2',
            [
                'label' => __('Image 2', 'bdevselement'),
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
            'tab_image_3',
            [
                'label' => __('Image 3', 'bdevselement'),
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
            'tab_image_4',
            [
                'label' => __('Image 4', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
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
                'label' => __('Faq List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Title', 'bdevselement'),
                'default' => __('Tab Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content_info',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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
                    'design_style' => ['style_2'],
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

    // register_style_controls
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
                    '{{WRAPPER}} .section__heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
                'separator' => 'before',
                'condition' => [
                    'design_style' => ['style_1']
                ],
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
                'condition' => [
                    'design_style' => ['style_1']
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
                'condition' => [
                    'design_style' => ['style_1']
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before',
                'condition' => [
                    'design_style' => ['style_1']
                ],
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
                'condition' => [
                    'design_style' => ['style_1']
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
                'condition' => [
                    'design_style' => ['style_1']
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        $title = bdevs_element_kses_basic($settings['title']);

        // img 
        if (!empty($settings['tab_big_image']['id'])) {
            $tab_big_image = wp_get_attachment_image_url(!empty($settings['tab_big_image']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_big_image) {
                $tab_big_image = $settings['tab_big_image']['url'];
            }
        }

        // img 1
        if (!empty($settings['tab_image_1']['id'])) {
            $tab_image_1 = wp_get_attachment_image_url(!empty($settings['tab_image_1']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_image_1) {
                $tab_image_1 = $settings['tab_image_1']['url'];
            }
        }

        // img 2
        if (!empty($settings['tab_image_2']['id'])) {
            $tab_image_2 = wp_get_attachment_image_url(!empty($settings['tab_image_2']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_image_2) {
                $tab_image_2 = $settings['tab_image_2']['url'];
            }
        }

        // img 3
        if (!empty($settings['tab_image_3']['id'])) {
            $tab_image_3 = wp_get_attachment_image_url(!empty($settings['tab_image_3']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_image_3) {
                $tab_image_3 = $settings['tab_image_3']['url'];
            }
        }

        // img 4
        if (!empty($settings['tab_image_4']['id'])) {
            $tab_image_4 = wp_get_attachment_image_url(!empty($settings['tab_image_4']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_image_4) {
                $tab_image_4 = $settings['tab_image_4']['url'];
            }
        }

        if (empty($settings['slides'])) {
            return;
        }
        ?>
        <?php if ($settings['design_style'] === 'style_2'):
        $rand_id = rand(1320,3504);
        ?>
        <div class="accordion faqs faqs--2" id="accordionFaq<?php echo esc_attr($rand_id); ?>">
            <?php foreach ($settings['slides'] as $id => $slide) :
                // active class
                $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                $area_expanded = ($id == 0) ? 'true' : 'false';
                $active_show_tab = ($id == 0) ? 'show' : '';
                ?>
                <div class="card">
                    <div class="card__header" id="heading-<?php echo esc_attr($rand_id); ?>_<?php echo esc_attr($id); ?>">
                        <h5 class="mb-0 title">
                            <button class="btn btn-link <?php echo esc_attr($collapsed_tab); ?>" type="button" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr($rand_id); ?>_<?php echo esc_attr($id); ?>"
                                    aria-expanded="<?php echo esc_attr($area_expanded); ?>" aria-controls="collapse-<?php echo esc_attr($rand_id); ?>_<?php echo esc_attr($id); ?>">
                                <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse-<?php echo esc_attr($rand_id); ?>_<?php echo esc_attr($id); ?>" class="collapse <?php echo esc_attr($active_show_tab); ?>" aria-labelledby="heading-<?php echo esc_attr($rand_id); ?>_<?php echo esc_attr($id); ?>" data-parent="#accordionFaq<?php echo esc_attr($rand_id); ?>">
                        <div class="card__body">
                            <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <section class="faq__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 align-self-center">
                        <div class="faq__thumb text-center">
                            <?php if( !empty($tab_big_image) ): ?>
                            <div class="faq__thumb--big" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($tab_big_image); ?>" alt="Hello">
                            </div>
                            <?php endif; ?>
                            <?php if( !empty($tab_image_1) ): ?>
                            <div class="faq__thumb--1" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($tab_image_1); ?>" alt="Hello">
                            </div>
                            <?php endif; ?>
                            <?php if( !empty($tab_image_2) ): ?>
                            <div class="faq__thumb--2" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($tab_image_2); ?>" alt="Hello">
                            </div>
                            <?php endif; ?>
                            <?php if( !empty($tab_image_3) ): ?>
                            <div class="faq__thumb--3" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($tab_image_3); ?>" alt="Hello">
                            </div>
                            <?php endif; ?>
                            <?php if( !empty($tab_image_4) ): ?>
                            <div class="faq__thumb--4" data-tilt data-tilt-perspective="3000">
                                <img src="<?php echo esc_url($tab_image_4); ?>" alt="Hello">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 pl-30">
                        <div class="section__heading mb-35">
                            <?php if (!empty($settings['sub_title'])): ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>
                            <?php printf('<%1$s>%2$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                bdevs_element_kses_basic($settings['title'])
                            ); ?>
                        </div>
                        <div class="accordion faqs" id="accordionFaq">
                        <?php foreach ($settings['slides'] as $id => $slide) :
                            // active class
                            $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                            $area_expanded = ($id == 0) ? 'true' : 'false';
                            $active_show_tab = ($id == 0) ? 'show' : '';
                            ?>
                            <div class="card">
                                <div class="card__header" id="heading<?php echo esc_attr($id); ?>">
                                    <h5 class="mb-0 title">
                                        <button class="btn btn-link <?php echo esc_attr($collapsed_tab); ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo esc_attr($id); ?>"
                                            aria-expanded="false" aria-controls="collapse<?php echo esc_attr($id); ?>">
                                            <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse<?php echo esc_attr($id); ?>" class="collapse <?php echo esc_attr($active_show_tab); ?>" aria-labelledby="heading<?php echo esc_attr($id); ?>" data-parent="#accordionFaq">
                                    <div class="card__body">
                                        <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    }
}