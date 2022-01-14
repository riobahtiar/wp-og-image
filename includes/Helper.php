<?php

namespace WP_OG_Image\Helper;

/**
 * View loader Helper
 *
 * @param string $view The view name
 * @param array  $data The data to pass to the view
 * @param bool   $is_admin Whether the view is for the admin or not
 *
 * @return string The rendered view
 *
 * @package WP_OG_Image\Helper
 * @since 1.0.0
 */
function load_view( string $view, bool $is_admin = false, array $data = array() ) {
	$admin_path = $is_admin ? 'admin/' : '';
	$view_path  = WPOGI_PATH . '/views/' . $admin_path . $view . '.php';
	if ( ! file_exists( $view_path ) ) {
		return '';
	}

	extract( $data );
	include $view_path;
}
