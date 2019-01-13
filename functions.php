<?php

/*
 |------------------------------------------------------------------
 | Bootstraping a Theme
 |------------------------------------------------------------------
 |
 | This file is responsible for bootstrapping your theme. Autoloads
 | composer packages, checks compatibility and loads theme files.
 | Most likely, you don't need to change anything in this file.
 | Your theme custom logic should be distributed across a
 | separated components in the `/app` directory.
 |
 */

// Require Composer's autoloading file
// if it's present in theme directory.
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require $composer;
}

// Before running we need to check if everything is in place.
// If something went wrong, we will display friendly alert.
$ok = require_once __DIR__ . '/bootstrap/compatibility.php';

if ($ok) {
    // Now, we can bootstrap our theme.
    $theme = require_once __DIR__ . '/bootstrap/theme.php';

    // Autoload theme. Uses localize_template() and
    // supports child theme overriding. However,
    // they must be under the same dir path.
    (new Tonik\Gin\Foundation\Autoloader($theme->get('config')))->register();
}

require_once('walker_nav_menu.php');

add_action('wp_ajax_myfilter', 'ad_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_myfilter', 'ad_filter_function');

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
        echo '<div class="row" id="' . $platform->name . '"><div class="col"><h2><img src="' . get_template_directory_uri() . '/resources/assets/images/' . strtolower($platform->name) . '-logo.png" alt="' . $platform->name . '"> | Ad Formats</h2></div></div><div class="row adformat-cards">';
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
