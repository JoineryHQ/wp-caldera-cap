<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://joineryhq.com
 * @since      1.0.0
 *
 * @package    Wp_Caldera_Cap
 * @subpackage Wp_Caldera_Cap/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Caldera_Cap
 * @subpackage Wp_Caldera_Cap/includes
 * @author     Allen Shaw <allen@joineryhq.com>
 */
class Wp_Caldera_Cap_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-caldera-cap',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
