<?php
$video = Carbon_Video::create( $video_url );

if ( $video->is_broken() ) {
	return;
}

$video_id = $video->get_id();
$img_url = wp_get_attachment_image_url( $image, 'crb_video_img' );
?>

<?php if ( $top_text ) : ?>
	<section class="section-video section-video--alt<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
		<div class="shell">
			<header class="section__head">
				<h6><?php echo esc_html( $top_text ); ?></h6>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div id="video<?php echo $section_index; ?>" class="video video--youtube" data-video-width="640" data-video-height="360" data-video-offset="20" style="background-image: url(<?php echo esc_url( $img_url ); ?>);">
					<div class="js-player" id="player-<?php echo $section_index; ?>" data-plyr-provider="<?php echo crb_get_video_provider( $video_url ); ?>" data-plyr-embed-id="<?php echo esc_html( $video_id ); ?>"></div>

					<div class="video__content">
						<?php if ( $headline ) : ?>
							<h2><?php echo esc_html( $headline ); ?></h2>
						<?php endif ?>

						<button type="button" class="video__play">
							<?php if ( $btn_label ) : ?>
								<span><?php echo esc_html( $btn_label ); ?></span>
							<?php endif ?>
						</button>
					</div><!-- /.video__content -->
				</div><!-- /.video -->
			</div><!-- /.section__body -->
		</div><!-- /.shell -->
	</section><!-- /.section-video -->
<?php else : ?>
	<section class="section-video<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
		<div class="shell">
			<div id="video<?php echo $section_index; ?>" class="video video--youtube" data-video-width="640" data-video-height="360" data-video-offset="20" style="background-image: url(<?php echo esc_url( $img_url ); ?>);">
				<div class="js-player" id="player-<?php echo $section_index; ?>" data-plyr-provider="<?php echo crb_get_video_provider( $video_url ); ?>" data-plyr-embed-id="<?php echo esc_html( $video_id ); ?>"></div>

				<div class="video__content">
					<?php if ( $headline ) : ?>
						<h2><?php echo esc_html( $headline ); ?></h2>
					<?php endif ?>

					<button type="button" class="video__play">
						<?php if ( $btn_label ) : ?>
							<span><?php echo esc_html( $btn_label ); ?></span>
						<?php endif ?>
					</button>
				</div><!-- /.video__content -->
			</div><!-- /.video -->
		</div><!-- /.shell -->
	</section><!-- /.section-video -->
<?php endif ?>
