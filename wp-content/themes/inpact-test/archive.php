<?php
/**
 *Template Name: archive.php
 * @package inpact_test
 */

get_header();
?>
	<div class="content-area">
		<main class="site-main">
			<h1>ここはarchive.php/ここに記事一覧を出したい</h1>

		<?php 
			if ( have_posts() ) : 
		
			while ( have_posts() ): the_post();

			the_title();
					get_template_part('template-parts/content');
			endwhile;
		?>

		<?php
		else :
			echo '記事はありません';

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
			<h1>ここまで</h1>
<?php

get_footer();
