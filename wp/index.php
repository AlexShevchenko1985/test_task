<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beaconlbs
 */

get_header();
global $wp_query;
$id = get_option('page_for_posts');
$social_settings = get_field('social_settings', $id);
?>

    <div class="row expanded align-center">
        <div class="small-24 large-22 xlarge-16 columns">
            <div class="page-title page-intro">
                <h1><?= get_the_title($id); ?></h1>

                <?php
                /*
                 * filter + social settings blog
                 */
                get_template_part('template-parts/posts/filter'); ?>

            </div>

            <?php
            /*
             * Featured Post
             */

            $featured_post = get_field('featured_post', $id);
            if ($featured_post[0]):
                $get_post = get_post($featured_post[0]);
                $thumb = bd_get_attachment_thumbnail_url(get_post_thumbnail_id($featured_post[0]), 'featured-post');
                $cat = get_the_category($featured_post[0])[0];
                ?>
                <div class="article-description">
                    <?php if ($thumb['image']): ?>
                        <div class="article-description-img">
                            <a href="<?= get_permalink($featured_post[0]); ?>">
                                <img src="<?= $thumb['image']; ?>"
                                     alt="<?= ($thumb['alt']) ? $thumb['alt'] : $get_post->post_title; ?>"/>
                            </a>
                        </div>
                    <?php endif; ?>

                    <p class="article-description-data"><a
                                href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a>
                        <strong>/</strong> <?= get_the_date('F d, Y', $featured_post[0]); ?> <strong>/</strong>
                        by <?php the_author_meta('display_name', $get_post->post_author); ?></p>
                    <div class="article-description-grid">
                        <h2><a href="<?= get_permalink($featured_post[0]); ?>"><?= $get_post->post_title; ?></a>
                        </h2>
                        <p><?= ($get_post->post_excerpt) ? do_excerpt($get_post->post_excerpt, 256) : do_excerpt($get_post->post_content, 256); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row expanded align-center subscribe-block subscribe-block-bot-indent">
        <?php
        /*
         * stay connected part
         */
        get_template_part('template-parts/stay-connected'); ?>
    </div>


<?php
if (have_posts()): ?>
    <div class="row expanded align-center">
        <div class="small-24 large-22 xlarge-16 columns">
            <div class="articles">
                <div class="articles-grid">
                    <?php

                    while (have_posts()):
                        the_post();

                        get_template_part('template-parts/posts/content-post');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php if (1 < $wp_query->max_num_pages): ?>
                    <a href="javascript:void(0);" class="view-more button gradient">view More</a>
                <?php endif; ?>
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php
get_footer();
