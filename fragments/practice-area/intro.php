<?php
$image    = carbon_get_the_post_meta( 'crb_intro_image' );
$headline = carbon_get_the_post_meta( 'crb_intro_headline' );
$subhead  = carbon_get_the_post_meta( 'crb_intro_subhead' );
$content  = carbon_get_the_post_meta( 'crb_intro_content' );
?>

<?php if ( $headline || $subhead ) : ?>
	<section class="section-title section-gray">
		<div class="shell">
			<div class="section__content">
				<?php if ( $headline ) : ?>
					<h1><?php echo nl2br( esc_html( $headline ) ); ?></h1>
				<?php endif ?>

				<?php if ( $subhead ) : ?>
					<h6><?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $subhead ) ) ); ?></h6>
				<?php endif ?>
			</div><!-- /.section__content -->
		</div><!-- /.shell -->
	</section><!-- /.section-title -->
<?php endif ?>

<section class="section-image section-image--alt section-gray">
	<div class="shell">
		<div class="section__image">
			<?php echo wp_get_attachment_image( $image, 'crb_content_fullwidth' ); ?>
		</div><!-- /.section__image -->
	</div><!-- /.shell -->
</section><!-- /.section-image section-image-/-alt -->

<section class="section-text-alt section-dark">
	<div class="shell">
		<div class="section__inner">
			<?php echo crb_content( $content ); ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-text-alt section-dark -->
