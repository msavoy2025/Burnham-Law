<?php
/**
 * Template Name: The Team
 */
get_header();
?>

<section class="section-team">
	<div class="shell">
		<?php
		crb_render_fragment( 'team/intro' );

		crb_render_fragment( 'team/loop' );
		?>
	</div><!-- /.shell -->
</section><!-- /.section-team -->

<?php
crb_render_fragment( 'cta' );

get_footer();
