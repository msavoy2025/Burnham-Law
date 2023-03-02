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

					<a class="barLink" href="<?php echo esc_url( $bar_url ); ?>" target="<?php echo $bar_target; ?>">
				<?php endif ?>
					<div class="bar"><?php echo crb_replace_char_with( $bar_text, '*', 'span' ); ?></div>
				<?php if ( $bar_url ) : ?>
					</a>
				<?php endif ?>
			<?php endif ?>

			<header class="header">
				<div class="shell">
					<div class="header__inner">
						<div class="header__logo">
							<a href="<?php echo home_url(); ?>" class="logo">
								<img class="skip-lazy" src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/logo.svg" alt="" />
								<img class="skip-lazy" src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/logo-white.svg" alt="" />
							</a>
						</div><!-- /.header__logo -->

						<button class="btn-menu" type="button">
							<span></span>
						</button><!-- /.btn-menu -->

						<div class="header__nav">
							<?php
							crb_render_fragment( 'header/main-nav' );

							$label  = carbon_get_theme_option( 'crb_header_btn_label' );
							$url    = carbon_get_theme_option( 'crb_header_btn_url' );
							$target = carbon_get_theme_option( 'crb_header_btn_target' );
							?>

							<div class="header__actions">
								<?php if ( $side_text = carbon_get_theme_option( 'crb_header_side_text' ) ) : ?>
									<p><?php echo do_shortcode( nl2br( esc_html( $side_text ) ) ); ?></p>
								<?php endif ?>

								<?php if ( $label && $url ) : ?>
									<a href="<?php echo esc_url( $url ); ?>" class="btn btn--small" target="<?php echo $target; ?>"><?php echo esc_html( $label ); ?></a>
								<?php endif ?>
							</div><!-- /.header__actions -->
						</div><!-- /.header__nav -->

						<div class="header__actions">
							<?php if ( $side_text ) : ?>
								<p><?php echo do_shortcode( nl2br( esc_html( $side_text ) ) ); ?></p>
							<?php endif ?>

							<?php if ( $label && $url ) : ?>
								<a href="<?php echo esc_url( $url ); ?>" class="btn btn--small" target="<?php echo $target; ?>"><?php echo esc_html( $label ); ?></a>
							<?php endif ?>
						</div><!-- /.header__actions -->
					</div><!-- /.header__inner -->
				</div><!-- /.shell -->
			</header><!-- /.header -->

			<?php crb_render_fragment( 'header/main-nav-dropdown' ); ?>

			<div class="main">
