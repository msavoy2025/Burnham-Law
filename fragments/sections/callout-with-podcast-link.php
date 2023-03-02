<section class="section-callout-podcast<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="callout-podcast">
			<div class="callout__inner">
				<div class="callout__content">
					<div class="callout__entry">
						<h2><?php echo esc_html( $headline ); ?></h2>

						<?php if ( $content ) : ?>
							<p><?php echo nl2br( esc_html( $content ) ); ?></p>
						<?php endif ?>
					</div><!-- /.callout__entry -->

					<?php if ( ( $btn_large_text || $btn_small_text ) && $btn_url ) : ?>
						<div class="callout__actions">
							<a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_target; ?>">
								<?php if ( $btn_large_text ) : ?>
									<strong><?php echo esc_html( $btn_large_text ); ?></strong>
								<?php endif ?>

								<?php if ( $btn_small_text ) : ?>
									<span><?php echo esc_html( $btn_small_text ); ?></span>
								<?php endif ?>
							</a>
						</div><!-- /.callout__actions -->
					<?php endif ?>
				</div><!-- /.callout__content -->

				<div class="callout__image">
					<span class="image-fit">
						<?php echo wp_get_attachment_image( $image, 'crb_callout_img' ); ?>
					</span>
				</div><!-- /.callout__image -->
			</div><!-- /.callout__inner -->
		</div><!-- /.callout-podcast -->
	</div><!-- /.shell -->
</section><!-- /.section-callout-podcast -->
