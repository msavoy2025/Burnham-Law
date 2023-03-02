<?php
$featured_cats = carbon_get_theme_option( 'crb_blog_featured_categories' );
$fallback_img = carbon_get_theme_option( 'crb_post_fallback_img' );
?>

<div class="news-featured grid">
	<div class="grid__row">
		<?php foreach ( $featured_cats as $featured_cat ) :
			$recent_posts = wp_get_recent_posts( array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
				'cat'            => $featured_cat['id'],
			) );

			if ( empty( $recent_posts ) ) {
				continue;
			}
			?>

			<div class="grid__col grid__col--1of3">
				<h6><?php echo esc_html( get_cat_name( $featured_cat['id'] ) ); ?></h6>

				<?php foreach ( $recent_posts as $recent_post ) : ?>
					<div class="news-item">
						<a href="<?php the_permalink( $recent_post['ID'] ); ?>"></a>

						<div class="news-item__image">
							<span class="image-fit">
								<?php
								if ( has_post_thumbnail( $recent_post['ID'] ) ) {
									echo get_the_post_thumbnail( $recent_post['ID'], 'crb_post_img' );
								} else {
									echo wp_get_attachment_image( $fallback_img, 'crb_post_img' );
								}
								?>
							</span>
						</div><!-- /.news-item__image -->

						<div class="news-item__content">
							<h4><?php echo get_the_title( $recent_post['ID'] ); ?></h4>

							<p><?php echo __( 'Posted', 'crb' ) . ' – ' . get_the_time( 'F d, Y', $recent_post['ID'] ); ?></p>
						</div><!-- /.news-item__content -->
					</div><!-- /.news-item -->
				<?php endforeach ?>
			</div><!-- /.grid__col grid__col-/-1of3 -->
		<?php endforeach ?>
	</div><!-- /.grid__row -->
</div><!-- /.news-featured -->
