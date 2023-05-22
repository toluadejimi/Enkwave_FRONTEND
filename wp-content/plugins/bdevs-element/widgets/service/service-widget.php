<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
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

class Service extends BDevs_El_Widget
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
        return 'service';
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
        return __('Service', 'bdevselement');
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
        return 'eicon-preview-medium';
    }

    public function get_keywords()
    {
        return ['service', 'list', 'icon'];
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
                    'style_2' => __('Style 2: Home 2', 'bdevselement'),
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
                'label' => __('Heading', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1'
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
            'service_image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'service_thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
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
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_10'
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
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // _section_icon

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __('Services List', 'bdevselement'),
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
            'image_bg',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Features sub Title', 'bdevselement'),
                'placeholder' => __('Type Icon Box sub Title', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Features Title', 'bdevselement'),
                'placeholder' => __('Type Icon Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('Icon Description', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            's_url',
            [
                'label' => __('URL', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('URL Here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_10'],
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
                    ]
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
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
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
                    '{{WRAPPER}} .service__box,{{WRAPPER}} .department__wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service__box .title,{{WRAPPER}} .department__box--content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__box .title,{{WRAPPER}} .department__box--content .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .service__box .title,{{WRAPPER}} .department__box--content .title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before',
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .service__box p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__box p' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .service__box p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'icon_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Icon', 'bdevselement'),
                'separator' => 'before',
                'condition' => [
                    'design_style' => ['style_2', 'style_3']
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .department__box--icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3']
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .department__box--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3']
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_list_style',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label' => __('Icon Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__box--lists li .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_bg_color',
            [
                'label' => __('Icon Bg Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__box--lists li:hover .icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .service__box--lists li .icon',
            ]
        );

        $this->add_control(
            'list_text_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__box--lists li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_text_typography',
                'selector' => '{{WRAPPER}} .service__box--lists li .icon, {{WRAPPER}} .service__box--lists li',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
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

        ?>

        <?php if ($settings['design_style'] === 'style_3'):

        $title = bdevs_element_kses_basic($settings['title']);

        $this->add_inline_editing_attributes('description', 'none');
        $this->add_render_attribute('description', 'class', '');
        $this->add_render_attribute('title', 'class', 'wow fadeInUp');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');

        $this->add_inline_editing_attributes('button_text', 'none');
        $this->add_render_attribute('button_text', 'class', '');
        $this->add_render_attribute('button', 'class', 'z-btn');

        $this->add_render_attribute('button', 'class', 'text_btn');

        ?>

        <div class="department__wrap department__wrap--2">
            <div class="row no-gutters mt-none-30">
                <?php foreach ($settings['slides'] as $key => $slide):
                    if (!empty($slide['image_bg']['id'])) {
                        $image_bg = wp_get_attachment_image_url($slide['image_bg']['id'], $settings['thumbnail_size']);
                    }
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                    }
                    ?>
                    <div class="col-xl-6 mt-30">
                        <div class="department__box <?php echo ($key % 2 == 0) ? esc_attr('department__box--border pr-50') : 'pl-50'; ?>">
                            <div class="department__box--icon">
                                <?php if (!empty($slide['selected_icon'])): ?>
                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                <?php else: ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                                <?php endif; ?>
                            </div>
                            <div class="department__box--content">
                                <?php if ($slide['title']) : ?>
                                    <h4 class="title mb-15"><?php echo bdevs_element_kses_basic($slide['title']); ?></h4>
                                <?php endif; ?>
                                <?php if ($slide['description']): ?>
                                    <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php elseif ($settings['design_style'] === 'style_2'):

        $title = bdevs_element_kses_basic($settings['title']);

        $this->add_inline_editing_attributes('description', 'none');
        $this->add_render_attribute('description', 'class', '');
        $this->add_render_attribute('title', 'class', 'wow fadeInUp');
        $this->add_render_attribute('title', 'data-wow-delay', '.4s');

        $this->add_inline_editing_attributes('button_text', 'none');
        $this->add_render_attribute('button_text', 'class', '');
        $this->add_render_attribute('button', 'class', 'z-btn');

        $this->add_render_attribute('button', 'class', 'text_btn');

        ?>

        <div class="department__wrap">
            <div class="row no-gutters mt-none-30">
                <?php foreach ($settings['slides'] as $key => $slide):
                    if (!empty($slide['image_bg']['id'])) {
                        $image_bg = wp_get_attachment_image_url($slide['image_bg']['id'], $settings['thumbnail_size']);
                    }
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                    }
                    ?>
                    <div class="col-xl-6 mt-30">
                        <div class="department__box <?php echo ($key % 2 == 0) ? esc_attr('department__box--border pr-50') : 'pl-50'; ?>">
                            <div class="department__box--icon">
                                <?php if (!empty($slide['selected_icon'])): ?>
                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                <?php else: ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                                <?php endif; ?>
                            </div>
                            <div class="department__box--content">
                                <?php if ($slide['title']) : ?>
                                    <h4 class="title mb-15"><?php echo bdevs_element_kses_basic($slide['title']); ?></h4>
                                <?php endif; ?>
                                <?php if ($slide['description']): ?>
                                    <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php else:

        $title = bdevs_element_kses_basic($settings['title']);
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title mb-15');

        if (!empty($settings['service_image']['id'])) {
            $service_image = wp_get_attachment_image_url($settings['service_image']['id'], $settings['service_thumbnail_size']);
        }
        ?>
        <div class="service__box">
            <div class="thumb mb-35">
                <img src="<?php echo esc_url($service_image); ?>" alt="service image"/>
            </div>
            <div class="content">
                <?php if ($settings['sub_title']) : ?>
                    <span><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></span>
                <?php endif; ?>
                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                    tag_escape($settings['title_tag']),
                    $this->get_render_attribute_string('title'),
                    $title
                ); ?>
            </div>
            <?php if ($settings['desccription']) : ?>
                <p><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
            <?php endif; ?>
            <ul class="service__box--lists mt-45">
                <?php foreach ($settings['slides'] as $key => $slide):
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        if (!$image) {
                            $image = $slide['image']['url'];
                        }
                    } ?>
                    <li><span class="icon">
                    <?php if (!empty($slide['selected_icon'])): ?>
                        <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                    <?php else: ?>
                        <img src="<?php echo esc_url($image); ?>" alt="icon"/>
                    <?php endif; ?>
                    </span> <?php echo bdevs_element_kses_basic($slide['title']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

        <?php
    }

}