<?php
$name = get_the_title( $member_id );
$name_parts = explode( ' ', $name, 2 );
$name = implode( '<br>', $name_parts );
$position = carbon_get_post_meta( $member_id, 'crb_position' );
$avvo_rating = carbon_get_post_meta( $member_id, 'crb_avvo_rating' );
$location_id = carbon_get_post_meta( $member_id, 'crb_location' );
?>

<li>
	<div class="team-member">
		<?php if ( ! carbon_get_post_meta( $member_id, 'crb_link_disabled' ) ) : ?>
			<a href="<?php the_permalink( $member_id ); ?>"></a>
		<?php endif ?>

		<div class="team-member__image">
			<span class="image-fit">
				<?php
				if ( has_post_thumbnail( $member_id ) ) {
					echo get_the_post_thumbnail( $member_id, 'crb_member_medium' );
				}
				?>
			</span>
		</div><!-- /.team-member__image -->

		<div class="team-member__content">
			<h4><?php echo $name; ?></h4>

			<h6>
				<?php if ( $position ) : ?>
					<strong><?php echo esc_html( $position ); ?></strong>
				<?php endif;

				if ( $location_id ) {
					echo get_the_title( $location_id );
				}
				?>
			</h6>

			<?php if ( $avvo_rating ) : ?>
				<p>
					<span>
						<strong><?php echo esc_html( $avvo_rating ); ?></strong> <small><?php _e( 'AVVO rating', 'crb' ); ?></small>
					</span>
				</p>
			<?php endif ?>
		</div><!-- /.team-member__content -->
	</div><!-- /.team-member -->
</li>
