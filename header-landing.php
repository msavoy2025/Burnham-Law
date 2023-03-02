<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<script type="text/javascript">
		let vh = window.innerHeight * 0.01;
		document.documentElement.style.setProperty('--vh', `${vh}px`);

		window.addEventListener('resize', () => {
		  let vh = window.innerHeight * 0.01;
		  document.documentElement.style.setProperty('--vh', `${vh}px`);
		});
	</script>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="wrapper__inner">
			<?php if ( $bar_text = carbon_get_theme_option( 'crb_header_bar_text' ) ) : ?>
				<?php if ( $bar_url = carbon_get_theme_option( 'crb_header_bar_url' ) ) :
					$bar_target = carbon_get_theme_option( 'crb_header_bar_target' );
					?>

					<a href="<?php echo esc_url( $bar_url ); ?>" target="<?php echo $bar_target; ?>">
				<?php endif ?>
					<div class="bar"><?php echo crb_replace_char_with( $bar_text, '*', 'span' ); ?></div>
				<?php if ( $bar_url ) : ?>
					</a>
				<?php endif ?>
			<?php endif ?>

			<header class="header header--alt">
				<div class="shell shell--small">
					<div class="header__inner">
						<div class="header__logo">
							<a href="<?php echo home_url(); ?>" class="logo">
								<img class="skip-lazy" src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/logo.svg" alt="" />
								<img class="skip-lazy" src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/logo-white.svg" alt="" />
							</a>
						</div><!-- /.header__logo -->

						<?php
						$headline  = carbon_get_the_post_meta( 'crb_hf_headline' );
						$address   = carbon_get_the_post_meta( 'crb_hf_address' );
						$phone     = carbon_get_the_post_meta( 'crb_hf_phone' );
						$btn_label = carbon_get_the_post_meta( 'crb_hf_btn_label' );
						?>

						<?php if ( $headline || $address || $phone ): ?>
							<div class="header__contacts">
								<?php if ( $headline || $address ) : ?>
									<p>
										<?php if ( $headline ) : ?>
											<strong><?php echo esc_html( $headline ); ?></strong>
										<?php endif ?>

										<?php if ( $phone ) : ?>
											<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
										<?php endif ?>

										<?php
										if ( $address ) {
											echo nl2br( esc_html( $address ) );
										}
										?>
									</p>
								<?php endif ?>

								<?php if ( $phone && $btn_label ) : ?>
									<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>" class="btn btn--transparent btn--xsmall"><?php echo esc_html( $btn_label ); ?></a>
								<?php endif ?>
							</div><!-- /.header__contacts -->
						<?php endif ?>

					</div><!-- /.header__inner -->
				</div><!-- /.shell -->
			</header><!-- /.header -->

			<div class="main">
