<?php

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Wp_Caldera_Cap
 * @subpackage Wp_Caldera_Cap/includes
 * @author     Allen Shaw <allen@joineryhq.com>
 */
class WpCalderaCapPlugin {

  /**
   * The capability we'll define for access to Caldera Forms administration.
   */
  const WP_CALDERA_CAP_CAPABILITY = 'wp_caldera_cap_admin';

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    1.0.0
   */
  public function run() {
    // Implement hook 'caldera_forms_manage_cap' do specify our capability.
    add_filter( 'caldera_forms_manage_cap', 'WpCalderaCapPlugin::defineCaps', 10, 2 );
  }

  /**
   * WP plugin 'activation' hook listener.
   *
   * Adds our capability to the administrator role (thereby making it available
   * for other roles, e.g. in the User Role Editor interface).
   */
  public static function onActivation() {
    $role = get_role('administrator');
    $role->add_cap(self::WP_CALDERA_CAP_CAPABILITY);
  }

  /**
   * WP plugin 'uninstall' hook listener.
   *
   * Removes our capability from all roles (thereby ensureing it doesn't apepar
   * for assignment, e.g. in the User Role Editor interface).
   */
  public static function onUnintstall() {
    $wpRoles = wp_roles();
    foreach ($wpRoles->role_names as $roleName) {
      $role = get_role(strtolower($roleName));
      if (is_object($role) && method_exists($role, 'remove_cap')) {
        $role->remove_cap(self::WP_CALDERA_CAP_CAPABILITY);
      }
    }
  }

  /**
   * 'caldera_forms_manage_cap' nook listener.
   *
   * Reference: https://calderaforms.com/doc/caldera_forms_manage_cap/
   *
   * Specifies our capability for all permission checks by Caldera Forms.
   *
   * NOTE: even with this, a user with 'administrator' role will still have some
   * functionality that a user with this capability does not get, e.g. editing
   * entries.
   *
   * @param String $cap
   * @param String  $context
   * @return type
   */
  public static function defineCaps($cap, $context) {
    return WpCalderaCapPlugin::WP_CALDERA_CAP_CAPABILITY;
  }

}
