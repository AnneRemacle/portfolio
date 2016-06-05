<?php

    // Defines custom post_types

    add_theme_support( 'post-thumbnails' );

    register_taxonomy( 'project-type', 'project', [
                            'label' => 'Types de projets',
                            'labels' => [
                                'singular_name' => 'Un type de projet'
                            ],
                            'public' => true ,
                            'description' => __( 'Le procédé utilisé pour créer ce projet', 'portfolio' ),
                            'hierarchical' => true
                        ] );

    register_taxonomy_for_object_type( 'project-type', 'projet' );

    register_post_type( 'project', [
            'label' => __('Projet', 'portfolio'),
            'labels' => [
                        'singular_name' => __( 'Projet', 'portfolio' ),
                        'add_new' => __( 'Ajouter un nouveau projet', 'portfolio')
            ],
            'description' => __( 'La liste de tous les projets réalisés par Anne', 'portfolio'),
            'public' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-editor-video',
            'supports' => [ 'title', 'editor', 'thumbnail' ],
            'has_archive' => true
        ] );

    // Defines navigation menus
    register_nav_menu( 'main-nav', __('Menu principal, affiché dans le header.', 'portfolio') );

    // generate a custom excerpt, used on the homepage

    function get_the_custom_excerpt( $length = 150 ) {
        $excerpt = get_the_content();
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = strip_tags( $excerpt );
        return substr( $excerpt, 0, $length );
    }

    // get_the fait un return

    function the_custom_excerpt( $length = 150 ) {
        echo get_the_custom_excerpt( $length );
    }

    // Generate a link label containing the post_title

    function get_the_link_content($string, $replacement = '%s') {
        /*la classe sro (sreen readers only) est là pour cacher le span qui contient le nom de l'article tout en restant référencé et lisible par les lecteurs vocaux*/
        return str_replace($replacement, '<span class="sro">' . get_the_title() . '</span>' , __( $string, 'baobab'));
    }

    function the_link_content( $string, $replacement = '%s') {
        echo get_the_link_content( $string, $replacement );
    }

    // generates a custom menu array
    function b_get_menu_id($location) {
        $locations = get_nav_menu_locations();

        if ( isset($locations[$location])) {
            return $locations[$location];
        }
        return false;
    }

    function b_get_menu_items( $location ) {
        // location = le nom
        $navItems = [];

        foreach ( wp_get_nav_menu_items(b_get_menu_id($location)) as $obj ) {
            $item = new stdClass(); // stdClass = classe nulle, bêtement un conteneur d'objets
            $item -> url = $obj->url;
            $item -> label = $obj->title;
            $item -> icon = $obj->classes[0];
            array_push($navItems, $item);
        }
        return $navItems;
    }

    // Generates a language selection menu_position

    function b_get_languages() {
        $langItems = [];
        $rawItems = pll_the_languages([
            'echo' => false,
            'hide_if_empty' => false,
            'hide_if_no_translation' => false,
            'raw' => true
        ]);
        foreach ($rawItems as $arr) {
            $item = new stdClass();
            $item -> label = $arr['name'];
            $item -> url = $arr['url'];
            $item -> code = $arr['slug'];
            array_push($langItems, $item);
        }

        return $langItems;
    }
