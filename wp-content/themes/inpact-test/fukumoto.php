<?php
/*
Template Name: news一覧
*/
?>

<?php get_header() ?>

<?php
$paged = (int) get_query_var('paged');
$args = array(
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'
); ?>


<div class="section news-list well light-blue pt-5 pb-5">
    <div class="container well">
        <div class="news-list-columns pt-5 pb-6 ">
            <h2 class="news-page-title pb-6"><?php the_title(); ?></h2>
            <?php $the_query = new WP_Query($args); ?>
            <?php
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                
                    <div class="news-item">
                        <div class="news-img">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            }
                            ?>
                        </div>
                        <div class="news-text-block">
                            <p class="news-date pt-1"><?php the_time('Y.m.d'); ?></p>
                            <h3 class="news-list-title pt-2 pb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php
                            echo mb_substr($post->post_content, 0, 150) . '...'; ?>
                            <div class="more">
                                <span>
                                    <a href="<?php the_permalink(); ?>">more</a>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="pagination">

                <?php
                if ($the_query->max_num_pages > 1) {
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page/%#%/',
                        'current' => max(1, $paged),
                        'prev_text' => '前',
                        'next_text' => '後',
                        'total' => $the_query->max_num_pages
                    ));
                }
                ?>
            </div>
            <!-- pagenation -->
        </div>
        <!-- news-list-columns -->
    </div>
    <!-- container well -->
</div>
<!-- news-list -->


<?php get_footer() ?>