<section class="section-articles section-gray">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $headline || $content ) : ?>
				<header class="section__head">
					<?php if ( $headline ) : ?>
						<h2><?php echo esc_html( $headline ); ?></h2>
					<?php endif ?>

					<?php if ( $content ) : ?>
						<p><?php echo crb_content( $content ); ?></p>
					<?php endif ?>
				</header><!-- /.section__head -->
			<?php endif;

			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
			);

			if ( $selected_cat ) {
				$args['category'] = $selected_cat[0]['id'];
			}

			$posts = get_posts( $args );

			if ( ! empty( $posts ) ) : ?>
				<div class="section__body">
					<div class="news">
						<ol>
							<?php foreach ( $posts as $post_obj ) : ?>
								<li>
									<div class="news-article">
										<a href="<?php the_permalink( $post_obj->ID ); ?>"></a>

										<div class="news__content">
											<?php if ( $categories = get_the_category( $post_obj->ID ) ) :
												$cat_names = array_column( $categories, 'name' );
												?>

												<h6><?php echo esc_html( implode( ', ', $cat_names ) ); ?></h6>
											<?php endif ?>

											<h5><?php echo get_the_title( $post_obj->ID ); ?></h5>

											<p><?php echo __( 'Posted', 'crb' ) . ' – ' . get_the_time('F d, Y', $post_obj->ID); ?></p>
										</div><!-- /.news__content -->
									</div><!-- /.news-article -->
								</li>
							<?php endforeach ?>
						</ol>
					</div><!-- /.news -->
				</div><!-- /.section__body -->
			<?php endif ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-articles -->
