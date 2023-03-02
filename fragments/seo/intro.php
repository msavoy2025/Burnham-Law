<?php
$image     = carbon_get_the_post_meta( 'crb_intro_image' );
$btn_label = carbon_get_the_post_meta( 'crb_intro_btn_label' );
$btn_url   = carbon_get_the_post_meta( 'crb_intro_btn_url' );
?>

<header class="section__head">
	<div class="section__head-content">
		<?php if ( $headline = carbon_get_the_post_meta( 'crb_intro_headline' ) ) : ?>
			<h1><?php echo nl2br( esc_html( $headline ) ); ?></h1>
		<?php endif ?>

		<div class="section__image">
			<span class="section__image-bg image-fit js-image-fit">
				<?php echo wp_get_attachment_image( $image, 'crb_intro_img_2' ); ?>
			</span>

			<div class="section__text">
				<?php if ( $subhead = carbon_get_the_post_meta( 'crb_intro_subhead' ) ) : ?>
					<h4><?php echo nl2br( esc_html( $subhead ) ); ?></h4>
				<?php endif ?>

				<?php if ( $btn_label && $btn_url ) :
					$btn_target = carbon_get_the_post_meta( 'crb_intro_btn_target' );
					?>

					<a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_target; ?>">
						<span><?php echo esc_html( $btn_label ); ?></span>

						<?php if ( carbon_get_the_post_meta( 'crb_intro_btn_icon' ) ) : ?>
							<i class="ico-play"></i>
						<?php endif ?>
					</a>
				<?php endif ?>
			</div><!-- /.section__text -->
		</div><!-- /.section__image -->
	</div><!-- /.section__head-content -->

	<div class="section__head-aside">
		<div class="form-contact">
			<?php if ( $form_headline = carbon_get_the_post_meta( 'crb_intro_form_headline' ) ) : ?>
				<h4><?php echo nl2br( esc_html( $form_headline ) ); ?></h4>
			<?php endif ?>

			<?php if ( $form_subhead = carbon_get_the_post_meta( 'crb_intro_form_subhead' ) ) : ?>
				<p><?php echo nl2br( esc_html( $form_subhead ) ); ?></p>
			<?php endif ?>

			<?php
			if ( $form_id = carbon_get_the_post_meta( 'crb_intro_form' ) ) {
				crb_render_gform( $form_id, true, array(
					'tabindex' => 10,
				) );
			}
			?>
		</div><!-- /.form-contact -->

		<?php if ( $form_bottom_headline = carbon_get_the_post_meta( 'crb_intro_form_bottom_headline' ) ) : ?>
			<strong><?php echo nl2br( esc_html( $form_bottom_headline ) ); ?></strong>
		<?php endif ?>

		<?php
		if ( $form_bottom_content = carbon_get_the_post_meta( 'crb_intro_form_bottom_content' ) ) {
			echo apply_filters( 'the_content', $form_bottom_content );
		}
		?>
	</div><!-- /.section__head-aside -->
</header><!-- /.section__head -->
