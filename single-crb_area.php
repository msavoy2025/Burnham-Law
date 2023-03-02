<?php
get_header();
the_post();

crb_render_fragment( 'practice-area/intro' );

crb_render_fragment( 'practice-area/cards' );

if ( $sections = carbon_get_the_post_meta( 'crb_global_sections' ) ) {
	foreach ( $sections as $section_index => $section ) {
		$section['section_index'] = $section_index;
		crb_render_fragment( 'sections/' . crb_replace_underscores_with_hyphens( array_shift( $section ) ), $section );
	}
}

crb_render_fragment( 'cta' );

get_footer();
