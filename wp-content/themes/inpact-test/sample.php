<?php
/**
 *Template Name: sample.php
 * @package inpact_test
 */
get_header();
?>

<div id="main">

 <?php if ( have_posts() ) :?>
  <?php while (have_posts()) : the_post(); ?>
   <article id="post-<?php the_ID(); ?>" <?php post_class('archive-grid'); ?>>
    <div class="post-inner post-hover">

     <div class="post-thumbnail"> 
      <?php if (has_post_thumbnail()): ?><!-- サムネイル画像 -->
       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      <?php else: ?>
       <a href="<?php the_permalink(); ?>"><img src="https://rawgit.com/presscustomizr/hueman/dev/assets/front/img/thumb-standard.png" alt="noimage"></a>
      <?php endif; ?>
      <span class="post-date"><?php echo get_the_date();?></span><!-- 記事投稿時刻 -->

     </div><!--/.post-thumbnail-->

     <div class="post-content">
      <h2 class="post-title">
       <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a><!-- 記事URL -->
      </h2>

     </div><!--/.post-content-->

    </div><!--/.post-inner-->
   </article>

  <?php endwhile; ?>
 <?php endif; ?>
 </div>