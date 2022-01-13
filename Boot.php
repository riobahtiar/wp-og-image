<?php
namespace WP_OG_Image;

include_once WPOGI_PATH . 'includes/AdminOptions.php';
include_once WPOGI_PATH . 'includes/Helper.php';


if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
    require WPOGI_PATH . 'vendor/autoload.php';
}


/**
 * Class Boot
 *
 * @package WP_OG_Image
 */

class Boot{

	public function __construct() {

		$this->set_action();
		//$this->set_filter();

		if ( is_admin() )
			new AdminOptions();

	}

	public function set_action(){
		add_action('plugins_loaded', array($this, 'set_locale'));
	}

	public function set_filter(){
		return;
	}

	public function set_locale() {
		load_plugin_textdomain(
			'wp-og-image',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/'
		);
	}

}

new Boot();
