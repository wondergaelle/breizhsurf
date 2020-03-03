<?php

/**
 * Template part for displaying posts
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */
$niveau = get_field_object('niveau');
$infos = get_field_object('informations');
$acces = get_field_object('acces');
$latitude = get_field('latitude');
$longitude = get_field('longitude');
?>

<article <?php post_class(); ?>>

    <header class="entry-header main-header py-5"
            style="background-image: url(<?php the_post_thumbnail_url('thumb-large') ?>)">
        <div class="container">
            <h1 class="page-title entry-title"><?php the_title(); ?></h1>
        </div>
    </header>

    <div class="spot-content bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="entry-content col-md-8 col-lg-10">
                    <?php the_content() ?>
                </div> <!--  entry-content-->
                <div class="spot-niveau col-md4 col-lg-2">
                    <div class="bg-white p-4 text-center">
                        <h3><?php echo $niveau['label'] ?></h3>
                        <?php foreach ($niveau['choices'] as $key => $choice): ?>

                            <?php if ($key <= $niveau['value']) : ?>
                                <img src="<?= get_template_directory_uri() . '/dist/images/planche-1.svg'; ?>"
                                     alt="<?= $choice; ?>"
                                     title="<?= $choice; ?>">

                            <?php else : ?>
                                <img src="<?= get_template_directory_uri() . '/dist/images/planche-2.svg'; ?>"
                                     alt="<?= $choice; ?>"
                                     title="<?= $choice; ?>">
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div> <!--  bg-white-->
                </div><!--  spot-niveau-->
            </div><!--  row-->
        </div><!--  container-->
    </div><!--  spot-content-->

    <div class="container">
        <div class="spot-info my-5">
            <h2><?= $infos['label']; ?></h2>
            <?= $infos['value']; ?>
        </div>

        <div class="spot-acces my-5">
            <h2><?= $acces['label']; ?></h2>
            <div class="spot-acces_content">
                <div class="spot-carte"></div>
                <div class="bg-light-4">
                    <?= $acces['value']; ?>
                    <div class="spot-gps">
                        <h3>GPS</h3>
                        <P><?= $latitude; ?>,<?= $longitude; ?></P>
                    </div>
                </div>
            </div>


        </div>
    </div>

</article>