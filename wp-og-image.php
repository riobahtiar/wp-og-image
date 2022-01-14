<?php
/**
 * Plugin Name: WP OG Image
 * Version: 1.0.0
 * Requires at least: 4.9
 * Requires PHP: 7.2.0
 * Plugin URI: https://rio.my.id/
 * Description: Open Graph Image Enhancer for Twitter, Facebook, Slack, etc
 * Author: Rio B
 * Author URI: https://rio.my.id/a/wp-og-image/
 * Text Domain: wp-og-image
 * Domain Path: /languages
 */

/**
 * @author    Rio B
 * @copyright Rio B, 2021, All Rights Reserved
 * This code is released under the GPL licence version 3 or later, available here
 * https://www.gnu.org/licenses/gpl.txt
 */

 // never allow direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WPOGI_PFX', 'WPOGI_' );
define( 'WPOGI_URL', plugin_dir_url( __FILE__ ) );
define( 'WPOGI_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPOGI_FILE', plugin_basename( __FILE__ ) );
define( 'WPOGI_VERSION', '1.0.5' );
defined( 'WPOGI_ENV' ) or define( 'WPOGI_ENV', 'production' );

require_once __DIR__ . '/Boot.php';

