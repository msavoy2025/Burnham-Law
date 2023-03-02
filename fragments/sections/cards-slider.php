<section class="section-slider<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $first_headline || $second_headline ) : ?>
				<header class="section__head">
					<?php if ( $first_headline ) : ?>
						<h2><?php echo esc_html( $first_headline ); ?></h2>
					<?php endif ?>

					<?php if ( $second_headline ) : ?>
						<h2><?php echo esc_html( $second_headline ); ?></h2>
					<?php endif ?>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__body">
				<aside class="section__aside">
					<?php echo crb_content( $side_content ); ?>
				</aside><!-- /.section__aside -->

				<div class="section__content">
					<div class="slider slider--articles">
						<div class="slider__clip swiper-container">
							<div class="slider__slides swiper-wrapper">
								<?php foreach ( $cards as $card ) : ?>
									<div class="slider__slide swiper-slide">
										<div class="article-item article-item--alt">
											<div class="article__inner">
												<div class="article__title">
													<h2>
														<a href="<?php the_permalink( $card['id'] ); ?>"><?php echo get_the_title( $card['id'] ); ?></a>
													</h2>
												</div><!-- /.article__title -->

												<div class="article__content">
													<p><?php echo crb_get_post_excerpt( $card['id'], 16 ); ?></p>

													<?php if ( $terms = get_the_terms( $card['id'], 'crb_hc_category' ) ) : ?>
														<span class="link link--alt">
															<a href="<?php echo get_term_link( $terms[0], 'crb_hc_category' ); ?>" class="article-link"><?php echo __( 'View Articles on ', 'crb' ) . esc_html( $terms[0]->name ); ?></a>

															<i class="ico-arrow-right"></i>
														</span>
													<?php endif ?>
												</div><!-- /.article__content -->
											</div><!-- /.article__inner -->
										</div><!-- /.article-item -->
									</div><!-- /.slider__slide swiper-slide -->
								<?php endforeach ?>
							</div><!-- /.slider__slides swiper-wrapper -->
						</div><!-- /.slider__clip swiper-container -->

						<div class="slider__actions">
							<div class="swiper-button-prev"></div>

							<?php if ( $help_text ) : ?>
								<span><?php echo esc_html( $help_text ); ?></span>
							<?php endif ?>

							<div class="swiper-button-next"></div>
						</div><!-- /.slider__actions -->

						<div class="slider__pagination">
							<div class="swiper-pagination"></div><!-- /.swiper-pagination -->

							 <p>
							 	<span>—</span> <strong></strong>
							 </p>
						</div><!-- /.slider__pagination -->
					</div><!-- /.slider slider-/-articles -->
				</div><!-- /.section__content -->
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-slider -->
