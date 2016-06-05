<?php

    /*
        Template Name: Single Court Métrage
    */

    get_header();
?>

    <?php
        if ( have_posts() ):
            while ( have_posts() ):
                the_post(); ?>
    <section class="content project clearfix">
        <h2 class="project__title section__title">
            <?php the_field('project_title'); ?>
            <span class="project__type">
                Techniques utilisées&nbsp;:
                <?php
                the_field('techniques_name');
                 ?>
            </span>
        </h2>

        <figure class="project__first content__work work">
            <?php $image = get_field('presentation_img'); ?>
            <img class="project__first--img work__img" src="<?php echo $image['url']; ?>" alt="" />
        </figure>

        <section class="project__section part__first part">
            <figure class="part__first--left">
                <?php $image = get_field('image_1'); ?>
                <img class="part__first--img" src="<?php echo $image['url']; ?>" alt="" />
            </figure>
            <div class="part__first--right">
                <h3 class="project__subtitle">
                    Contexte
                </h3>
                <p class="project__text">
                    <?php the_field('context_content'); ?>
                </p>
            </div>
        </section>

        <section class="project__section">
            <div class="part__second part">
                <h3 class="project__subtitle">
                    Réalisation
                </h3>
                <p class="project__text">
                    <?php the_field('realisation_content_first'); ?>
                </p>
            </div>

            <div class="part__third part">
                <div class="part__third--left">
                    <p class="project__text">
                        <?php the_field('realisation_content_second'); ?>
                    </p>
                </div>
                <figure class="part__third--right">
                    <?php $image = get_field('image_2'); ?>
                    <img class="part__third--img" src="<?php echo $image['url']; ?>" alt="" />
                </figure>
            </div>

            <div class="part__fourth part">
                <p class="project__text">
                    <?php the_field('realisation_content_third'); ?>
                </p>
            </div>

            <div class="part__first part">
                <figure class="part__first--left">
                    <?php $image = get_field('image_3'); ?>
                    <img class="part__first--img" src="<?php echo $image['url']; ?>" alt="" />
                </figure>
                <div class="part__first--right">
                    <p class="project__text">
                        <?php the_field('realisation_content_fourth'); ?>
                    </p>
                </div>
            </div>

            <div class="part__last part">
                <figure class="part__last--left">
                    <?php $image = get_field('image_4'); ?>
                    <img class="part__last--img" src="<?php echo $image['url']; ?>" alt="" />
                </figure>
                <figure class="part__last--right">
                    <?php $image = get_field('image_5'); ?>
                    <img class="part__last--img" src="<?php echo $image['url']; ?>" alt="" />
                </figure>
            </div>

            <div class="project__button">
                <a href="http://<?php the_field('url_site'); ?>" class="project__button--link">Voir le projet</a>
                <a href="http://<?php the_field('github_url'); ?>" class="project__github">Repo Github</a>
            </div>

        </section>

    </section>

    <?php
            endwhile;
        endif; ?>

<?php
    get_footer();
