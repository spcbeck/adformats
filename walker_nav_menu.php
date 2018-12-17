<?php

class Px_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
		$id_field = $this->db_fields['id'];
			
		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}
		
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}	
	
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
	
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t",$depth) : '';

		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		if ($args->has_children) {
			$classes[] = 'parent';
		}
		
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$output .= $indent . '<li' . $value . $class_names .'>';

		$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target    ) . '"' : '';
		$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) . '"' : '';
		$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url       ) . '"' : '';

		$item_output =  $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

?>