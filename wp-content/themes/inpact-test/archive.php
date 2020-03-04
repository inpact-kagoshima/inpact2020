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
			<div id="main">

<?php if ( have_posts() ) :?>
 <?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('archive-grid'); ?>>
   <div class="post-inner post-hover">

	<div class="post-thumbnail"> 
	 <?php if (has_post_thumbnail()): ?>
	  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	 <?php else: ?>
	  <a href="<?php the_permalink(); ?>"><img src="https://rawgit.com/presscustomizr/hueman/dev/assets/front/img/thumb-standard.png" alt="noimage"></a>
	 <?php endif; ?>
	 <span class="post-date"><?php echo get_the_date();?></span>

	</div><!--/.post-thumbnail-->

	<div class="post-content">
	 <h2 class="post-title">
	  <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
	 </h2>

	</div><!--/.post-content-->

   </div><!--/.post-inner-->
  </article>

 <?php endwhile; ?>
<?php endif; ?>
</div>
			<h1>ここまで</h1>
<?php

get_footer();
