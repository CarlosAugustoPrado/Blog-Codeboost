<?php 
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_theme_support('post-thumbnails');

function setPostViews($postID) {
  $countKey = 'post_views_count';
  $count = get_post_meta($postID, $countKey, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $countKey);
      add_post_meta($postID, $countKey, '0');
  }else{
      $count++;
      update_post_meta($postID, $countKey, $count);
  }
}

function custom_post_type_podcast() {
	register_post_type('podcasts', array(
		'label' => 'Podcasts',
		'description' => 'Podcasts',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'podcasts', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'Podcasts',
			'singular_name' => 'Podcast',
			'menu_name' => 'Podcasts',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Novo Podcast',
			'edit' => 'Editar',
			'edit_item' => 'Editar Podcast',
			'new_item' => 'Novo Podcast',
			'view' => 'Ver Podcast',
			'view_item' => 'Ver Podcast',
			'search_items' => 'Procurar Podcast',
			'not_found' => 'Nenhum Podcast Encontrado',
			'not_found_in_trash' => 'Nenhum Podcast no Lixo',
		)
	));
}

add_action('init', 'custom_post_type_podcast');

?>