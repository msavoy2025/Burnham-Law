<section class="section-callout-image section-callout-image--lg<?php echo $data['bg_color'] === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__container">
			<div class="section__inner">
				<div class="section__aside section__aside--left">
					<p><?php echo esc_html( $data['left_text'] ); ?></p>
				</div><!-- /.section__aside section__aside-left -->

				<div class="section__content">
					<div class="section__image">
						<?php echo wp_get_attachment_image( $data['image'], 'crb_img_with_overlay' ); ?>
					</div><!-- /.section__image -->

					<div class="section__entry">
						<h6 class="section__top"><?php echo esc_html( $data['top_text'] ); ?></h6>

						<h2><?php echo nl2br( esc_html( $data['headline'] ) ); ?></h2>

						<div class="section__bottom">
							<div class="section__text">
								<h6><?php echo nl2br( esc_html( $data['bottom_headline'] ) ); ?></h6>

								<p><?php echo nl2br( esc_html( $data['bottom_content'] ) ); ?></p>
							</div><!-- /.section__text -->
						</div><!-- /.section__bottom -->
					</div><!-- /.section__entry -->
				</div><!-- /.section__content -->

				<div class="section__aside section__aside--right">
					<p><?php echo esc_html( $data['right_text'] ); ?></p>
				</div><!-- /.section__aside section__aside-right -->
			</div><!-- /.section__inner -->
		</div><!-- /.section__container -->
	</div><!-- /.shell -->
</section><!-- /.section-callout-image -->
