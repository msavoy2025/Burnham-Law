<?php
$headline        = carbon_get_the_post_meta( 'crb_intro_headline' );
$subhead         = carbon_get_the_post_meta( 'crb_intro_subhead' );
$content         = carbon_get_the_post_meta( 'crb_intro_content' );
$address         = carbon_get_the_post_meta( 'crb_address' );
$directions_link = carbon_get_the_post_meta( 'crb_directions_link' );
$phone           = carbon_get_the_post_meta( 'crb_phone' );
?>

<section class="section-location-details section-gray">
	<div class="shell">
		<div class="section__inner">
			<aside class="section__aside section__aside--left">
				<?php if ( $address ) : ?>
					<p>
						<strong><?php _e( 'Address', 'crb' ); ?></strong>

						<?php echo nl2br( esc_html( $address ) ); ?>

						<?php if ( $directions_link ) : ?>
							<a href="<?php echo esc_url( $directions_link ); ?>" target="_blank"><?php _e( 'Directions', 'crb' ); ?></a>
						<?php endif ?>
					</p>
				<?php endif ?>
			</aside><!-- /.section__aside -->

			<div class="section__content">
				<?php if ( $headline ) : ?>
					<h1><?php echo esc_html( $headline ); ?></h1>
				<?php endif ?>

				<?php if ( $subhead ) : ?>
					<h6><?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $subhead ) ) ); ?></h6>
				<?php endif;

				echo wpautop( esc_html( $content ) );
				?>
			</div><!-- /.section__content -->

			<aside class="section__aside section__aside--right">
				<?php if ( $phone ) : ?>
					<p>
						<strong><?php _e( 'Phone Number', 'crb' ); ?></strong>

						<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
					</p>
				<?php endif ?>
			</aside><!-- /.section__aside -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-location-details -->
