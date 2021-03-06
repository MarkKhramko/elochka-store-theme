<?php
	function elochka_load_stylesheets(){
		wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', [], '0.0.1', 'all');
		wp_enqueue_style('stystylesheetle');

		wp_register_style('elochka-style', get_template_directory_uri() . '/static/css/index.css', [], '0.0.1', 'all');
		wp_enqueue_style('elochka-style');

		wp_register_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], '0.0.1', 'all');
		wp_enqueue_style('slick-style');

        wp_register_style('lightbox-style', get_template_directory_uri() . './lightbox.min.css', [], '0.0.1', 'all');
        wp_enqueue_style('lightbox-style');
	}
	add_action('wp_enqueue_scripts', 'elochka_load_stylesheets');

	function elochka_load_scripts(){
		// Unregister old jQuery
		wp_deregister_script('jquery');
		// Do not update this jQuery version! 1.9.0 Works with all plugins!!
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', array(), null, true);

		// Register modules
		wp_register_script('jquery-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), null, true);
		wp_register_script('jquery-mask', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', array(), null, true);
		wp_register_script('lightbox', get_template_directory_uri() . '/static/js/lightbox.min.js', array(), null, false);


		// Enqueue
		wp_enqueue_script('jquery-slick');
		wp_enqueue_script('jquery-mask');
		wp_enqueue_script('lightbox');

		// Register theme scripts
		wp_register_script('elochka-js', get_template_directory_uri() . '/static/js/index.js', null, 1, true);
		wp_enqueue_script('elochka-js');
	}

	add_action('wp_enqueue_scripts', 'elochka_load_scripts');

	/*
	 * Sidebars
	 */
	// function elochka_register_catalog_sidebars() {
	// 	/* Register the 'product-filter' sidebar. */
	// 	register_sidebar(
	// 			array(
	// 				'id'            => 'elochka_catalog_sidebar',
	// 				'name'          => __('Catalog Sidebar'),
	// 				'description'   => __('Sidebar for Catalog filters & stuff.'),
	// 				'before_widget' => '<div id="%1$s" class="widget %2$s">',
	// 				'after_widget'  => '</div>',
	// 				'before_title'  => '<h3 class="widget-title">',
	// 				'after_title'   => '</h3>',
	// 			)
	// 	);
	// }
	// add_action('widgets_init', 'elochka_register_catalog_sidebars');

	/*
	 * Menus
	 */
	// Add menu support
	add_theme_support('menus');

	// Register menus
	register_nav_menus(
		[
			'elochka-top-menu' => 'Top Menu',
			'elochka-gallery-menu' => 'Gallery Menu'
		]
	);


	/*
	 *	WooCommerce setup
	 */
	// Set woocommerce support
	add_action('after_setup_theme', function() {
		add_theme_support( 'woocommerce' );
	});

	
	// Set breadcrumbs category as query param, instead of URL
	function custom_change_breadcrumb($crumbs) {
		$newCrumbs = array();
		if(!empty($crumbs)):
			foreach ($crumbs as $crumb):

				$newCrumb = array();
				$newCrumb[0] = $crumb[0];
				if (preg_match("/product-category/i", $crumb[1])){
					$category = get_term_by('name', $crumb[0], 'product_cat');
					$newCrumb[1] = '/katalog/?category=' . $category->slug;
				}
				else if (preg_match("/category/i", $crumb[1])){
					$newCrumb[1] = "/encyclopedia/";
				}
				else{
					$newCrumb[1] = $crumb[1];
				}

				$newCrumbs[] = $newCrumb;
			endforeach;
		endif;

		return $newCrumbs;
	}
	add_filter( 'woocommerce_get_breadcrumb', 'custom_change_breadcrumb' );

	// Remove all WooCommerce Styles
	add_filter('woocommerce_enqueue_styles', '__return_empty_array' );

	add_theme_support('wc-product-gallery-slider');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	// Remove WooCommerce shop title
	add_filter('woocommerce_show_page_title', '__return_false');

	// Alter WooCommerce shop posts per page
	function wpex_woo_posts_per_page($cols) {
		return 12;
	}
	add_filter('loop_shop_per_page', 'wpex_woo_posts_per_page');

	// Remove WooCommerce breadcrumbs
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


	/*
	 * Register custom query vars
	 */
	function elochka_register_query_vars($vars) {
		$vars[] = 'attributes';
		$vars[] = 'category';
		$vars[] = 'term-names';
		$vars[] = 'orderby';
		$vars[] = 'search';
		return $vars;
	}
	add_filter('query_vars', 'elochka_register_query_vars');


	/*
	 * Global custom functions
	 */
	/**
	 * Like get_template_part() but lets you pass args to the template file
	 * Args are available in the template as $args array.
	 * Args can be passed in as url parameters, e.g 'key1=value1&key2=value2'.
	 * Args can be passed in as an array, e.g. ['key1' => 'value1', 'key2' => 'value2']
	 * Filepath is available in the template as $file string.
	 * @param string      $slug The slug name for the generic template.
	 * @param string|null $name The name of the specialized template.
	 * @param array       $args The arguments passed to the template
	 */
	function _get_template_part( $slug, $name = null, $args = array() ) {
		if ( isset( $name ) && $name !== 'none' ) $slug = "{$slug}-{$name}.php";
		else $slug = "{$slug}.php";
		$dir = get_template_directory();
		$file = "{$dir}/{$slug}";

		ob_start();
		$args = wp_parse_args( $args );
		$slug = $dir = $name = null;
		require( $file );
		echo ob_get_clean();
	}
?>