<?php
if ( $image    = carbon_get_the_post_meta( 'crb_intro_image' ) ) {
	$bg_style = ' style="background-image: url(' . wp_get_attachment_image_url( $image, 'crb_intro_img_3' ) . ');"';
}

$headline = carbon_get_the_post_meta( 'crb_intro_headline' );
$form_id  = carbon_get_the_post_meta( 'crb_intro_form' );
?>

<section class="section-form-callout section-gray">
	<span class="section__bg"<?php echo $bg_style; ?>></span>

	<div class="shell shell--small">
		<div class="section__inner">
			<div class="section__content">
				<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>

				<?php if ( $subhead = carbon_get_the_post_meta( 'crb_intro_subhead' ) ) : ?>
					<h5><?php echo nl2br( esc_html( $subhead ) ); ?></h5>
				<?php endif ?>

				<?php if ( $content = carbon_get_the_post_meta( 'crb_intro_content' ) ) : ?>
					<p><?php echo nl2br( esc_html( $content ) ); ?></p>
				<?php endif ?>
			</div><!-- /.section__content -->

			<aside class="section__aside">
				<?php if ( $form_headline = carbon_get_the_post_meta( 'crb_intro_form_headline' ) ) : ?>
					<h3><?php echo nl2br( esc_html( $form_headline ) ); ?></h3>
				<?php endif ?>

				<?php if ( $form_subhead = carbon_get_the_post_meta( 'crb_intro_form_subhead' ) ) : ?>
					<p><?php echo nl2br( esc_html( $form_subhead ) ); ?></p>
				<?php endif ?>

				<div class="form-contact form-contact--alt">
					<?php
					crb_render_gform( $form_id, true, array(
						'tabindex' => 10,
					) );
					?>
				</div><!-- /.form-contact form-contact-/-alt -->
			</aside><!-- /.section__aside -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell shell-/-small -->
</section><!-- /.section-form-callout -->
