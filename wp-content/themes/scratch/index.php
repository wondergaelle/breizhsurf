<?php
/**
 * The main template file
 *
 *
 * @package scratch
 */

get_header(); 
?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header class="entry-header main-header py-5">
      <div class="container">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
      </div>
    </header>
    <div class="entry-content container py-5">
      <?php the_content() ?>
    </div>
  </article>

  <?php endwhile; ?>

  <?php else : ?>
  <div class="container py-5">
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'scratch' ); ?></p>
  </div>
  <?php endif; ?>

</main>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>