<?php
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
);

$post_categories = get_the_category();

if ( $post_categories ) {
	$args['cat'] = $post_categories[0]->term_id;
}

$articles = new WP_Query( $args );

if ( ! $articles ) {
	return;
}

$fallback_img = carbon_get_theme_option( 'crb_post_fallback_img' );
?>

<section class="section-related">
	<div class="shell">
		<div class="section__body">
			<div class="news-featured grid">
				<div class="grid__row">
					<?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
						<div class="grid__col grid__col--1of3">
							<div class="news-item">
								<a href="<?php the_permalink(); ?>"></a>

								<div class="news-item__image">
									<span class="image-fit">
										<?php
										if ( has_post_thumbnail( $recent_post['ID'] ) ) {
											the_post_thumbnail( 'crb_post_img' );
										} else {
											echo wp_get_attachment_image( $fallback_img, 'crb_post_img' );
										}
										?>
									</span>
								</div><!-- /.news-item__image -->

								<div class="news-item__content">
									<h4><?php the_title(); ?></h4>

									<p><?php _e( 'Posted', 'crb' ); ?> – <?php echo the_time( 'F d, Y' ); ?></p>
								</div><!-- /.news-item__content -->
							</div><!-- /.news-item -->
						</div><!-- /.grid__col grid__col-/-1of3 -->
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				</div><!-- /.grid__row -->
			</div><!-- /.news-featured -->
		</div><!-- /.section__body -->

		<div class="section__actions">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="link link--rev">
				<i class="ico-arrow-left"></i>

				<span><?php _e( 'Go Back To View All News', 'crb' ); ?></span>
			</a>
		</div><!-- /.section__actions -->
	</div><!-- /.shell -->
</section><!-- /.section-related -->
