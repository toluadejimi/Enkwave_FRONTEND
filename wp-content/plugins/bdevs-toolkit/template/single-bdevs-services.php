<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>


    <section class="service-details-area pt-120 pb-90">
        <div class="container">
            <?php 
            if( have_posts() ):
                while( have_posts() ): the_post();
                    $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                    $department_quote_text = function_exists('get_field') ? get_field('department_quote_text') : '';

                    // video
                    $department_video_image = function_exists('get_field') ? get_field('department_video_image') : '';
                    $department_video_url = function_exists('get_field') ? get_field('department_video_url') : '';

                    // department short info
                    $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  

            ?>
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-details-wrap mb-30">
                        <?php if (!empty($department_details_thumb['url'])) : ?>
                        <div class="service-details-thumb">
                            <img src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="service-details-title mt-40 mb-20">
                            <h2 class="section-title"><?php the_title(); ?></h2>
                        </div>

                        <div class="service-content-inner service-excerpt ">
                            <?php if (!empty($department_bottom_text)) : ?>
                            <span><?php echo esc_html($department_quote_text); ?></span>
                            <?php endif; ?>

                            <?php the_excerpt(); ?>
                        </div>

                        <div class="service-inner-text mt-40">
                            <?php the_content(); ?>
                        </div>

                        <?php if (!empty($department_video_image['url'])) : ?>
                        <div class="service-inner-video mt-45 mb-45">
                            <div class="video-thumb">
                                <img src="<?php echo esc_url($department_video_image['url']); ?>" alt="">
                            </div>
                            <a href="<?php echo esc_url($department_video_url); ?>" class="video-link popup-video">
                                <div class="video-play-wrap">
                                    <div class="video-mark">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                    </div>
                                    <div class="video-play">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($department_bottom_text)) : ?>
                        <div class="service-inner-text mt-40">
                            <?php echo wp_kses_post($department_bottom_text); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ( is_active_sidebar( 'services-sidebar' ) ) : ?>
                <div class="col-xl-4">
                    <?php do_action("klinixer_service_sidebar"); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </section>


<?php get_footer();  ?>