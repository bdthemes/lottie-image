<?php

/**
 * Plugin Name: Lottie Image
 * Plugin URI: https://bdthemes.com/products/lottie-image/
 * Description: Lottie Image is a block that allows you to add Lottie animations to your website.
 * Version: 1.0.0
 * Author: TALIB
 * Author URI: https://bdthemes.com/
 * License: GPLv3
 * Text Domain: lottie-image
 * Domain Path: /languages/
 */

// Stop Direct Access
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Blocks Final Class
 */

final class BDT_LOTTIE_IMAGE {
	public function __construct() {


		// block initialization
		add_action('init', [$this, 'blocks_init']);

		// blocks category
		if (version_compare($GLOBALS['wp_version'], '5.7', '<')) {
			add_filter('block_categories', [$this, 'register_block_category'], 10, 999);
		} else {
			add_filter('block_categories_all', [$this, 'register_block_category'], 10, 999);
		}
		// load plugin files
		// $this->load_files();lottie-
	}

	/**
	 * Initialize the plugin
	 */

	public static function init() {
		static $instance = false;
		if (!$instance) {
			$instance = new self();
		}
		return $instance;
	}


	/**
	 * Blocks Registration
	 */

	public function register_block($name, $options = array()) {
		register_block_type(__DIR__ . '/build/blocks/' . $name, $options);
	}

	/**
	 * Blocks Initialization
	 */
	public function blocks_init() {
		// register single block
		$this->register_block('lottie-image');
	}

	/**
	 * Register Block Category
	 */

	public function register_block_category($categories, $post) {
		return array_merge(
			array(
				array(
					'slug'  => 'lottie-image',
					'title' => __('Lottie Image', 'lottie-image'),
				),
			),
			$categories,
		);
	}
}

/**
 * Kickoff
 */

BDT_LOTTIE_IMAGE::init();
