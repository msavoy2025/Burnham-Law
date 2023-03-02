<?php
/**
 * Template Name: PPC v2
 */
get_header( 'landing' );

crb_render_fragment( 'ppc-2/intro' );

if ( $sections = carbon_get_the_post_meta( 'crb_ppc_2_sections' ) ) {
	foreach ( $sections as $section_index => $section ) {
		$section['section_index'] = $section_index;
		crb_render_fragment( 'ppc-2/sections/' . crb_replace_underscores_with_hyphens( array_shift( $section ) ), $section );
	}
}

get_footer( 'landing' );
