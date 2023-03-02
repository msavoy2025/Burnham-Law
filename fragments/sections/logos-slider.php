<section class="section-logos section-gray">
	<div class="shell">
		<?php if ( $headline ) : ?>
			<header class="section__head">
				<h2><?php echo esc_html( $headline ); ?></h2>
			</header><!-- /.section__head -->
		<?php endif ?>

		<div class="section__body">
			<div class="slider slider--logos">
				<div class="slider__clip swiper-container">
					<div class="slider__slides swiper-wrapper">
						<?php foreach ( $logos as $logo_id ) : ?>
							<div class="slider__slide swiper-slide">
								<?php echo wp_get_attachment_image( $logo_id, 'crb_logo2' ); ?>
							</div><!-- /.slider__slide swiper-slide -->
						<?php endforeach ?>
					</div><!-- /.slider__slides swiper-wrapper -->
				</div><!-- /.slider__clip swiper-container -->

				<div class="slider__actions">
					<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->

					<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
				</div><!-- /.slider__actions -->
			</div><!-- /.slider slider-/-logos -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-logos -->
