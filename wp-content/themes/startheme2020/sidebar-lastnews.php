<?php
/**
 * The last posts sidebar displayed before footer
 * @package startheme
 */

$lastnews = get_posts(array(
    'numberposts' => 5,
    'category_name' => 'actualite',
    'orderby' => 'rand'

));

if ($lastnews):
    foreach ($lastnews as $post) :
        setup_postdata($post); ?>
        <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php
    endforeach;
    wp_reset_postdata();
endif;
?>

<section class="sidebar-lastnews bg-light py-5">
    <div class="container">
        <header class="sidebar-header d-flex flex-wrap justify-content-between align-items-start">
            <h2 class="sidebar-title">
                <?php _e('Dernières actualités', 'startheme') ?>
            </h2>
            <a href="#" class="btn btn-outline-primary">
                <?php _e('Toutes les actualités', 'startheme') ?>
            </a>
        </header>
        <?php if ($lastnews): ?>
            <div class="carousel-news owl-carousel px-sm-4 mt-5 mt-sm-4">
                <?php foreach ($lastnews as $post):
                    setup_postdata($post) ?>

                    <article <?php post_class('card border-0') ?>>

                        <figure class="card-figure mb-0">
                            <a href="<?php the_permalink(); ?>" title="<?php _e('Lire la suite', 'startheme') ?>">
                                <?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid card-img-top')); ?>
                            </a>
                        </figure>

                        <div class="card-body">
                            <h3 class="card-title h4">
                                <a href="<?php the_permalink(); ?>" title="<?php _e('Lire la suite', 'startheme') ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <?php the_excerpt() ?>
                        </div>

                        <?php the_title(); ?>
                    </article>
                <?php endforeach;
                wp_reset_postdata() ?>

            </div>
        <?php endif; ?>

    </div>

</section>