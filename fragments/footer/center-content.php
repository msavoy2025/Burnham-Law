<?php
$headline   = carbon_get_theme_option( 'crb_footer_headline' );
$btn_label  = carbon_get_theme_option( 'crb_footer_btn_label' );
$btn_url    = carbon_get_theme_option( 'crb_footer_btn_url' );
$btn_target = carbon_get_theme_option( 'crb_footer_btn_target' );
?>

<div class="footer__content">
	<div class="footer__entry">
		<div id="clock" class="clock"></div><!-- /.clock -->

		<?php if ( $headline ) : ?>
			<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
		<?php endif ?>

		<?php if ( $btn_label && $btn_url ) : ?>
			<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
		<?php endif ?>
	</div><!-- /.footer__entry -->
</div><!-- /.footer__content -->
