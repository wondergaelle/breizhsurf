<?php

/**
 * Template part for displaying posts
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?>>

  <div class="container py-5">

    <h1 class="page-title entry-title"><?php the_title(); ?></h1>

    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>

      <?php if (has_post_thumbnail()) : ?>
        <div class="col">
          <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
        </div>
      <?php endif; ?>

    </div><!-- .row -->

  </div><!-- .container -->

</article>