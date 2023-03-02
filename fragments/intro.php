<?php
if ( ! carbon_get_the_post_meta( 'crb_show_intro' ) ) {
	return;
}

$image           = carbon_get_the_post_meta( 'crb_intro_image' );
$first_headline  = carbon_get_the_post_meta( 'crb_intro_first_headline' );
$second_headline = carbon_get_the_post_meta( 'crb_intro_second_headline' );
$subhead         = carbon_get_the_post_meta( 'crb_intro_subhead' );
$content         = carbon_get_the_post_meta( 'crb_intro_content' );
$left_text       = carbon_get_the_post_meta( 'crb_intro_left_text' );
$right_text      = carbon_get_the_post_meta( 'crb_intro_right_text' );
$scroll_label    = carbon_get_the_post_meta( 'crb_intro_scroll_label' );
?>

<section class="section-intro section-gray">
	<div class="shell">
		<div class="section__container">
			<div class="section__inner">
				<?php if ( $scroll_label ) : ?>
					<button type="button" class="section__btn btn-scroll-down js-scroll-down">
						<span><?php echo esc_html( $scroll_label ); ?></span>
					</button>
				<?php endif ?>

				<div class="section__aside section__aside--left">
					<p><?php echo esc_html( $left_text ); ?></p>
				</div><!-- /.section__aside section__aside-left -->

				<div class="section__content">
					<div class="section__image">
						<?php echo wp_get_attachment_image( $image, 'crb_intro_img' ); ?>
					</div><!-- /.section__image -->

					<div class="section__entry">

						<h1><?php echo esc_html( $first_headline ); ?></h1>

						<h3><?php echo nl2br( esc_html( $second_headline ) ); ?></h3>

						<h6><?php echo esc_html( $subhead ); ?></h6>

						<p><?php echo nl2br( esc_html( $content ) ); ?></p>
					</div><!-- /.section__entry -->
				</div><!-- /.section__content -->

				<div class="section__aside section__aside--right">
					<p><?php echo esc_html( $right_text ); ?></p>
				</div><!-- /.section__aside section__aside-right -->
			</div><!-- /.section__inner -->
		</div><!-- /.section__container -->
	</div><!-- /.shell -->
</section><!-- /.section-intro -->
