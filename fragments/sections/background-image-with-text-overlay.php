<section class="section-image<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__content">
			<?php echo wp_get_attachment_image( $bg_image, 'crb_content_fullwidth' ); ?>

			<div class="section__entry">
				<?php if ( $subhead ) : ?>
					<h6><?php echo nl2br( esc_html( $subhead ) ); ?></h6>
				<?php endif ?>

				<?php if ( $headline ) : ?>
					<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
				<?php endif ?>
			</div><!-- /.section__entry -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-image -->
