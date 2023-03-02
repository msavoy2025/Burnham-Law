<?php
/**
 * Template Name: Seo Page
 */
get_header();
?>

<section class="section-seo section-gray">
	<div class="shell">
		<?php crb_render_fragment( 'seo/intro' ); ?>

		<?php if ( $content = carbon_get_the_post_meta( 'crb_content' ) ) : ?>
			<div class="section__body">
				<div class="section__inner">
					<?php foreach ( $content as $key => $content_item ) : ?>
						<div class="section__group">
							<div class="section__content">
								<?php echo apply_filters( 'the_content', $content_item['content'] ); ?>
							</div><!-- /.section__content -->

							<?php if ( $content_item['side_testimonial'] ) : ?>
								<div class="section__testimonial<?php echo ( $key + 1 ) % 2 === 0 ? ' section__testimonial--right' : ''; ?>">
									<div class="testimonial<?php echo ( $key + 1 ) % 2 === 0 ? ' testimonial--right' : ''; ?>">
										<div class="testimonial__head">
											<?php if (
												! empty( $content_item['author'] )
												|| $content_item['practice_area'] !== 0
											) : ?>
												<div class="testimonial__author">
													<?php if ( ! empty( $content_item['author'] ) ) : ?>
														<h6><?php echo esc_html( $content_item['author'] ); ?></h6>
													<?php endif ?>

													<?php if ( $content_item['practice_area'] !== 0 ) : ?>
														<span><?php echo get_term( $content_item['practice_area'] )->name; ?></span>
													<?php endif ?>
												</div><!-- /.testimonial__author -->
											<?php endif ?>

											<div class="testimonial__rating">
												<ul style="width: 100%;">
													<?php for ( $i = $content_item['raiting'];  $i >= 1;  $i-- ) : ?>
														<li>
															<i class="ico-star"></i>
														</li>
													<?php endfor; ?>
												</ul>
											</div><!-- /.testimonial__rating -->
										</div><!-- /.testimonial__head -->

										<div class="testimonial__body">
											<blockquote><?php echo nl2br( esc_html( $content_item['quote'] ) ); ?></blockquote>
										</div><!-- /.testimonial__body -->
									</div><!-- /.testimonial -->
								</div><!-- /.section__testimonial -->
							<?php endif ?>
						</div><!-- /.section__group -->
					<?php endforeach ?>
				</div><!-- /.section__inner -->
			</div><!-- /.section__body -->
		<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-seo -->

<?php
crb_render_fragment( 'cta' );

get_footer();
