<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

$niveau_array = get_field_object('niveau')['choices'];
$niveau_get = isset($_GET['niveau']) ? $_GET['niveau'] : [];
get_header();
?>
    <main>
        <?php if (have_posts()) : ?>
            <section class="archive-section">
                <header class="main-header py-5">
                    <div class="container">
                        <h1 class="page-title"><?php the_archive_title(); ?></h1>
                    </div>
                </header>
                <div class="container py-5">
                    <div class="aside-filter bg-light mb-5 p-3">
                        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="get" class="archive-filter-form form-line">
                            <h3 class="mb-lg-0 mr4"> <?php _e('Filtrer pas niveau', 'startheme') ?></h3>

                            <?php foreach($niveau_array as $key => $niveau) : ?>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="niveau[]" value="<?= $key ?>" id="niveau-<?= $key ?>"
                                           class="spot-filters-field form-check-input" <?php if(in_array($key, $niveau_get)) : ?>checked<?php endif; ?>>
                                    <label for="niveau-<?= $key ?>" class="form-check-label"><?= $niveau ?></label>
                                </div>
                            <?php endforeach; ?>
                            <button class="btn btn-outline-primary ml-auto"
                                    type="submit"><?php _e('Filtrer', 'startheme') ?></button>
                        </form>
                    </div>
                    <div class="row no-gutters mb-5"> <!--   pas de goutieres -->
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6 col-lg-4">
                                <?php get_template_part('template-parts/content-archive', get_post_type()); ?>
                            </div>
                        <?php endwhile; ?>
                    </div><!-- .row -->
                    <?php the_posts_pagination(); ?>
                </div><!-- .container -->
            </section>
        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </main>
<?php get_sidebar('lastnews') ?>

<?php get_footer() ?>