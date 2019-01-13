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

function my_enqueue($hook) {
    wp_enqueue_script('category_script', get_template_directory_uri() . '/resources/assets/js/categories.js', ['jquery']);
}

add_action('admin_enqueue_scripts', 'Pixability\Theme\App\Setup\my_enqueue');


//TODO: Figure out why this doesn't work.
function ad_filter_function(){

	$args = array(
		'post_type' => 'adformat',
	);

  $categories = array(
    'relation' => 'AND'
  );

  if( isset( $_POST['platforms'] ) ){
    $platforms = [];

    foreach ($_POST['platforms'] as $key => $value) {
      $platform = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($platforms, $platform);
    }

    array_push($categories, $platforms);
  }
  // for taxonomies / categories
	if( isset( $_POST['length'] ) ){
    $lengths = [];

    foreach ($_POST['length'] as $key => $value) {
      $length = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($lengths, $length);
    }

    array_push($categories, $lengths);
  }
  // for taxonomies / categories
	if( isset( $_POST['kpi'] ) ){
    $kpis = [];

    foreach ($_POST['kpi'] as $key => $value) {
      $kpi = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($kpis, $kpi);
    }

    array_push($categories, $kpis);
  }
  // for taxonomies / categories
	if( isset( $_POST['pricedas'] ) ){
    $pricedases = [];

    foreach ($_POST['pricedas'] as $key => $value) {
      $pricedas = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($pricedases, $pricedas);
    }

    array_push($categories, $pricedases);
  }
  // for taxonomies / categories
	if( isset( $_POST['skippable'] ) ){
    $skippables = [];

    foreach ($_POST['skippable'] as $key => $value) {
      $skippable = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($skippables, $skippable);
    }

    array_push($categories, $skippables);
  }
  // for taxonomies / categories
	if( isset( $_POST['targeting'] ) ){
    $targetings = [];

    foreach ($_POST['targeting'] as $key => $value) {
      $targeting = array(
        'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $value
      );

      array_push($targetings, $target);
    }

    array_push($categories, $targetings);
  }

  if(!empty($categories)) {
    $args['tax_query'] = $categories;
  }

	$query = new WP_Query( $args );

  $catargs = array(
    'child_of' => 2,
    'hide_empty' => 1
  );
  $categories = get_categories($catargs);

	if( $query->have_posts() ) {
    foreach ( $categories as $platform ) {
      if(0 != $platform->count)
        echo '<div class="row" id="' . $platform->name . '"><div class="col"><h2><img src="' . get_template_directory_uri() . '/resources/assets/images/' . $platform->name . '-logo.png" alt="' . $platform->name . '"> | Ad Formats</h2></div></div><div class="row adformat-cards">';
  		while( $query->have_posts() ){
         $query->the_post();
          if(has_category($platform->name)) {
            get_template_part('adformat');
          }
  		}
      echo '</div>';
    }
		wp_reset_postdata();
	} else {
		echo '<p class="h3">No similar ad formats found, try changing your filters.</p>';
	}

	die();
}
