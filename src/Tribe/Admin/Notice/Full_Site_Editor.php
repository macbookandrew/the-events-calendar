<?php
namespace Tribe\Events\Admin\Notice;

/**
 * Class Full_Site_Editor
 *
 * @since TBD
 *
 */
class Full_Site_Editor {
	/**
	 * Register the notices related to Full Site Editor.
	 *
	 * @since TBD
	 */
	public function hook() {
		tribe_notice(
			'full-site-editor-widgets',
			[ $this, 'widgets_display' ],
			[
				'type'     => 'warning',
				'dismiss'  => 1,
				'priority' => - 1,
				'wrap'     => 'p',
			],
			[ $this, 'widgets_should_display' ]
		);
	}

	/**
	 * Whether the FSE Widgets notice should display.
	 *
	 * @since TBD
	 *
	 * @return boolean
	 */
	public function widgets_should_display() {
		global $current_screen;
		$screens = [
			'tribe_events_page_tribe-app-shop', // App shop.
			'events_page_tribe-app-shop', // App shop.
			'tribe_events_page_tribe-common', // Settings & Welcome.
			'events_page_tribe-common', // Settings & Welcome.
			'toplevel_page_tribe-common', // Settings & Welcome.
		];

		// If not a valid screen, don't display.
		if ( empty( $current_screen->id ) || ! in_array( $current_screen->id, $screens, true ) ) {
			return false;
		}

		return function_exists( 'wp_is_block_theme' ) && wp_is_block_theme();
	}

	/**
	 * HTML for the FSE Widgets compatibility.
	 *
	 * @see   https://evnt.is/wp5-7
	 *
	 * @since TBD
	 *
	 * @return string
	 */
	public function widgets_display() {
		$html     = esc_html__( 'The Event List widget is not yet supported for themes using the Full Site Editor.', 'the-events-calendar' );
		$html .= ' <a target="_blank" href="https://evnt.is/fse-compatibility">' . esc_html__( 'Read more.', 'the-events-calendar' ) . '</a>';

		/**
		 * Allows the modification of the notice for FSE widgets incompatibility.
		 *
		 * @since TBD
		 */
		return apply_filters( 'tec_events_admin_notice_full_site_editor_widget_html', $html, $this );
	}
}