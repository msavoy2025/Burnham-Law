<section class="section-bottom section-bottom--alt section-gray">
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
		<div class="shell shell--small">
			<div class="section__image">
				<?php echo wp_get_attachment_image( $image, 'crb_content_img' ); ?>
			</div><!-- /.section__image -->
		</div><!-- /.shell shell-/-small -->
	</div><!-- /.section__body -->
</section><!-- /.section-bottom -->
