<?php
/**
 * Plugin Name: WP OG Image
 * Version: 0.0.1
 * Requires at least: 4.9
 * Requires PHP: 7.2.0
 * Plugin URI: https://rio.my.id/
 * Description: Open Graph Image Enhancer for Twitter, Facebook, Slack, etc
 * Author: Rio B
 * Author URI: https://rio.my.id/a/wp-og-image/
 * Network: false
 * Text Domain: wp-og-image
 * Domain Path: /assets/languages
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

if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
    require __DIR__ . '/vendor/autoload.php';
}
