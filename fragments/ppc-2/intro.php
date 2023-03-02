<?php
if ( $image    = carbon_get_the_post_meta( 'crb_intro_image' ) ) {
	$bg_style = ' style="background-image: url(' . wp_get_attachment_image_url( $image, 'crb_intro_img_3' ) . ');"';
}

$headline             = carbon_get_the_post_meta( 'crb_intro_headline' );
$form_id              = carbon_get_the_post_meta( 'crb_intro_form' );
$content_image        = carbon_get_the_post_meta( 'crb_intro_content_image' );
$media_type           = carbon_get_the_post_meta( 'crb_intro_media_type' );
$video_url            = carbon_get_the_post_meta( 'crb_intro_video_url' );
$image_video_headline = carbon_get_the_post_meta( 'crb_intro_image_headline' );
$content_img_url      = wp_get_attachment_image_url( $content_image, 'crb_video_img_3' );

$video = Carbon_Video::create( $video_url );
?>

<section class="section-form-callout section-form-callout--alt section-gray">
	<span class="section__bg"<?php echo $bg_style; ?>></span>

	<div class="shell shell--small">
		<div class="section__inner">
			<div class="section__content">
				<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>

				<?php if ( $subhead = carbon_get_the_post_meta( 'crb_intro_subhead' ) ) : ?>
					<h5><?php echo nl2br( esc_html( $subhead ) ); ?></h5>
				<?php endif ?>

				<?php if ( $media_type === 'image' || $video->is_broken() ) : ?>
					<div class="section__video">
						<div id="video-intro" class="video video--alt" style="background-image: url(<?php echo $content_img_url; ?>);">

							<div class="video__sizer"></div><!-- /.video__sizer -->

							<div class="video__content">
								<?php if ( $image_video_headline ) : ?>
									<h5><?php echo nl2br( esc_html( $image_video_headline ) ); ?></h5>
								<?php endif ?>
							</div><!-- /.video__content -->
						</div><!-- /.video -->
					</div><!-- /.section__video -->
				<?php else :
					$video_id = $video->get_id();
					$btn_label = carbon_get_the_post_meta( 'crb_intro_btn_label' );
					?>

					<div class="section__video">
						<div id="video-intro" class="video video--alt video--youtube" data-video-width="640" data-video-height="360" data-video-offset="20" style="background-image: url(<?php echo $content_img_url; ?>);">
							<div class="js-player" id="player-intro" data-plyr-provider="<?php echo crb_get_video_provider( $video_url ); ?>" data-plyr-embed-id="<?php echo esc_html( $video_id ); ?>"></div>

							<div class="video__content">
								<?php if ( $image_video_headline ) : ?>
									<h5><?php echo nl2br( esc_html( $image_video_headline ) ); ?></h5>
								<?php endif ?>

								<button type="button" class="video__play">
									<?php if ( $btn_label ) : ?>
										<span><?php echo esc_html( $btn_label ); ?></span>
									<?php endif ?>
								</button>
							</div><!-- /.video__content -->
						</div><!-- /.video -->
					</div><!-- /.section__video -->
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
