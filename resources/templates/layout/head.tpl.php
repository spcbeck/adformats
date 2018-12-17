<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/solid.js" integrity="sha384-OQNCj138epg9A13jaL9L/d5vMlK2jyPL4aOgi37KYt07aZARbv/eFGp/wnrCxkW5" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/fontawesome.js" integrity="sha384-n1qPouQQJ9VNZnZeNZWSDiclpIOJwZBS2bkD6rEX+DTmMXTKXBVCZw2cGbU/I17z" crossorigin="anonymous"></script>
    </head>
    <body <?php body_class(); ?>>  
        <header id="main-header">
            <div class="container">
                <div id="logo">
                    <a href="/"><?php bloginfo('name'); ?></a>
                </div>

                <div id="main-navigation" class="desktop">
                                        
                    <?php 
                    wp_nav_menu(array(
                    "menu" => "primary-navigation",
                    "theme_location" => "primary_navigation",
                    "menu_class" => "nav2",
                    "menu_id" => "main-nav2",
                    "container" => FALSE,
                    "walker" => new Px_Walker_Nav_Menu()
                    ));
                    ?>

                </div>


                    <div id="main-navigation" class="mobile">
                        <div id="nav" class="mobile">
                            <div class="navinner">

                            <?php 
                            wp_nav_menu(array(
                            "menu" => "primary-navigation",
                            "theme_location" => "primary_navigation",
                            "menu_class" => "nav2",
                            "menu_id" => "main-nav2",
                            "container" => FALSE,
                            "walker" => new Px_Walker_Nav_Menu()
                            ));
                            ?>

                        </div>
                    </div>
                </div>

                <div id="mobiletoggle"><span></span></div>
            </div>
        </header>