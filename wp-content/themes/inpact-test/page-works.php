<?php
/*
 Template Name: page-works.php
 */
?>

<?php get_header(); ?>

<?php
$paged = (int) get_query_var('paged');
$args = array(
    'posts_per_page' => 21,
    'paged' => $paged,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'
); ?>


<div class="section works-list">
    <div class="work-entry-columns">
        <?php $the_query = new WP_Query($args); ?>
        <?php
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
            <!-- 次の投稿に進む -->

            <div class="work-item"><!-- ここから個別記事 -->
                    <div class="work-img">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } else { 
                            echo '<a href="<?php the_permalink(); ?>"><img src="https://rawgit.com/presscustomizr/hueman/dev/assets/front/img/thumb-standard.png" alt="noimage"></a>';
                        }
                        ?>
                    </div>
                    <div class="work-text-block">
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>">
                        <?php echo mb_substr($post->post_title, 0, 10).'……' ?></a>
                        </h3>
                        <?php echo mb_substr($post->post_content, 0, 100).'……' ?>
                    </div>
            </div> 
            <?php endwhile; endif; ?>

            <div class="pagenation">
                    <?php
                    if ($the_query->max_num_pages > 1) { //ページの総数が1ページ以上の場合
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',//現在ページURLの取得(works/),
                            'format' => 'page/%#%/', //ページ番号に置き換わる
                            'current' => max(1, $paged),//現在のページ番号
                            'prev_text' => 'prev',
                            'next_text' => 'next',
                            'total' => $the_query->max_num_pages //全体のページ数
                        ));
                    }
                    ?>
            </div><!-- pagenation -->
    </div><!-- work-entry-columns -->
</div><!-- works -->

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
