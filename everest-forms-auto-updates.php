<?php
/**
 * Plugin Name: Everest Forms - Auto Updates
 * Plugin URI: https://github.com/wpeverest/everest-forms-auto-updates
 * Description: Auto-updates Everest Forms to the latest stable version.
 * Version: 1.0.0
 * Author: WPEverest
 * Author URI: https://wpeverest.com
 * License: GPLv3 or later
 *
 * @package Everest_Forms_Auto_Updates
 */

defined( 'ABSPATH' ) || exit;

/**
 * Auto-updates for Everest Forms forcefully.
 *
 * By default, automatic background updates only happen for plugins in special cases, as determined by
 * the WordPress.org API response, which is controlled by the WordPress security team for patching critical
 * vulnerabilities. To enable or disable updates in all cases, you can leverage the use of auto_update_$type filter.
 *
 * @see https://wordpress.org/support/article/configuring-automatic-background-updates/
 *
 * @param  bool  $update Status for update. Default true.
 * @param  array $item   List of specific item to be updated.
 * @return bool  Modify the status forcefully for auto-updates.
 */
function evf_auto_update_plugins( $update, $item ) {
	// Always update plugins in this array list.
	if ( in_array( $item, array( 'everest-forms' ), true ) ) {
		return true;
	}

	return $update;
}
add_filter( 'auto_update_plugin', 'evf_auto_update_plugins', 10, 2 );
