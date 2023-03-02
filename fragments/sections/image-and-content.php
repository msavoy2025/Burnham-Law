<section class="section-callout-image section-callout-image--lg section-callout-image--alt section-gray">
	<div class="shell">
		<div class="section__container">
			<?php if ( $top_text ) : ?>
				<header class="section__head">
					<h6><?php echo esc_html( $top_text ); ?></h6>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__inner">
				<div class="section__aside section__aside--left">
					<p><?php echo esc_html( $left_text ); ?></p>
				</div><!-- /.section__aside section__aside-left -->

				<div class="section__content">
					<div class="section__image">
						<?php echo wp_get_attachment_image( $image, 'crb_content_fullwidth' ); ?>
					</div><!-- /.section__image -->

					<div class="section__tile">
						<?php echo crb_content( $content ); ?>

						<?php if ( $btn_label && $btn_url ) : ?>
							<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" <?php echo $btn_type === 'download' ? $btn_type : ''; ?> target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
						<?php endif ?>
					</div><!-- /.section__tile -->
				</div><!-- /.section__content -->

				<div class="section__aside section__aside--right">
					<p><?php echo esc_html( $right_text ); ?></p>
				</div><!-- /.section__aside section__aside-right -->
			</div><!-- /.section__inner -->
		</div><!-- /.section__container -->
	</div><!-- /.shell -->
</section><!-- /.section-callout-image -->
