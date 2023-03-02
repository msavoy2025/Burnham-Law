<?php $img_url = wp_get_attachment_image_url( $bg_image, 'crb_video_img_2' ); ?>

<?php if ( $media_type === 'image' ) : ?>
	<section class="section-video section-gray">
		<div class="shell shell--small">
			<div id="video1" class="video" style="background-image: url(<?php echo esc_url( $img_url ); ?>);">

				<div class="video__sizer"></div><!-- /.video__sizer -->

				<?php if ( $headline ) : ?>
					<div class="video__content">
						<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
					</div><!-- /.video__content -->
				<?php endif ?>
			</div><!-- /.video -->
		</div><!-- /.shell shell-/-small -->
	</section><!-- /.section-video -->
<?php else :
	$video = Carbon_Video::create( $video_url );

	if ( $video->is_broken() ) {
		return;
	}

	$video_id = $video->get_id();
	?>
	<section class="section-video section-gray">
		<div class="shell shell--small">
			<div id="video<?php echo $section_index; ?>" class="video video--youtube" data-video-width="640" data-video-height="360" data-video-offset="20" style="background-image: url(<?php echo esc_url( $img_url ); ?>);">
				<div class="js-player" id="player-<?php echo $section_index; ?>" data-plyr-provider="<?php echo crb_get_video_provider( $video_url ); ?>" data-plyr-embed-id="<?php echo esc_html( $video_id ); ?>"></div>

				<div class="video__content">
					<?php if ( $headline ) : ?>
						<h3><?php echo nl2br( esc_html( $headline ) ); ?></h3>
					<?php endif ?>

					<button type="button" class="video__play">
						<?php if ( $btn_label ) : ?>
							<span><?php echo esc_html( $btn_label ); ?></span>
						<?php endif ?>
					</button>
				</div><!-- /.video__content -->
			</div><!-- /.video -->
		</div><!-- /.shell shell-/-small -->
	</section><!-- /.section-video -->
<?php endif ?>
