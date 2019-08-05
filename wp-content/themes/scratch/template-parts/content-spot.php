<article <?php post_class('card-spot-article'); ?>>
  <a class="card-spot_link" href="<?php the_permalink(); ?>">
    <figure class="card-spot-figure mb-0">
      <?= get_the_post_thumbnail($post->ID, 'thumb-555', array( 'class' => 'img-fluid card-spot_img' )) ?>
    </figure> 
    <div class="card-spot_content p-3">
      <?php the_title( '<h2 class="entry-title h4">', '</h2>' ); ?>
      <p class="card-spot_excerpt"><?= wp_trim_words( get_the_content(), 20, '...' ); ?></p>
      <button class="card-spot_btn btn btn-outline-light"><?php _e( 'Read More', 'scratch' ) ?></button>
    </div>
  </a>
</article>