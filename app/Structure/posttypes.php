<?php

namespace Pixability\Theme\App\Structure;

/*
|-----------------------------------------------------------
| Theme Custom Post Types
|-----------------------------------------------------------
|
| This file is for registering your theme post types.
| Custom post types allow users to easily create
| and manage various types of content.
|
*/

use function Pixability\Theme\App\config;

/**
 * Registers `adformat` custom post type.
 *
 * @return void
 */
function register_adformat_post_type()
{
    register_post_type('adformat', [
        'description' => __('Collection of ad formats.', config('textdomain')),
        'public' => true,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'labels' => [
            'name' => _x('Ad Format', 'post type general name', config('textdomain')),
            'singular_name' => _x('Ad Format', 'post type singular name', config('textdomain')),
            'menu_name' => _x('Ad Format', 'admin menu', config('textdomain')),
            'name_admin_bar' => _x('Ad Format', 'add new on admin bar', config('textdomain')),
            'add_new' => _x('Add New', 'adformat', config('textdomain')),
            'add_new_item' => __('Add New Ad Format', config('textdomain')),
            'new_item' => __('New Ad Format', config('textdomain')),
            'edit_item' => __('Edit Ad Format', config('textdomain')),
            'view_item' => __('View Ad Format', config('textdomain')),
            'all_items' => __('All Ad Format', config('textdomain')),
            'search_items' => __('Search Ad Format', config('textdomain')),
            'parent_item_colon' => __('Parent Ad Format:', config('textdomain')),
            'not_found' => __('No ad format found.', config('textdomain')),
            'not_found_in_trash' => __('No ad format found in Trash.', config('textdomain')),
        ],
        'taxonomies'  => array( 'category' ),
    ]);
}
add_action('init', 'Pixability\Theme\App\Structure\register_adformat_post_type');
