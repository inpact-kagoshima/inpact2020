<?php
/**
 * The template for displaying all single posts
 * 個別投稿表示
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inpact_test
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			//ループ開始

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

				previous_post_link('$link','<span class="meta-nav">前の記事</span>
				%title'); 
				next_post_link('$link','<span class="meta-nav">前の記事</span>
				%title'); 

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>