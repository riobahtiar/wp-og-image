<?php

namespace WP_OG_Image;

use WP_OG_Image\Helper;

class AdminOptions {
	private $wp_og_image_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_og_image_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_og_image_page_init' ) );
	}

	public function wp_og_image_add_plugin_page() {
		add_management_page(
			__( 'OG Image Options', 'wp-og-image' ), // page_title
			__( 'OG Image', 'wp-og-image' ), // menu_title
			'manage_options', // capability
			'wp-og-image', // menu_slug
			array( $this, 'wp_og_image_create_admin_page' ) // function
		);
	}

	public function wp_og_image_create_admin_page() {
		$this->wp_og_image_options = get_option( 'wp_og_image_option_name' );

		Helper\load_view(
			'og-image-options',
			true,
			array(
				'options' => $this->wp_og_image_options,
			)
		);

		?>

<!--		<div class="wrap">-->
<!--			<h2>OG Image</h2>-->
<!--			<p>WP OG Image Options</p>-->
<!--			--><?php // settings_errors(); ?>
<!---->
<!--			<form method="post" action="options.php">-->
<!--				-->
		<?php
		// settings_fields( 'wp_og_image_option_group' );
		// do_settings_sections( 'wp-og-image-admin' );
		// submit_button();
		//
		?>
<!--			</form>-->
<!--		</div>-->
		<?php
	}

	public function wp_og_image_page_init() {
		register_setting(
			'wp_og_image_option_group', // option_group
			'wp_og_image_option_name', // option_name
			array( $this, 'wp_og_image_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'wp_og_image_setting_section', // id
			'Settings', // title
			array( $this, 'wp_og_image_section_info' ), // callback
			'wp-og-image-admin' // page
		);

		add_settings_field(
			'active_by_default_0', // id
			'Active by Default', // title
			array( $this, 'active_by_default_0_callback' ), // callback
			'wp-og-image-admin', // page
			'wp_og_image_setting_section' // section
		);

		add_settings_field(
			'default_title_1', // id
			'Default Title', // title
			array( $this, 'default_title_1_callback' ), // callback
			'wp-og-image-admin', // page
			'wp_og_image_setting_section' // section
		);

		add_settings_field(
			'logo_2', // id
			'Logo', // title
			array( $this, 'logo_2_callback' ), // callback
			'wp-og-image-admin', // page
			'wp_og_image_setting_section' // section
		);

		add_settings_field(
			'show_this_in_3', // id
			'Show this in', // title
			array( $this, 'show_this_in_3_callback' ), // callback
			'wp-og-image-admin', // page
			'wp_og_image_setting_section' // section
		);

		add_settings_field(
			'default_background_4', // id
			'Default Background', // title
			array( $this, 'default_background_4_callback' ), // callback
			'wp-og-image-admin', // page
			'wp_og_image_setting_section' // section
		);
	}

	public function wp_og_image_sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['active_by_default_0'] ) ) {
			$sanitary_values['active_by_default_0'] = $input['active_by_default_0'];
		}

		if ( isset( $input['default_title_1'] ) ) {
			$sanitary_values['default_title_1'] = esc_textarea( $input['default_title_1'] );
		}

		if ( isset( $input['logo_2'] ) ) {
			$sanitary_values['logo_2'] = sanitize_text_field( $input['logo_2'] );
		}

		if ( isset( $input['show_this_in_3'] ) ) {
			$sanitary_values['show_this_in_3'] = $input['show_this_in_3'];
		}

		if ( isset( $input['default_background_4'] ) ) {
			$sanitary_values['default_background_4'] = sanitize_text_field( $input['default_background_4'] );
		}

		return $sanitary_values;
	}

	public function wp_og_image_section_info() {
		echo 'hello world';
	}

	public function active_by_default_0_callback() {
		?>
		 <fieldset><?php $checked = ( isset( $this->wp_og_image_options['active_by_default_0'] ) && $this->wp_og_image_options['active_by_default_0'] === 'yes' ) ? 'checked' : ''; ?>
		<label for="active_by_default_0-0"><input type="radio" name="wp_og_image_option_name[active_by_default_0]" id="active_by_default_0-0" value="yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->wp_og_image_options['active_by_default_0'] ) && $this->wp_og_image_options['active_by_default_0'] === 'no' ) ? 'checked' : ''; ?>
		<label for="active_by_default_0-1"><input type="radio" name="wp_og_image_option_name[active_by_default_0]" id="active_by_default_0-1" value="no" <?php echo $checked; ?>> No</label></fieldset> 
																																									<?php
	}

	public function default_title_1_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="wp_og_image_option_name[default_title_1]" id="default_title_1">%s</textarea>',
			isset( $this->wp_og_image_options['default_title_1'] ) ? esc_attr( $this->wp_og_image_options['default_title_1'] ) : ''
		);
	}

	public function logo_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="wp_og_image_option_name[logo_2]" id="logo_2" value="%s">',
			isset( $this->wp_og_image_options['logo_2'] ) ? esc_attr( $this->wp_og_image_options['logo_2'] ) : ''
		);
	}

	public function show_this_in_3_callback() {
		printf(
			'<input type="checkbox" name="wp_og_image_option_name[show_this_in_3]" id="show_this_in_3" value="show_this_in_3" %s> <label for="show_this_in_3">yes:Yesno:No</label>',
			( isset( $this->wp_og_image_options['show_this_in_3'] ) && $this->wp_og_image_options['show_this_in_3'] === 'show_this_in_3' ) ? 'checked' : ''
		);
	}

	public function default_background_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="wp_og_image_option_name[default_background_4]" id="default_background_4" value="%s">',
			isset( $this->wp_og_image_options['default_background_4'] ) ? esc_attr( $this->wp_og_image_options['default_background_4'] ) : ''
		);
	}

}


/*
 * Retrieve this value with:
 * $wp_og_image_options = get_option( 'wp_og_image_option_name' ); // Array of All Options
 * $active_by_default_0 = $wp_og_image_options['active_by_default_0']; // Active by Default
 * $default_title_1 = $wp_og_image_options['default_title_1']; // Default Title
 * $logo_2 = $wp_og_image_options['logo_2']; // Logo
 * $show_this_in_3 = $wp_og_image_options['show_this_in_3']; // Show this in
 * $default_background_4 = $wp_og_image_options['default_background_4']; // Default Background
 */

