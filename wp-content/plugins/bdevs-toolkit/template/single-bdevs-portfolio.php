<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>

    <div class="portfolio-details pt-100 pb-100">
        <div class="container">
            <?php 
            if( have_posts() ):
                while( have_posts() ): the_post();
                $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                $department_quote_text = function_exists('get_field') ? get_field('department_quote_text') : '';

                // video
                $portfolio_button_text = function_exists('get_field') ? get_field('portfolio_button_text') : '';
                $portfolio_button_url = function_exists('get_field') ? get_field('portfolio_button_url') : '';

                // department short info
                $portfolio_info_list = function_exists('get_field') ? get_field('portfolio_info_list') : '';  
            ?>
            <div class="row">
                <div class="col-xl-12">
                    <?php if (!empty($department_details_thumb['url'])) : ?>
                    <div class="portfolio-wrap pt-80 pb-80 bg_img" data-background="<?php echo esc_url($department_details_thumb['url']); ?>">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-7 offset-lg-7 col-lg-4">
                                <div class="details__lists details__lists--2">
                                    <ul>
                                        <?php if (!empty($portfolio_info_list['portfolio_author_name'])) : ?>
                                        <li>
                                            <span><?php echo wp_kses_post( $portfolio_info_list['portfolio_author_label'] ); ?></span> 
                                            <?php echo wp_kses_post( $portfolio_info_list['portfolio_author_name'] ); ?>
                                        </li>
                                        <?php endif; ?>

                                        <?php if (!empty($portfolio_info_list['portfolio_category_name'])) : ?>
                                        <li>
                                            <span><?php echo wp_kses_post( $portfolio_info_list['portfolio_category_label'] ); ?></span> <?php echo wp_kses_post( $portfolio_info_list['portfolio_category_name'] ); ?>
                                        </li>
                                        <?php endif; ?>

                                        <?php if (!empty($portfolio_info_list['portfolio_date'])) : ?>
                                        <li><span><?php echo wp_kses_post( $portfolio_info_list['portfolio_date_label'] ); ?></span> <?php echo wp_kses_post( $portfolio_info_list['portfolio_date'] ); ?></li>
                                        <?php endif; ?>

                                        <?php if (!empty($portfolio_info_list['portfolio_budget'])) : ?>
                                        <li>
                                            <span><?php echo wp_kses_post( $portfolio_info_list['portfolio_budget_label'] ); ?></span> <?php echo wp_kses_post( $portfolio_info_list['portfolio_budget'] ); ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if (!empty($portfolio_button_url)) : ?>
                                    <a href="<?php echo esc_url($portfolio_button_url); ?>" class="site-btn mt-35">
                                        <?php echo esc_html($portfolio_button_text); ?> <span>+</span>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 mt-35">
                    <div class="inner-content">
                        <h1 class="mb-20"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </div>


<?php get_footer();  ?>