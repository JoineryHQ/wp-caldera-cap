<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://joineryhq.com
 * @since      1.0.0
 *
 * @package    Wp_Caldera_Cap
 * @subpackage Wp_Caldera_Cap/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wp_Caldera_Cap
 * @subpackage Wp_Caldera_Cap/includes
 * @author     Allen Shaw <allen@joineryhq.com>
 */
class WpCalderaCapPlugin {

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
       $adminRoles = [
      'administrator',
      'super admin',
    ];
    foreach ($adminRoles as $adminRole) {
      $role = get_role( $adminRole );
      if (is_object($role) && method_exists($role, 'add_cap')) {
        foreach (WpCalderaCapUtil::getCalderaContexts() as $context) {
          $role->add_cap( WpCalderaCapUtil::convertContextToCap($context) );
        }
      }
    }
    
//    add_filter( 'caldera_forms_manage_cap', 'WpCalderaCapUtil::defineCaps', 10, 2 );    
	}

}
