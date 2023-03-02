<section class="section-tile-alt<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<div class="section__entry">
				<?php echo crb_content( $content ); ?>

				<?php if ( $file && $btn_label ) :
					$file_url = wp_get_attachment_url( $file );
					?>

					<a href="<?php echo esc_url( $file_url ); ?>" class="btn" download><?php echo esc_html( $btn_label ); ?></a>
				<?php endif ?>
			</div><!-- /.section__entry -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-tile -->
