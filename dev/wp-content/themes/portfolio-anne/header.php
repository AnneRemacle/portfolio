<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Anne Remacle - Portfolio</title>
        <script src="https://use.fontawesome.com/5f5ba6c7b9.js"></script>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/font-awesome.min.css'; ?>">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/styles.css'; ?>">
    </head>
    <body>
        <header class="header clearfix">
            <h1 class="sro"><?php bloginfo('name'); ?></h1>
            <a href="index.php" class="header__logo" title="Retour à la page d'accueil">Accueil</a>
            <nav class="header__nav">
                <h2 class="sro">Navigation</h2>

                <?php foreach (b_get_menu_items('main-nav') as $navItem): ?>
                    <a href="<?php echo $navItem -> url ?> " class="header__link header__link--<?php echo $navItem->icon; ?>">
                        <?php echo $navItem -> label ?>
                    </a>
                <?php endforeach; ?>
                <?php wp_reset_query(); ?>
                <!-- <a href="html/projects.html" class="header__link">Projets</a>
                <a href="html/cv.html" class="header__link" title="Voir le CV de Anne Remacle">C.V.</a>
                <a href="html/contact.html" class="header__link" title="Contacter Anne Remacle">Contact</a> -->
            </nav>
        </header>
