<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Scheme_Typography;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class Icon_Box extends BDevs_El_Widget
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
        return 'icon_box';
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
        return __('Icon Box', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
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
        return 'eicon-icon-box';
    }

    public function get_keywords()
    {
        return ['info', 'box', 'icon'];
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
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5: Service page', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
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

        $this->add_control(
            'shape_image',
            [
                'label' => __('Shape Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => ['style_50']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'sm_lg',
            [
                'label' => __('Small Or Large Switch', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'default' => true,
                'condition' => [
                    'design_style' => ['style_50']
                ],
            ]
        );

        $this->add_control(
            'bage_bg_color',
            [
                'label' => __('Badge BG Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .count' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'design_style' => 'style_2'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __('Content', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'number',
            [
                'label' => __('Number', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('Type Icon Box number', 'bdevselement'),
                'condition' => [
                    'design_style' => 'style_4'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Icon Box', 'bdevselement'),
                'placeholder' => __('Type Icon Box Title', 'bdevselement'),
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
                'label_block' => true,
                'placeholder' => __('Icon Description', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'step_number',
            [
                'label' => __('Step Number', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 01,
                'description' => __('Type step number', 'bdevselement'),
                'condition' => [
                    'design_style' => ['style_5']
                ],
                'frontend_available' => true,
            ]
        );


        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'before',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
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
                    'design_style' => ['style_1', 'style_2', 'style_5']
                ]
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
                    'condition' => [
                        'design_style' => ['style_1', 'style_3', 'style_6']
                    ]
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
                    '{{WRAPPER}} .whychoose__box--2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .whychoose__box--2 .content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .whychoose__box--2 .content .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .whychoose__box--2 .content .title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2
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
                    '{{WRAPPER}} .whychoose__box--2 .content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .whychoose__box--2 .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .whychoose__box--2 .content p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $this->add_inline_editing_attributes('description', 'none');
        $this->add_render_attribute('description', 'class', '');

        if (!empty($settings['image']['url'])) {
            $this->add_render_attribute('image', 'src', $settings['image']['url']);
            $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
            $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
        }

        if (!empty($settings['shape_image']['url'])) {
            $this->add_render_attribute('shape_image', 'src', $settings['shape_image']['url']);
            $this->add_render_attribute('shape_image', 'alt', Control_Media::get_image_alt($settings['shape_image']));
            $this->add_render_attribute('shape_image', 'title', Control_Media::get_image_title($settings['shape_image']));
        } ?>
        <?php if ($settings['design_style'] === 'style_6'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title mb-15');

        ?>

        <div class="support__box">
            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                $this->get_render_attribute_string('image');
                $settings['hover_animation'] = 'disable-animation'; ?>
                <div class="icon">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                <div class="icon">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php if ($settings['title']) :
                    printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        bdevs_element_kses_basic($settings['title'])
                    );
                endif; ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_5'):
        $this->add_render_attribute('title', 'class', 'title mb-15');

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'inline-btn mt-15');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        ?>
        <div class="service__box service__box--2 service__box--3 service__box--4">
            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                $this->get_render_attribute_string('image');
                $settings['hover_animation'] = 'disable-animation'; ?>
                <div class="icon">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                <div class="icon">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php if ($settings['title']) :
                    printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        bdevs_element_kses_basic($settings['title'])
                    );
                endif; ?>

                <?php if (!empty($settings['description'])) : ?>
                    <p><?php echo esc_html($settings['description']); ?></p>
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

    <?php elseif ($settings['design_style'] === 'style_4'):
        $this->add_render_attribute('title', 'class', 'title');
        ?>
        <div class="whychoose__box whychoose__box--2">
            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                $this->get_render_attribute_string('image');
                $settings['hover_animation'] = 'disable-animation'; ?>
                <div class="icon">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                <div class="icon">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>
            <div class="content mt-25">
                <?php if ($settings['title']) :
                    printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        bdevs_element_kses_basic($settings['title'])
                    );
                endif; ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>
            </div>
            <?php if (!empty($settings['number'])) : ?>
                <span class="big-text"><?php echo esc_html($settings['number']); ?></span>
            <?php endif; ?>
        </div>

    <?php elseif ($settings['design_style'] === 'style_3'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title mb-15');

        ?>

        <div class="support__box support__box--2">
            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                $this->get_render_attribute_string('image');
                $settings['hover_animation'] = 'disable-animation'; ?>
                <div class="icon">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                <div class="icon">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php if ($settings['title']) :
                    printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        bdevs_element_kses_basic($settings['title'])
                    );
                endif; ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_2'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title');
        ?>

        <a href="<?php echo esc_url($settings['button_link']['url']); ?>">
            <div class="service__box service__box--2 service__box--3 service__box-white">
                <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                    $this->get_render_attribute_string('image');
                    $settings['hover_animation'] = 'disable-animation'; ?>
                    <div class="icon">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                    </div>
                <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                    <div class="icon">
                        <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                    </div>
                <?php endif; ?>
                <div class="content">
                    <?php if ($settings['title']) :
                        printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            bdevs_element_kses_basic($settings['title'])
                        );
                    endif; ?>
                    <?php if (!empty($settings['description'])) : ?>
                        <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </a>

    <?php else:

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title mb-15');

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'icon');
            $this->add_link_attributes('button', $settings['button_link']);
        }
        ?>

        <div class="service__box service__box--2">
            <div class="content">
                <?php if ($settings['title']) :
                    printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        bdevs_element_kses_basic($settings['title'])
                    );
                endif; ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                $this->get_render_attribute_string('image');
                $settings['hover_animation'] = 'disable-animation'; ?>
                <div class="thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                </div>
            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                <div class="thumb">
                    <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                </div>
            <?php endif; ?>

            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                printf('<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string('button'),
                    esc_html($settings['button_text']),
                    esc_url($settings['button_link']['url'])
                );
            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
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
    <?php endif; ?>

        <?php
    }

}
