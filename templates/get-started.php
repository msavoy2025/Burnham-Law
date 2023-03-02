<?php
/**
 * Template Name: Get Started
 */
get_header();
?>

<section class="section-get-started section-gray">
	<div class="shell">
		<div class="section__inner">
			<header class="section__head">
				<h1><?php the_title(); ?></h1>
			</header><!-- /.section__head -->

			<div class="section__body">
				<?php
				if ( $sections = carbon_get_the_post_meta( 'crb_get_started_sections' ) ) {
					foreach ( $sections as $section_index => $section ) {
						crb_render_fragment( 'get-started/' . crb_replace_underscores_with_hyphens( array_shift( $section ) ), $section );
					}
				}
				?>
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-get-started -->

<?php
crb_render_fragment( 'cta' );

get_footer();
