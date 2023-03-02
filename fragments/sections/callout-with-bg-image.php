<section class="section-callout<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="callout">
			<div class="callout__content">
				<?php if ( $subhead ) : ?>
					<h6><?php echo esc_html( $subhead ); ?></h6>
				<?php endif ?>

				<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>

				<?php if ( $btn_label && $btn_url ) : ?>
					<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
				<?php endif ?>
			</div><!-- /.callout__content -->

			<div class="callout__image">
				<span class="image-fit">
					<?php echo wp_get_attachment_image( $image, 'crb_callout_img2' ); ?>
				</span>
			</div><!-- /.callout__image -->
		</div><!-- /.callout -->
	</div><!-- /.shell -->
</section><!-- /.section-callout -->
