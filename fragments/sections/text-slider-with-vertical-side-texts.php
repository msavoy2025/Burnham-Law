<section class="section-tile-content<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<aside class="section__aside">
				<?php if ( $left_text ) : ?>
					<p><?php echo esc_html( $left_text ); ?></p>
				<?php endif ?>
			</aside><!-- /.section__aside -->

			<div class="section__content">
				<h6><?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $top_text ) ) ); ?></h6>

				<div class="slider-titles js-slider-titles">
					<div class="slider__clip swiper-container">
						<div class="slider__slides swiper-wrapper">
							<?php foreach ( $texts as $text ) : ?>
								<div class="slider__slide swiper-slide">
									<h2><?php echo esc_html( $text['text'] ); ?></h2>
								</div><!-- /.slider__slide -->
							<?php endforeach ?>
						</div><!-- /.slider__slides -->
					</div><!-- /.slider__clip -->
				</div><!-- /.slider -->

				<h6><?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $bottom_text ) ) ); ?></h6>
			</div><!-- /.section__content -->

			<aside class="section__aside section__aside--right">
				<?php if ( $right_text ) : ?>
					<p><?php echo esc_html( $right_text ); ?></p>
				<?php endif ?>
			</aside><!-- /.section__aside -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-tile-content -->
