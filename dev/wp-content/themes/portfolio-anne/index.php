<?php
    /*
        Template Name: Homepage
    */
    get_header();
?>
<section class="content">
<h2 class="sro">Contenu du site</h2>
<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); ?>

    <section class="me clearfix">

        <?php $image = get_field('anne_img');?>
        <figure class="me__figure">

            <img class="me__img clearfix" src="<?php echo $image['url']; ?>" alt="Photo de Anne Remacle" width="400" height="400" />
        </figure>
        <h3 class="me__title clearfix">
            <?php the_content(); ?>
        </h3>


        <div class="me__left">
            <?php the_field('me_text_first'); ?>
        </div>
        <div class="me__right">
            <?php the_field('me_text_second'); ?>
        </div>

    </section>
<?php endwhile;
endif;
?>

    <section class="buttons">
        <h3 class="sro">Voir les projets</h3>
        <a class="buttons__link" href="projects.php" title="Vers la page Projets">Projets</a>
    </section>

<?php
    get_footer();
