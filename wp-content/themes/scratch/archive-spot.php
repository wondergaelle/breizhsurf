<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package scratch
 */

$niveau_array = get_field_object('niveau')['choices'];
$values = isset($_GET['niveau']) ? (array) $_GET['niveau'] : [];

get_header(); 
?>

<header class="entry-header main-header py-5">
  <div class="container">
    <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
  </div>
</header>

<div class="container py-5">

  <aside class="aside-filter bg-light mb-5 p-3">
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get" class="archive-filter-form form-inline">
      <h3 class="mb-lg-0 mr-4"><?php _e('Filtrer par niveau : ', 'scratch'); ?></h3>
      <?php foreach($niveau_array as $key => $niveau) : ?>
      <div class="form-check form-check-inline">
        <input type="checkbox" name="niveau[]" value="<?= $key ?>" id="niveau-<?= $key ?>" <?php if(in_array($key, $values)): ?>checked<?php endif; ?> class="spot-filters-field form-check-input">
        <label for="niveau-<?= $key ?>" class="form-check-label"><?= $niveau ?></label>
      </div>
      <?php endforeach; ?>
      <button class="btn btn-outline-primary ml-auto" type="submit">Filtrer</button>
    </form>
  </aside>

  <main>

    <?php if (have_posts()) : ?>

    <section class="section-archive-spots spots-grid mb-5">

      <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', 'spot' ); ?>

      <?php endwhile; ?>

    </section>

    <?php the_posts_pagination(); ?>

    <?php else : ?>
    <div class="container py-5">
      <p><?php _e( 'Sorry, no posts matched your criteria.', 'scratch' ); ?></p>
    </div>
    <?php endif; ?>

  </main>

</div>

<?php get_footer(); ?>