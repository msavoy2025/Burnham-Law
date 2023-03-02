<section class="section-testimonials section-gray">
	<div class="shell shell--small">
		<div class="testimonials">
			<ul>
				<?php foreach ( $testimonials as $testimonial ) : ?>
					<li>
						<div class="testimonial testimonial--alt">
							<div class="testimonial__head">
								<?php if (
									! empty( $testimonial['author'] )
									|| $testimonial['practice_area'] !== 0
								) : ?>
									<div class="testimonial__author">
										<?php if ( ! empty( $testimonial['author'] ) ) : ?>
											<h6><?php echo esc_html( $testimonial['author'] ); ?></h6>
										<?php endif ?>

										<?php if ( $testimonial['practice_area'] !== 0 ) : ?>
											<span><?php echo get_term( $testimonial['practice_area'] )->name; ?></span>
										<?php endif ?>
									</div><!-- /.testimonial__author -->
								<?php endif ?>

								<div class="testimonial__rating">
									<ul style="width: 100%;">
										<?php for ( $i = $testimonial['raiting'];  $i >= 1;  $i-- ) : ?>
											<li>
												<i class="ico-star"></i>
											</li>
										<?php endfor; ?>
									</ul>
								</div><!-- /.testimonial__rating -->
							</div><!-- /.testimonial__head -->

							<div class="testimonial__body">
								<blockquote><?php echo nl2br( esc_html( $testimonial['quote'] ) ); ?></blockquote>
							</div><!-- /.testimonial__body -->
						</div><!-- /.testimonial -->
					</li>
				<?php endforeach ?>
			</ul>
		</div><!-- /.testimonials -->
	</div><!-- /.shell shell-/-small -->
</section><!-- /.section-testimonials -->
