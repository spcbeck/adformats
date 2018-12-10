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
function example_action()
{
    //
}
add_filter('excerpt_length', 'Pixability\Theme\App\Setup\example_action');

if ( current_user_can( 'adformat_editor' ) ) {
	function remove_menus(){
	  
	  remove_menu_page( 'index.php' );                  //Dashboard
	  remove_menu_page( 'jetpack' );                    //Jetpack* 
	  remove_menu_page( 'edit.php' );                   //Posts
	  remove_menu_page( 'upload.php' );                 //Media
	  remove_menu_page( 'edit.php?post_type=page' );    //Pages
	  remove_menu_page( 'edit-comments.php' );          //Comments
	  remove_menu_page( 'themes.php' );                 //Appearance
	  remove_menu_page( 'plugins.php' );                //Plugins
	  remove_menu_page( 'users.php' );                  //Users
	  remove_menu_page( 'tools.php' );                  //Tools
	  remove_menu_page( 'options-general.php' );        //Settings
	  
	}
	add_action( 'admin_menu', 'remove_menus' );
}