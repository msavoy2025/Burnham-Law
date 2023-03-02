<?php
if ( ! carbon_get_the_post_meta( 'crb_show_callout' ) ) {
	return;
}

$small_paddings  = carbon_get_the_post_meta( 'crb_cta_small_paddings' );
$bg_color        = carbon_get_the_post_meta( 'crb_cta_bg_color' );
$first_headline  = carbon_get_the_post_meta( 'crb_cta_first_headline' );
$second_headline = carbon_get_the_post_meta( 'crb_cta_second_headline' );
$small_text      = carbon_get_the_post_meta( 'crb_cta_small_text' );
$btn_label       = carbon_get_the_post_meta( 'crb_cta_btn_label' );
$btn_url         = carbon_get_the_post_meta( 'crb_cta_btn_url' );
$btn_target      = carbon_get_the_post_meta( 'crb_cta_btn_target' );
?>

<section class="section-callout<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="callout-text<?php echo $small_paddings ? ' callout-text--sm' : ''; ?>">
			<?php if ( $first_headline ) : ?>
				<h2><?php echo nl2br( esc_html( $first_headline ) ); ?></h2>
			<?php endif ?>

			<?php if ( $second_headline ) : ?>
				<h2><?php echo nl2br( esc_html( $second_headline ) ); ?></h2>
			<?php endif ?>

			<?php if ( $small_text ) : ?>
				<p><?php echo nl2br( esc_html( $small_text ) ); ?></p>
			<?php endif ?>

			<?php if ( $btn_label && $btn_url ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
			<?php endif ?>
		</div><!-- /.callout-text -->
	</div><!-- /.shell -->
</section><!-- /.section-callout -->
