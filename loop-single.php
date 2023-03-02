<?php while ( have_posts() ) : the_post(); ?>
	<section class="section-article-single">
		<div class="shell">
			<div class="article-single-alt article-single--news">
				<div class="article__head">
					<div class="article__title">
						<div class="article__entry">
							<h1><?php the_title(); ?></h1>

							<div class="article__date">
								<p><?php echo __( 'Posted', 'crb' ) . ' – ' . get_the_time( 'F d, Y' ); ?></p>
							</div><!-- /.article__date -->
						</div><!-- /.article__entry -->
					</div><!-- /.article__title -->

					<div class="article__image">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'crb_post_large_img' );
						} else {
							$fallback_img = carbon_get_theme_option( 'crb_post_fallback_img' );

							echo wp_get_attachment_image( $fallback_img, 'crb_post_large_img' );
						}
						?>
					</div><!-- /.article__image -->
				</div><!-- /.article__head -->

				<div class="article__body">
					<?php the_content(); ?>
				</div><!-- /.article__body -->

				<?php crb_render_fragment( 'share-links' );	?>
			</div><!-- /.article-single -->
		</div><!-- /.shell -->
	</section><!-- /.section-article-single -->

	<?php crb_render_fragment( 'related-blog-posts' ); ?>
<?php endwhile; ?>
