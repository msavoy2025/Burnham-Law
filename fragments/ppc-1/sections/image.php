<section class="section-bottom section-gray">
	<?php if ( $first_headline || $second_headline ) : ?>
		<header class="section__head">
			<div class="shell shell--small">
				<?php if ( $first_headline ) : ?>
					<h2><?php echo nl2br( esc_html( $first_headline ) ); ?></h2>
				<?php endif ?>

				<?php if ( $second_headline ) : ?>
					<h2><?php echo nl2br( esc_html( $second_headline ) ); ?></h2>
				<?php endif ?>
			</div><!-- /.shell shell-/-small -->
		</header><!-- /.section__head -->
	<?php endif ?>

	<div class="section__body">
		<div class="section__image">
			<?php echo wp_get_attachment_image( $image, 'crb_fullwidth' ); ?>
		</div><!-- /.section__image -->

		<?php if ( $bottom_headline || $bottom_content ) : ?>
			<div class="section__text">
				<div class="shell shell--small">
					<div class="section__inner">
						<div class="section__content">
							<?php if ( $bottom_headline ) : ?>
								<h6><?php echo nl2br( esc_html( $bottom_headline ) ); ?></h6>
							<?php endif ?>

							<?php if ( $bottom_content ) : ?>
								<p><?php echo nl2br( esc_html( $bottom_content ) ); ?></p>
							<?php endif ?>
						</div><!-- /.section__content -->
					</div><!-- /.section__inner -->
				</div><!-- /.shell shell-/-small -->
			</div><!-- /.section__text -->
		<?php endif ?>
	</div><!-- /.section__body -->
</section><!-- /.section-bottom -->
