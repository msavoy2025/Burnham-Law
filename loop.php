<section class="section-news">
	<div class="shell">
		<?php if ( crb_is_blog() ) : ?>
			<?php $top_content = carbon_get_theme_option( 'crb_blog_top_content' ); ?>

			<header class="section__head">
				<?php echo crb_content( $top_content ); ?>
			</header><!-- /.section__head -->
		<?php else : ?>
			<header class="section__head">
				<?php
				crb_the_title( '<h1 class="section__title">', '</h1>' );

				if ( is_search() ) {
					get_search_form();
				}
				?>
			</header><!-- /.section__head -->
		<?php endif ?>

		<div class="section__body">
			<?php
			if ( crb_is_blog() ) {
				crb_render_fragment( 'blog-featured-posts' );
			}
			?>

			<div class="news">
				<?php if ( have_posts() ) : ?>
					<ol class="posts-holder">
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<div class="news-article">
									<a href="<?php the_permalink(); ?>"></a>

									<div class="news__content">
										<?php if ( $cats = get_the_category() ) :
											$cats_str = implode( ', ', array_column( $cats, 'name' ) );
											?>

											<h6><?php echo esc_html( $cats_str ); ?></h6>
										<?php endif ?>

										<h5><?php the_title(); ?></h5>

										<p><?php _e( 'Posted', 'crb' ); ?> – <?php echo the_time( 'F d, Y' ); ?></p>
									</div><!-- /.news__content -->
								</div><!-- /.news-article -->
							</li>
						<?php endwhile; ?>
					</ol>

					<?php
					carbon_pagination( 'posts', [
						'enable_prev' => false,
						'next_html'   => '<a href="{URL}" class="js-load-more"></a>',
					] );
					?>
				<?php elseif ( wp_count_posts( 'post' )->publish <= 4 ) : ?>

				<?php else : ?>
					<ol class="articles articles--alt">
						<li class="articles__item">
							<div class="article article--error404 article--not-found">
								<div class="article__body">
									<div class="article__entry richtext-entry">
										<p>
											<?php
											if ( is_category() ) { // If this is a category archive
												printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'crb' ), single_cat_title( '', false ) );
											} else if ( is_date() ) { // If this is a date archive
												_e( "Sorry, but there aren't any posts with this date.", 'crb' );
											} else if ( is_author() ) { // If this is a category archive
												$userdata = get_user_by( 'id', get_queried_object_id() );
												printf( __( "Sorry, but there aren't any posts by %s yet.", 'crb' ), $userdata->display_name );
											} else if ( is_search() ) { // If this is a search
												_e( 'No posts found. Try a different search?', 'crb' );
											} else {
												_e( 'No posts found.', 'crb' );
											}
											?>
										</p>
									</div><!-- /.article__entry -->
								</div><!-- /.article__body -->
							</div><!-- /.article -->
						</li>
					</ol>
				<?php endif; ?>

				<div class="news__actions">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/spinner.svg" class="js-spinner" alt="" />
				</div><!-- /.news__actions -->
			</div><!-- /.news -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-news -->
