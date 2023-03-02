<div class="footer__aside footer__aside--left">
	<div class="footer__logo">
		<a href="<?php echo home_url(); ?>">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/footer-logo.svg" alt="<?php _e( 'Footer Logo', 'crb' ); ?>" />
		</a>

		<?php if ( $content = carbon_get_theme_option( 'crb_footer_side_content' ) ) : ?>
			<p><?php echo nl2br( esc_html( $content ) ); ?></p>
		<?php endif ?>

		<p class="footer_callNow">call now</p>

		<?php if ( $phone = carbon_get_theme_option( 'crb_footer_phone_number' ) ) : ?>
			<p class="footer_phoneNumber"><?php echo esc_html( $phone ); ?></p>
		<?php endif ?>

	</div><!-- /.footer__logo -->

	<div class="footer__socials">
		<?php if ( $headline = carbon_get_theme_option( 'crb_footer_socials_headline' ) ) : ?>
			<h6><?php echo esc_html( $headline ); ?></h6>
		<?php endif ?>

		<?php if ( $socials = carbon_get_theme_option( 'crb_socials' ) ) : ?>
			<ul>
				<?php foreach ( $socials as $social ) : ?>
					<li>
						<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank"><?php echo esc_html( $social['name'] ); ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
	</div><!-- /.footer__socials -->

	<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
		<nav class="footer__nav">
			<?php if ( $headline = carbon_get_theme_option( 'crb_footer_menu_headline' ) ) : ?>
				<h6><?php echo esc_html( $headline ); ?></h6>
			<?php endif ?>

			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container'      => false,
				'depth'          => 1,
			) );
			?>
		</nav><!-- /.footer__nav -->
	<?php endif ?>

	<a href="https://burnhamlaw.securepayments.cardpointe.com/pay"><button class="footer_payButton">Pay Online</button></a>

</div><!-- /.footer__aside -->
