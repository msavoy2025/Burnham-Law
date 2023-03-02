<?php
get_header();
the_post();

crb_render_fragment( 'location/intro' );

if ( $sections = carbon_get_the_post_meta( 'crb_location_sections' ) ) {
	foreach ( $sections as $section_index => $section ) {
		crb_render_fragment( 'sections/' . crb_replace_underscores_with_hyphens( array_shift( $section ) ), $section );
	}
}

get_footer();
