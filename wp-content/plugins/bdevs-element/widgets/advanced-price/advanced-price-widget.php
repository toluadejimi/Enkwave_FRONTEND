<?php

namespace BdevsElement\Widget;

use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use BdevsElementor\Controls\Select2;

defined('ABSPATH') || die();

class Advanced_Price extends BDevs_El_Widget
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
        return 'advanced_price';
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
        return __('Advanced Price', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/post-tab/';
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
        return 'eicon-tabs';
    }

    public function get_keywords()
    {
        return ['tabs', 'section', 'advanced', 'toggle', 'price'];
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
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Sub Title', 'bdevselement'),
                'placeholder' => __('Type Sub Title', 'bdevselement'),
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
                'default' => __('Subtitle here', 'bdevselement'),
                'placeholder' => __('Subtitle', 'bdevselement'),
                'rows' => 5,
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
                'default' => 'h1',
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
            '_section_price_extra',
            [
                'label' => __('Extra', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'extra_active',
            [
                'label' => __('Extra (ON/OFF)', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'extra_title',
            [
                'label' => __('Extra Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs Extra Title', 'bdevselement'),
                'placeholder' => __('Type Extra Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_price_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
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
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_price_tabs',
            [
                'label' => __('Price Tabs', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'bdevselement'),
                'default' => __('Tab Title', 'bdevselement'),
                'placeholder' => __('Type Tab Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'active_tab',
            [
                'label' => __('Is Active Tab?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'template',
            [
                'label' => __('Section Template', 'bdevselement'),
                'placeholder' => __('Select a section template for as tab content', 'bdevselement'),
                'description' => sprintf(__('Wondering what is section template or need to create one? Please click %1$shere%2$s ', 'bdevselement'),
                    '<a target="_blank" href="' . esc_url(admin_url('/edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section')) . '">',
                    '</a>'
                ),
                'type' => Controls_Manager::SELECT2,
                'options' => get_elementor_templates()
            ]
        );

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{title}}',
                'default' => [
                    [
                        'title' => 'Tab 1',
                    ],
                    [
                        'title' => 'Tab 2',
                    ]
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'filter_pos',
            [
                'label' => __('Filter Position', 'bdevselement'),
                'label_block' => false,
                'type' => Controls_Manager::CHOOSE,
                'default' => 'top',
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __('Top', 'bdevselement'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __('Filter Align', 'bdevselement'),
                'label_block' => false,
                'type' => Controls_Manager::CHOOSE,
                'default' => 'left',
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
                'condition' => [
                    'filter_pos' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter' => 'text-align: {{VALUE}};',
                ],
                'style_transfer' => true,
            ]
        );


        $this->add_responsive_control(
            'event',
            [
                'label' => __('Tab action', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'click' => __('On Click', 'bdevselement'),
                    'hover' => __('On Hover', 'bdevselement'),
                ],
                'default' => 'click',
                'render_type' => 'template',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {

        $this->start_controls_section(
            '_section_post_tab_filter',
            [
                'label' => __('Tab', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tab_margin_btm',
            [
                'label' => __('Margin Bottom', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'filter_pos' => 'top',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tab_shadow',
                'label' => __('Box Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'tab_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter',
            ]
        );

        $this->add_responsive_control(
            'tab_item',
            [
                'label' => __('Tab Item', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_item_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_item_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs('tab_item_tabs');
        $this->start_controls_tab(
            'tab_item_normal_tab',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'tab_item_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_background',
                'label' => __('Background', 'bdevselement'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_item_hover_tab',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'tab_item_hvr_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_hvr_background',
                'label' => __('Background', 'bdevselement'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li.active,{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_item_typography',
                'label' => __('Typography', 'bdevselement'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'tab_item_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
            ]
        );

        $this->add_responsive_control(
            'tab_item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_section();


        //Content Style
        $this->start_controls_section(
            '_section_post_tab_content',
            [
                'label' => __('Content', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //Title Tab
        $this->start_controls_tabs('title_tabs');
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        //Tabs typo
        $this->start_controls_tabs('meta_tabs');
        $this->start_controls_tab(
            'meta_normal_tab',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'meta_hover_tab',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['tabs'])
            return;


        $event = 'click';
        if ('hover' === $settings['event']) {
            $event = 'hover touchstart';
        }

        $wrapper_class = [
            'price__area pricing-' . $settings['filter_pos'],
        ];
        $this->add_render_attribute('wrapper', 'class', $wrapper_class);
        $this->add_render_attribute('wrapper', 'data-event', $event);
        $this->add_render_attribute('project-filter', 'class', ['nav nav-tabs justify-content-center']);
        $this->add_render_attribute('project-body', 'class', ['tab-content']);
        $i = 1;

        $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        if (!$image) {
            $image = $settings['image']['url'];
        }

        if (!empty($settings['tabs'])) :?>
            <section <?php $this->print_render_attribute_string('wrapper'); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                            <div class="section__title section__title-3 mb-85 text-center">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <span><?php echo bdevs_element_kses_basic($settings['sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['title'])): ?>
                                    <h2><?php echo bdevs_element_kses_basic($settings['title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['description'])): ?>
                                    <p><?php echo bdevs_element_kses_basic($settings['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="price__tab d-flex justify-content-center mb-50">
                                <?php if ($settings['extra_active'] == 'yes'): ?>
                                    <div class="price__offer">
                                        <?php if (!empty($settings['extra_title'])): ?>
                                            <span><?php echo bdevs_element_kses_basic($settings['extra_title']); ?></span>
                                        <?php endif; ?>
                                        <img src="<?php print get_template_directory_uri(); ?>/assets/img/icon/price/line.png"
                                             alt="img">
                                    </div>
                                <?php endif; ?>

                                <ul id="nav-tab"
                                    role="tablist" <?php $this->print_render_attribute_string('project-filter'); ?>>
                                    <?php foreach ($settings['tabs'] as $key => $tab):
                                        if ($key == 0) {
                                            $tab['active_tab'] = 'yes';
                                        } else {
                                            $tab['active_tab'] = 'no';
                                        }
                                        if (!empty($tab['template'])):
                                            $tab_title = str_replace(' ', '_', $tab['title']);
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>"
                                                   id="nav-<?php echo $tab_title; ?>-tab" data-toggle="tab"
                                                   href="#nav-<?php echo $tab_title; ?>" role="tab"
                                                   aria-controls="nav-<?php echo $tab_title; ?>"
                                                   aria-selected="true"><?php echo bdevs_element_kses_basic($tab['title']); ?></a>
                                            </li>
                                        <?php endif;
                                    endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="price__tab-content">
                        <div id="nav-tabContent" <?php $this->print_render_attribute_string('project-body'); ?>>
                            <?php foreach ($settings['tabs'] as $key => $tab):
                                if ($key == 0) {
                                    $tab['active_tab'] = 'yes';
                                } else {
                                    $tab['active_tab'] = 'no';
                                }
                                if (!empty($tab['template'])):
                                    $tab_title = str_replace(' ', '_', $tab['title']);
                                    ?>
                                    <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>"
                                         id="nav-<?php echo $tab_title; ?>" role="tabpanel"
                                         aria-labelledby="nav-<?php echo $tab_title; ?>-tab">
                                        <?php echo \BdevsElement::$elementor_instance->frontend->get_builder_content($tab['template'], true); ?>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php else:
            printf('%1$s',
                __('No  List  Found', 'bdevselement')
            );
        endif;


    }
}