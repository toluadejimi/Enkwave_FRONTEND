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

class Member_Slider extends BDevs_El_Widget
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
        return 'member_slider';
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
        return __('Member Slider', 'bdevselement');
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
        return 'eicon-lock-user';
    }

    public function get_keywords()
    {
        return ['slider', 'memeber', 'gallery', 'carousel'];
    }


    protected function register_content_controls()
    {

        // member icon switch
        $this->start_controls_section(
            '_member_more_icon',
            [
                'label' => __('Team Link Switch', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'team_more_switch',
            [
                'label' => __('Team More Show', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'team_slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type link here', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        // member list
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Members List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __('Information', 'bdevselement'),
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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('BDevs Member Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Job Title', 'bdevselement'),
                'default' => __('BDevs Officer', 'bdevselement'),
                'placeholder' => __('Type designation here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type link here', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __('Links', 'bdevselement'),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __('Show Options?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Website Address', 'bdevselement'),
                'placeholder' => __('Add your profile link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Email', 'bdevselement'),
                'placeholder' => __('Add your email link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Phone', 'bdevselement'),
                'placeholder' => __('Add your phone link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Facebook', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your facebook link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Twitter', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your twitter link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Instagram', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your instagram link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('LinkedIn', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your linkedin link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Youtube', 'bdevselement'),
                'placeholder' => __('Add your youtube link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Google Plus', 'bdevselement'),
                'placeholder' => __('Add your Google Plus link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Flickr', 'bdevselement'),
                'placeholder' => __('Add your flickr link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Vimeo', 'bdevselement'),
                'placeholder' => __('Add your vimeo link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Behance', 'bdevselement'),
                'placeholder' => __('Add your hehance link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Dribbble', 'bdevselement'),
                'placeholder' => __('Add your dribbble link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Pinterest', 'bdevselement'),
                'placeholder' => __('Add your pinterest link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Github', 'bdevselement'),
                'placeholder' => __('Add your github link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
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
                'default' => 'h3',
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
                    '{{WRAPPER}} .single-carousel-item' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'slider_active',
            [
                'label' => __('Slider active on/off', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'default' => true,
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                    'autoplay' => 'yes',
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
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
                    '{{WRAPPER}} .team__box-2 .content,{{WRAPPER}} .team-box__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .team__box .content .name, {{WRAPPER}} .team-box__content--2 .name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__box .content .name, {{WRAPPER}} .team-box__content--2 .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .team__box .content .name, {{WRAPPER}} .team-box__content--2 .name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'desc_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'desc_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team__box .content .designation, {{WRAPPER}} .team-box__content--2 .designation' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__box .content .designation, {{WRAPPER}} .team-box__content--2 .designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .team__box .content .designation, {{WRAPPER}} .team-box__content--2 .designation',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['slides'])) {
            return;
        }
        ?>

        <?php if ($settings['design_style'] === 'style_3'): ?>
        <section class="team-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) :
                        $title = bdevs_element_kses_basic($slide['title']);
                        $this->add_render_attribute('title', 'class', 'name');
                        $slide_url = esc_url($slide['slide_url']);

                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        }
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                            <div class="team-box team-box__2">
                                <?php if (!empty($image)) : ?>
                                    <div class="team-box__thumb team-box__thumb--2">
                                        <img src="<?php print esc_url($image); ?>" alt="team">
                                    </div>
                                <?php endif; ?>
                                <div class="team-box__content team-box__content--2">
                                    <?php printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title,
                                        $slide_url
                                    ); ?>
                                    <?php if (!empty($slide['designation'])): ?>
                                        <span class="designation">
                                            <?php echo bdevs_element_kses_basic($slide['designation']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['show_social'])) : ?>
                                        <div class="social-links social-links__2">
                                            <?php if (!empty($slide['web_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['web_title']); ?>"><i
                                                            class="far fa-globe"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['email_title'])) : ?>
                                                <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i
                                                            class="fal fa-envelope"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['phone_title'])) : ?>
                                                <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i
                                                            class="fas fa-phone"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['facebook_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i
                                                            class="fab fa-facebook-f"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['twitter_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i
                                                            class="fab fa-twitter"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['instagram_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i
                                                            class="fab fa-instagram"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['linkedin_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['youtube_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['youtube_title']); ?>"><i
                                                            class="fab fa-youtube"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['googleplus_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i
                                                            class="fab fa-google-plus-g"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['flickr_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i
                                                            class="fab fa-flickr"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['vimeo_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i
                                                            class="fab fa-vimeo-v"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['behance_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['behance_title']); ?>"><i
                                                            class="fab fa-behance"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['dribble_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i
                                                            class="fab fa-dribbble"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['pinterest_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i
                                                            class="fab fa-pinterest-p"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['gitub_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i
                                                            class="fab fa-github"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php elseif ($settings['design_style'] === 'style_2'): ?>
        <section class="team-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) :
                        $title = bdevs_element_kses_basic($slide['title']);
                        $this->add_render_attribute('title', 'class', 'name');
                        $slide_url = esc_url($slide['slide_url']);

                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        }
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="team__box mb-30">
                                <?php if (!empty($image)) : ?>
                                    <div class="thumb">
                                        <img src="<?php print esc_url($image); ?>" alt="team">
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="social__icons text-center d-inline-flex position-absolute">
                                                <?php if (!empty($slide['web_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['web_title']); ?>"><i
                                                                class="far fa-globe"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['email_title'])) : ?>
                                                    <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i
                                                                class="fal fa-envelope"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['phone_title'])) : ?>
                                                    <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i
                                                                class="fas fa-phone"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['facebook_title'])) : ?>
                                                    <a class="facebook"
                                                       href="<?php echo esc_url($slide['facebook_title']); ?>"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['twitter_title'])) : ?>
                                                    <a class="twitter"
                                                       href="<?php echo esc_url($slide['twitter_title']); ?>"><i
                                                                class="fab fa-twitter"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['instagram_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i
                                                                class="fab fa-instagram"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['linkedin_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i
                                                                class="fab fa-linkedin-in"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['youtube_title'])) : ?>
                                                    <a class="youtube"
                                                       href="<?php echo esc_url($slide['youtube_title']); ?>"><i
                                                                class="fab fa-youtube"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['googleplus_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i
                                                                class="fab fa-google-plus-g"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['flickr_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i
                                                                class="fab fa-flickr"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['vimeo_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i
                                                                class="fab fa-vimeo-v"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['behance_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['behance_title']); ?>"><i
                                                                class="fab fa-behance"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['dribble_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i
                                                                class="fab fa-dribbble"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['pinterest_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i
                                                                class="fab fa-pinterest-p"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['gitub_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i
                                                                class="fab fa-github"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title,
                                        $slide_url
                                    ); ?>
                                    <?php if (!empty($slide['designation'])): ?>
                                        <span class="designation">
                                            <?php echo bdevs_element_kses_basic($slide['designation']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="team-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) :
                        $title = bdevs_element_kses_basic($slide['title']);
                        $this->add_render_attribute('title', 'class', 'name');
                        $slide_url = esc_url($slide['slide_url']);

                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        }
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="team__box team__box-2 mb-30">
                                <?php if (!empty($image)) : ?>
                                    <div class="thumb">
                                        <img src="<?php print esc_url($image); ?>" alt="team">
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="team-social">
                                                <?php if (!empty($slide['web_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['web_title']); ?>"><i
                                                                class="far fa-globe"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['email_title'])) : ?>
                                                    <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i
                                                                class="fal fa-envelope"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['phone_title'])) : ?>
                                                    <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i
                                                                class="fas fa-phone"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['facebook_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['twitter_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i
                                                                class="fab fa-twitter"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['instagram_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i
                                                                class="fab fa-instagram"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['linkedin_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i
                                                                class="fab fa-linkedin-in"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['youtube_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['youtube_title']); ?>"><i
                                                                class="fab fa-youtube"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['googleplus_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i
                                                                class="fab fa-google-plus-g"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['flickr_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i
                                                                class="fab fa-flickr"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['vimeo_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i
                                                                class="fab fa-vimeo-v"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['behance_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['behance_title']); ?>"><i
                                                                class="fab fa-behance"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['dribble_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i
                                                                class="fab fa-dribbble"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['pinterest_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i
                                                                class="fab fa-pinterest-p"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['gitub_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i
                                                                class="fab fa-github"></i></a>
                                                <?php endif; ?>

                                                <span class="ot-flaticon-signs"><i class="fal fa-plus"></i></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title,
                                        $slide_url
                                    ); ?>
                                    <?php if (!empty($slide['designation'])): ?>
                                        <span class="designation">
                                            <?php echo bdevs_element_kses_basic($slide['designation']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

        <?php
    }
}
