<?php
get_header();
the_post();

$checkbox_related = carbon_get_the_post_meta('crb_checkbox_related_articles');

?>

<section class="section-article-single">
	<div class="shell">
		<div class="article-single-alt">
			<div class="article__image">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'crb_help_center_img' );
				} else {
					$fallback_img = carbon_get_theme_option( 'crb_hc_fallback_img' );
					echo wp_get_attachment_image( $fallback_img, 'crb_help_center_img' );
				}
				?>

				<h1><?php the_title(); ?></h1>
			</div><!-- /.article__image -->

			<div class="article__meta">
				<?php if ( $terms = get_the_terms( get_the_ID(), 'crb_hc_category' ) ) :
					$icon = carbon_get_term_meta( $terms[0]->term_id, 'crb_icon' );
					?>

					<div class="article__category">
						<p>
							<?php echo wp_get_attachment_image( $icon, 'crb_icon_small' ); ?>

							<span><?php echo esc_html( $terms[0]->name ); ?></span>
						</p>
					</div><!-- /.article__category -->
				<?php endif;

				$author_id = get_the_author_meta( 'ID' );
				// OLD CODE FOR AUTHOR ID
				if ( $member_id = carbon_get_user_meta( $author_id, 'crb_member' ) ) : ?>
					<!--<p><?php echo __( 'By', 'crb' ) . ' – ' . get_the_title( $member_id[0]['id'] ); ?></p>-->
				<?php endif ?>
				<!-- NEW CODE FOR CATEGORY ID -->
				<?php if ( $practice_areas = get_the_terms( get_the_ID(), 'crb_practice_area_cat' ) ) : ?>
					<p><?php echo esc_html( $practice_areas[0]->name ); ?></p>
				<?php endif; ?>

				<div class="article__date">
					<p><?php the_time( 'F d, Y' ); ?></p>
				</div><!-- /.article__date -->
			</div><!-- /.article__meta -->

			<div class="article__body">
				<?php the_content(); ?>
			</div><!-- /.article__body -->

			<?php
			if ( carbon_get_the_post_meta( 'crb_overwrite_cta' ) ) {
				crb_render_fragment( 'help_center_cta_custom' );
			} else {
				crb_render_fragment( 'help_center_cta', array(
					'practice_area_id' => $practice_areas[0]->term_id,
				) );
			}

			crb_render_fragment( 'share-links' );
			?>
		</div><!-- /.article-single -->
	</div><!-- /.shell -->
</section><!-- /.section-article-single -->

<?php if ( empty( $checkbox_related ) ) { ?>
<section class="section-related">
	<div class="shell">
		<?php crb_render_fragment( 'help-center/related-articles' ); ?>

		<?php if ( $page_referer = wp_get_referer() ) : ?>
			<?php if ( parse_url( $page_referer )['host'] === parse_url( get_the_permalink() )['host'] ) : ?>
				<div class="section__actions">
					<a href="<?php echo esc_url( $page_referer ); ?>" class="link link--rev">
						<i class="ico-arrow-left"></i>

						<span><?php _e( 'Go Back To The Previous Page', 'crb' ); ?></span>
					</a>
				</div><!-- /.section__actions -->
			<?php endif ?>
		<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-related -->
<?php } else {} ?>
<?php
get_footer();
