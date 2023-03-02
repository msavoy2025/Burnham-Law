<section class="section-tile<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $subhead ) : ?>
				<header class="section__head">
					<h6><?php echo esc_html( $subhead ); ?></h6>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__body">
				<div class="tile">
					<div class="tile__image">
						<span>
							<?php echo wp_get_attachment_image( $image, 'crb_article' ); ?>
						</span>
					</div><!-- /.tile__image -->

					<div class="tile__content">
						<?php if ( $headline ) : ?>
							<h2><?php echo esc_html( $headline ); ?></h2>
						<?php endif ?>

						<?php if ( $content ) : ?>
							<p><?php echo nl2br( esc_html( $content ) ); ?></p>
						<?php endif ?>

						<?php if ( $btn_label && $btn_url ) : ?>
							<a href="<?php echo esc_url( $btn_url ); ?>" <?php echo $btn_type === 'download' ? $btn_type : ''; ?> class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
						<?php endif ?>
					</div><!-- /.tile__content -->
				</div><!-- /.tile -->
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-tile -->
