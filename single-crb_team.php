<?php
get_header();
the_post();

$position = carbon_get_the_post_meta( 'crb_position' );
$location_id = carbon_get_the_post_meta( 'crb_location' );
$assistant_image = carbon_get_the_post_meta( 'crb_assistant_img' );
$assistant_name = carbon_get_the_post_meta( 'crb_assistant_name' );
$assistant_position = carbon_get_the_post_meta( 'crb_assistant_position' );
$assistant_copy = carbon_get_the_post_meta( 'crb_assistant_description' );

?>

<section class="section-team-member-single">
	<div class="shell">
		<div class="team-member-single">
			<div class="team__aside">
				<div class="team__title">
					<h1><?php the_title(); ?></h1>

					<h6>
						<?php if ( $position ) : ?>
							<strong><?php echo esc_html( $position ); ?></strong>
						<?php endif;

						if ( $location_id ) {
							echo get_the_title( $location_id );
						}
						?>
					</h6>
				</div><!-- /.team__title -->

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="team__image">
						<?php the_post_thumbnail( 'crb_member_large' ); ?>
					</div><!-- /.team__image -->
				<?php endif;

				crb_render_fragment( 'member/side-details' );
				?>
			</div><!-- /.team__aside -->

			<div class="team__content">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="team__image">
						<?php the_post_thumbnail( 'crb_member_large' ); ?>
					</div><!-- /.team__image -->
				<?php endif ?>

				<div class="team__entry">
					<?php the_content(); ?>
				</div><!-- /.team__entry -->
			</div><!-- /.team__content -->
		</div><!-- /.team-member-single -->
	</div><!-- /.shell -->
</section><!-- /.section-team-member-single -->


<?php if ( !empty( $assistant_name ) ) { ?>
<section class="member_assistant" style="background-image:url(<?php echo get_theme_file_uri('/resources/images/icons/assistantBG.svg'); ?>)">
	<h1 class="assistant_header">Meet My Assistant.</h1>

	<div class="assistant_details shell">
		<div class="assistant_image">
			<h2 class="assistant_nameMobile"><?php echo esc_html( $assistant_name ); ?></h2>
			<p class="assistant_positionMobile"><?php echo esc_html( $assistant_position ); ?></p>
			<?php echo wp_get_attachment_image( $assistant_image, 'crb_assistant_img' ); ?>
		</div>
		<div class="assistant_description">
			<h2 class="assistant_name"><?php echo esc_html( $assistant_name ); ?></h2>
			<p class="assistant_position"><?php echo esc_html( $assistant_position ); ?></p>
			<p class="assistant_copy"><?php echo nl2br( esc_html( $assistant_copy ) ); ?></p>
		</div>
	</div>
</section>
<?php } else {} ?>
<?php
get_footer();
