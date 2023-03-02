<?php
$listing_img = carbon_get_the_post_meta( 'crb_listing_img' );
$themeoption_listing_img = carbon_get_theme_option( 'crb_new_listing_img' );

// $current_url = add_query_arg( array(
// 	'practice-area' => $current_practice_area,
// 	'category'      => $current_category,
// ), get_the_permalink() );

$practice_areas = get_terms( array(
	'taxonomy'   => 'crb_practice_area_cat',
	'hide_empty' => true,
) );

$categories = get_terms( array(
	'taxonomy'   => 'crb_hc_category',
	'hide_empty' => true,
) );
?>

<li>
	<div class="article-item">
		<a href="<?php the_permalink(); ?>"></a>

		<span class="article__bg" style="background-image: url(<?php echo wp_get_attachment_image_url( $themeoption_listing_img, 'crb_new_listing_img' ); ?>);"></span>

		<div class="article__inner">
			<div class="article__title">
				<?php if ( $terms = get_the_terms( get_the_ID(), 'crb_hc_category' ) ) :
					$icon = carbon_get_term_meta( $terms[0]->term_id, 'crb_icon' );
					?>

					<h6>
						<?php echo wp_get_attachment_image( $icon, 'crb_icon_small' ); ?>

						<span><?php echo esc_html( $terms[0]->name ); ?></span>
					</h6>
				<?php endif; ?>

				<h2><?php the_title(); ?></h2>
			</div><!-- /.article__title -->

			<?php $author_id = get_the_author_meta( 'ID' ); ?>

<!-- OLD CODE FOR AUTHOR -->
			<?php if ( $member_id = carbon_get_user_meta( $author_id, 'crb_member' ) ) : ?>
				<!--<div class="article__author">
					<p><?php echo __( 'By', 'crb' ) . ' – ' . get_the_title( $member_id[0]['id'] ); ?></p>
				</div>--><!-- /.article__author -->
			<?php endif ?>

<!-- NEW CODE FOR PRACTICE AREA CATEGORY -->
			<div class="article__author">
				<?php if ( $practice = get_the_terms( get_the_ID(), 'crb_practice_area_cat' ) ) : ?>
						<p><?php echo esc_html( $practice[0]->name ); ?></p>
				<?php endif; ?>
			</div><!-- /.article__author -->
		</div><!-- /.article__inner -->
	</div><!-- /.article -->
</li>

<?php
