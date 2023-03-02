<section class="section-image-slider<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<?php if ( $headline || $subhead ) : ?>
			<header class="section__head">
				<?php if ( $subhead ) : ?>
					<h6><?php echo esc_html( $subhead ); ?></h6>
				<?php endif ?>

				<?php if ( $headline ) : ?>
					<h2><?php echo esc_html( $headline ); ?></h2>
				<?php endif ?>
			</header><!-- /.section__head -->
		<?php endif ?>

		<div class="section__body">
			<div class="slider-images-holder">
				<div class="slider slider--images">
					<div class="slider__clip swiper-container">
						<div class="slider__slides swiper-wrapper">
							<?php foreach ( $slides as $img_id ) : ?>
								<div class="slider__slide swiper-slide">
									<span class="image-fit">
										<?php echo wp_get_attachment_image( $img_id, 'crb_slider_img' ); ?>
									</span>
								</div><!-- /.slider__slide swiper-slide -->
							<?php endforeach ?>
						</div><!-- /.slider__slides swiper-wrapper -->
					</div><!-- /.slider__clip swiper-container -->

					<div class="slider__actions">
						<div class="swiper-button-prev">
							<span><?php _e( 'Previous Image', 'crb' ); ?></span>
						</div>

						<div class="swiper-button-next">
							<span><?php _e( 'Next Image', 'crb' ); ?></span>
						</div>
					</div><!-- /.slider__actions -->
				</div><!-- /.slider slider-/-images -->

				<div class="slider slider--thumbs">
					<div class="slider__clip swiper-container">
						<div class="slider__slides swiper-wrapper">
							<?php foreach ( $slides as $img_id ) : ?>
								<div class="slider__slide swiper-slide">
									<span class="image-fit">
										<?php echo wp_get_attachment_image( $img_id, 'crb_slider_img' ); ?>
									</span>
								</div><!-- /.slider__slide swiper-slide -->
							<?php endforeach ?>
						</div><!-- /.slider__slides swiper-wrapper -->
					</div><!-- /.slider__clip swiper-container -->
				</div><!-- /.slider slider-/-thumbs -->
			</div><!-- /.slider-images-holder -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-image-slider -->
