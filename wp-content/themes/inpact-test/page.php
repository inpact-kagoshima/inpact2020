<?php
/**
 *Template Name: page.php
 * @package inpact_test
 */

get_header();
?>

	<div class="content-area">
		<main class="site-main">

		<?php 
			if ( have_posts() ) : 
		
			while ( have_posts() ): the_post();
					// 投稿を表示
					get_template_part('page-template/content');
			endwhile;
		?>
		<?php
		else :
			echo '記事はありません';

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
