<?php
if ( ! $locations = carbon_get_theme_option( 'crb_footer_locations' ) ) {
	return;
}
?>

<div class="footer__aside footer__aside--right">
	<div class="footer__locations">
		<?php if ( $headline = carbon_get_theme_option( 'crb_footer_locations_headline' ) ) : ?>
			<h6><?php echo esc_html( $headline ); ?></h6>
		<?php endif ?>

		<ul>
			<?php foreach ( $locations as $location ) :
				$address = carbon_get_post_meta( $location['id'], 'crb_address' );
				$directions_link = carbon_get_post_meta( $location['id'], 'crb_directions_link' );
				?>

				<li>
					<span>
						<a href="<?php the_permalink( $location['id'] ); ?>">
							<?php echo get_the_title( $location['id'] ); ?>
						</a>
					</span>

					<p>
						<?php if ( $directions_link ) : ?>
							<a href="<?php echo esc_url( $directions_link ); ?>" target="_blank">
						<?php endif ?>

							<?php echo nl2br( esc_html( $address ) ); ?>

						<?php if ( $directions_link ) : ?>
							</a>
						<?php endif ?>
					</p>
				</li>
			<?php endforeach ?>
		</ul>
	</div><!-- /.footer__locations -->
</div><!-- /.footer__aside -->
