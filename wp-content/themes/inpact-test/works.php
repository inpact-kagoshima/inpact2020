<?php

/**
 * Template Name: 開発実績
 *
 */

?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <section class="post-item">
      <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  <div class="error">
    <p>お探しの記事は見つかりませんでした。</p>
  </div>
<?php endif; ?>
