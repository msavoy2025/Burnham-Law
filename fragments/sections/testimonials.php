<section class="section-stories<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<header class="section__head">
				<?php if ( $headline ) : ?>
					<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
				<?php endif ?>

				<?php if ( $subhead ) : ?>
					<h6><?php echo nl2br( esc_html( $subhead ) ); ?></h6>
				<?php endif ?>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div class="stories">
					<ul>
						<?php foreach ( $testimonials as $testimonial ) : ?>
							<li>
								<div class="story">
									<div class="story__title">
										<h6>
											<?php echo esc_html( $testimonial['person'] ); ?>

											<?php if ( ! empty( $testimonial['details'] ) ) : ?>
												<strong><?php echo esc_html( $testimonial['details'] ); ?></strong>
											<?php endif ?>
										</h6>
									</div><!-- /.story__title -->

									<div class="story__content">
										<p><?php echo nl2br( esc_html( $testimonial['quote'] ) ); ?></p>
									</div><!-- /.story__content -->
								</div><!-- /.story -->
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.stories -->
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-stories -->
