<?php
/**
 *Template Name: page-works.php
 * @package inpact_test
 */

get_header();
?>

	<section class="section works">

        <?php
        $paged = (int) get_query_var('paged');
        $args = array(
            'posts_per_page' => 6,
            'paged' => $paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',//ページタイプを投稿に指定
            'post_status' => 'publish'
        );
        $the_query = new WP_Query($args);
        //投稿一覧などを表示
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); 
            //次の投稿に進む
        ?>
        
        <div class="post-thumnail">
            <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } 
                    else { echo '<a href="<?php the_permalink(); ?>"><img src="https://rawgit.com/presscustomizr/hueman/dev/assets/front/img/thumb-standard.png" alt="noimage"></a>';
                    }?>
        </div>

        <div class="post-content">
            <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h2>
                <?php the_content(); ?>
        </div>
        
        <?php endwhile; endif; ?>

        <?php
            if ($the_query->max_num_pages > 1) { //ページの総数が1ページ以上の場合
                echo paginate_links(array( //ページネーションを出力
                    'base' => get_pagenum_link(1) . '%_%',//現在ページURLの取得(works/),
                    'format' => '?paged=%#%', //ページ番号に置き換わる
                    'current' => max(1, $paged),//現在のページ番号
                    'total' => $the_query->max_num_pages //全体のページ数
                ));
            }
            echo $paged;
        ?>

    </section><!-- section works -->

<?php
get_footer();
