<?php
/**
 * The last posts sidebar displayed before the footer.
 *
 * @package scratch
 */

$lastposts = get_posts( array(
	'numberposts' => 5,
  'category_name' => 'actualite',
  'orderby' => 'rand',
  'exclude' => get_the_ID()
) );
?>

<section class="sidebar-lastposts bg-light py-5">
  <div class="container">

    <div class="sidebar-header d-flex flex-wrap justify-content-between align-items-start ">
      <h2 class="sidebar-title"><?php _e('Dernières actualités', 'scratch'); ?></h2>
      <a href="<?= esc_url( home_url( '/' ) ) ?>/articles/actualite/" class="btn btn-outline-primary"><?php _e('Toutes les actualités', 'scratch'); ?></a>
    </div>

    <?php if ( $lastposts ) : ?>
      <div class="slick-posts px-sm-4 mt-5 mt-sm-4">
        <?php foreach ( $lastposts as $post ) :
            setup_postdata( $post ); ?>	
            <article <?php post_class('card-post-article'); ?>>
              <div class="card-post_inner">
                <figure class="card_figure mb-0">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-555', array( 'class' => 'img-fluid card-post_img' )) ?></a>
                </figure>
                <div class="card-post_content p-4 bg-white">
                  <h3 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </article>
        <?php
        endforeach; 
        wp_reset_postdata(); ?>
      </div>
    <?php endif;?>
    

  </div>
</section>