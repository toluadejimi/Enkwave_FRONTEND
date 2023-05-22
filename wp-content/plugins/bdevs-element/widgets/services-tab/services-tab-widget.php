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

class Services_Tab extends BDevs_El_Widget
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
        return 'services-tab';
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
        return __('Services Tab', 'bdevselement');
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
        return 'eicon-favorite';
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
                    'style_3' => __('Style 3: double images', 'bdevselement'),
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
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
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
                'default' => __('Type quote here', 'bdevselement'),
                'placeholder' => __('Type quote here', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => ['style_1','style_3']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sort_description',
            [
                'label' => __('Quote', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Type quote here', 'bdevselement'),
                'placeholder' => __('Type quote here', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => ['style_1','style_3']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'quote_author',
            [
                'label' => __('Quote Author', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Type quote author', 'bdevselement'),
                'placeholder' => __('Type quote author here', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_1','style_3']
                ],
                'rows' => 5,
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
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'image2',
            [
                'label' => __('Image 2', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => ['style_3']
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
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2']
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
                    'field_condition' => ['style_20'],
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
                    'type' => 'image',
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
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tab_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('BG Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_menu_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Menu Title', 'bdevselement'),
                'default' => __('Tab Menu Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Title', 'bdevselement'),
                'default' => __('Tab Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Tab Content', 'bdevselement'),
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content_list',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Tab Content List', 'bdevselement'),
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type content here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // Button
        $repeater->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => __('Button URL', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
                'placeholder' => __('button url', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
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

        //button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
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
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
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
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

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
                    '{{WRAPPER}} .section__heading--title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section__heading--title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title = bdevs_element_kses_basic($settings['title']);

        ?>

        <?php if ($settings['design_style'] === 'style_3') :
            
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
        }

        if (!empty($settings['image2']['id'])) {
            $image2 = wp_get_attachment_image_url($settings['image2']['id'], 'full');
        }

        $this->add_render_attribute( 'button', 'class', 'site-btn mt-35' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        ?>
        <section class="about__area about__area--4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__bg about__bg--4">
                            <?php if (!empty($image)): ?>
                                <img src="<?php echo esc_url($image); ?>" data-tilt data-tilt-perspective="3000" alt="Hello">
                            <?php endif; ?>

                            <?php if (!empty($image2)): ?>
                                <img class="f-right" src="<?php echo esc_url($image2); ?>" data-tilt data-tilt-perspective="3000" alt="Hello">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 pl-20 mt-70 mt-md-none">
                        <div class="section__heading mb-30">
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

                            <div class="section__heading--content-2 mt-20">
                                <?php if ($settings['sort_description']): ?>
                                    <p><?php echo bdevs_element_kses_intermediate($settings['sort_description']); ?></p>
                                <?php endif; ?>
                                <?php if ($settings['quote_author']): ?>
                                <span><?php echo bdevs_element_kses_intermediate($settings['quote_author']); ?></span>
                                <i class="fal fa-quote-right"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="about__box about__box--2">
                            <?php if ($settings['description']): ?>
                                <?php echo bdevs_element_kses_intermediate($settings['description']); ?>
                            <?php endif; ?>
                            
                            <?php if ( !empty($settings['button_link']['url']) ) : ?>
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] )
                                        );
                                elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                    if ( $settings['button_icon_position'] === 'before' ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                        <?php
                                    else: ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a>
                                    <?php
                                    endif;
                            endif; ?> 
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ($settings['design_style'] === 'style_2') :
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
        }
        ?>
        <section class="about__area--2 about__area--3">
            <div class="container">
                <div class="row">
                    <?php if (!empty($image)): ?>
                        <div class="col-xl-6">
                            <div class="about__bg about__bg--2 about__bg--3 about__bg--5">
                                <img src="<?php print esc_url($image); ?>" alt="Hello">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xl-6">
                        <div class="section__heading mb-30 mt-30">
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

                            <?php if ($settings['quote_author']): ?>
                                <div class="section__heading--content-2 mt-20">
                                    <?php echo bdevs_element_kses_intermediate($settings['quote_author']); ?>
                                    <i class="fal fa-quote-right"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="about__box about__box--2 about__box--3 about__box--4">
                            <ul class="nav" role="tablist">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    $active_tab = ($id == 0) ? 'active show' : '';
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo esc_attr($active_tab); ?>"
                                           href="#tab-<?php echo esc_attr($id); ?>" role="tab" data-toggle="tab">
                                            <?php echo bdevs_element_kses_basic($slide['tab_menu_title']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $active_tab = ($id == 0) ? 'in active show' : '';
                                    ?>
                                    <div role="tabpanel" class="tab-pane fade <?php echo esc_attr($active_tab); ?>"
                                         id="tab-<?php echo esc_attr($id); ?>">
                                        <?php if (!empty(!empty($slide['tab_content']))) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['tab_content']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php else:
        $this->add_render_attribute('title', 'class', 'section__heading--title');
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
        }
        ?>
        <section class="about__area--2 about__area--3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="section__heading mb-30 mt-65">
                            <?php if (!empty($settings['sub_title'])): ?>
                                <h4 class="section__heading--title-small"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h4>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <div class="section__heading--content-2 mt-20">
                                <?php if ($settings['sort_description']): ?>
                                    <p><?php echo bdevs_element_kses_intermediate($settings['sort_description']); ?></p>
                                <?php endif; ?>
                                <?php if ($settings['quote_author']): ?>
                                    <?php echo bdevs_element_kses_intermediate($settings['quote_author']); ?>
                                    <i class="fal fa-quote-right"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="about__box about__box--2 about__box--3">
                            <ul class="nav" role="tablist">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $active_tab = ($id == 0) ? 'active show' : '';
                                    ?>
                                    <li class="nav-item"><a class="nav-link <?php echo esc_attr($active_tab); ?>"
                                                            href="#tab-<?php echo esc_attr($id); ?>" role="tab"
                                                            data-toggle="tab"><?php echo bdevs_element_kses_basic($slide['tab_menu_title']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $active_tab = ($id == 0) ? 'in active show' : '';
                                    ?>
                                    <div role="tabpanel" class="tab-pane fade <?php echo esc_attr($active_tab); ?>"
                                         id="tab-<?php echo esc_attr($id); ?>">
                                        <?php if (!empty(!empty($slide['tab_content']))) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['tab_content']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 text-right">
                        <div class="about__bg about__bg--2 about__bg--3">
                            <?php if (!empty($image)): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="prifle image">
                            <?php endif; ?>
                            <?php if (!empty($settings['description'])): ?>
                                <div class="call-box">
                                    <?php echo bdevs_element_kses_intermediate($settings['description']); ?>
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