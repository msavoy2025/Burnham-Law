<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'crb_shortcode_year' );
function crb_shortcode_year() {
	return current_time( 'Y' );
}

/**
 * Phone Shortcode
 */
add_shortcode( 'phone', 'crb_phone' );
function crb_phone( $atts, $content ) {
	if ( empty( $content ) ) {
		return;
	}

	ob_start();
	?><a href="tel:<?php echo crb_filter_phone_number( $content ); ?>"><?php echo esc_html( $content ); ?></a><?php
	$html = ob_get_clean();

	return $html;
}
