<?php get_header(); ?>

<section class="section-default">
	<div class="shell">
		<div class="section__inner">
			<?php while ( have_posts() ) : the_post(); ?>
				<div <?php post_class( 'section__content' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="section__image">
							<?php the_post_thumbnail(); ?>
						</div><!-- /.section__image -->
					<?php endif; ?>

					<?php crb_the_title( '<h2 class="section__title">', '</h2>' ); ?>

					<div class="section__body richtext-entry">
						<?php
						the_content();

						edit_post_link( __( 'Edit this entry.', 'crb' ), '<p>', '</p>' );
						?>
					</div><!-- /.section__body -->
				<?php endwhile; ?>
			</div><!-- /.section__content -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->

<?php get_footer(); ?>
