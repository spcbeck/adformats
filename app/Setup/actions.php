<?php

namespace Pixability\Theme\App\Setup;

/*
|-----------------------------------------------------------
| Theme Actions
|-----------------------------------------------------------
|
| This file purpose is to include your custom
| actions hooks, which process a various
| logic at specific parts of WordPress.
|
*/

/**
 * Example action handler.
 *
 * @return integer
 */

if ( current_user_can( 'adformats_editor' ) ) {
	function remove_menus(){
	  
	  remove_menu_page( 'index.php' );   
	  remove_menu_page( 'edit.php' );                   //Posts
	  remove_menu_page( 'edit-comments.php' );          //Comments
	  remove_menu_page( 'tools.php' );                  //Tools
	  remove_menu_page( 'options-general.php' );        //Settings
	  
	}
	add_action( 'admin_menu', 'Pixability\Theme\App\Setup\remove_menus' );
}

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . "/public/css/app.css");
    wp_enqueue_script('custom-js', get_template_directory_uri() . "/public/js/app.js", ['jquery'], null, true);
}
add_action( 'login_enqueue_scripts', 'Pixability\Theme\App\Setup\my_login_stylesheet' );
