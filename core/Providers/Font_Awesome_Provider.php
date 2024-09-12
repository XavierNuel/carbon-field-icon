<?php

namespace Carbon_Field_Icon\Providers;

class Font_Awesome_Provider implements Icon_Provider_Interface {
	const VERSION = '4.7.0';

	/**
	 * Enqueue assets in the backend.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		wp_enqueue_style( 
			'fontawesome', 
			'https://maxcdn.bootstrapcdn.com/font-awesome/'. static::VERSION .'/css/font-awesome.min.css',
			[],
			static::VERSION
		);
	}

	/**
	 * Get the provider options.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function parse_options() {
		$options = [];

		$icons = json_decode( file_get_contents( \Carbon_Field_Icon\DIR . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'fontawesome.json' ), true );

		foreach ( $icons as $icon ) {
			$value = $icon['id'];
			
			$options[ $value ] = array(
				'value'        => $value,
				'name'         => $icon['name'],
				'class'        => 'fa fa-' . $icon['id'],
				'search_terms' => [],
				'provider'     => 'fontawesome',
			);

		}

		return $options;
	}
}
