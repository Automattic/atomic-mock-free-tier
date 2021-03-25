<?php
/**
 * Plugin Name: Mock Free Atomic
 * Description: Will match user capabilities for those on a Free tier of Atomic.
 */

add_filter( 'map_meta_cap', 'mock_woa_free_plan_caps', 11, 2 );
function mock_woa_free_plan_caps( $caps, $cap ) {
	$theme_caps = [
		'edit_themes',
		'install_themes',
		'update_themes',
		'delete_themes',
		'upload_themes',
	];

	$plugin_caps = [
		'activate_plugins',
		'install_plugins',
		'edit_plugins',
		'upload_plugins',
	];

	$all_atomic_caps = array_merge( $theme_caps, $plugin_caps );

	if ( in_array( $cap, $all_atomic_caps, true ) ) {
		$caps[] = 'do_not_allow';
  }

	return $caps;
}
