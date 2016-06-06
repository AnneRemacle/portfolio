<?php

    /*
        Template Name: Projects Page
    */

    get_header();
?>

<section class=" content section clearfix">
    <h2 class="section__title clearfix">Projets</h2>

    <?php $posts = new WP_Query( [ 'orderby' => 'date', 'order' => 'ASC', 'post_type' => 'project' ] ); ?>
    <?php if ( $posts -> have_posts() ):
        while ( $posts -> have_posts() ):
            $posts -> the_post(); ?>

            <div class="design__project content__work work clearfix">
                <?php $image = get_field('presentation_img'); ?>
                <img class="work__img" src="<?php echo $image['url']; ?>" alt="" />
                <a href="<?php the_permalink(); ?>" title="" class="work__mask">
                    <h4 class="work__title"><?php the_field('project_title'); ?></h4>
                    <p class="work__text">
                        <?php the_field('project_summary'); ?>
                    </p>
                    <p class="work__more">Voir le projet</p>
                </a>
            </div>

    <?php endwhile; endif; ?>

</section>


<?php
    get_footer();
