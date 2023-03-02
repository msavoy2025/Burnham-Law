<div class="article__bottom">
	<p><?php _e( 'This article was authored by...', 'crb' ); ?></p>

	<div class="article__author">
		<?php
		if ( ! $img_id = carbon_get_user_meta( $author_id, 'crb_image' ) ) {
			$img_id = get_the_post_thumbnail_id( $member_id, 'crb_author_img' );
		}
		?>

		<?php if ( $img_id ) : ?>
			<div class="article__author-image">
				<span class="image-fit">
					<?php echo wp_get_attachment_image( $img_id, 'crb_author_img' ); ?>
				</span>
			</div><!-- /.article__author-image -->
		<?php endif ?>

		<div class="article__author-content">
			<div class="article__author-title">
				<h5><?php echo get_the_title( $member_id ); ?></h5>

				<?php if ( $position = carbon_get_post_meta( $member_id, 'crb_position' ) ) : ?>
					<h6><?php echo esc_html( $position ); ?></h6>
				<?php endif ?>
			</div><!-- /.article__author-title -->

			<a href="<?php the_permalink( $member_id ); ?>" class="link">
				<span><?php _e( 'View Profile', 'crb' ); ?></span>

				<i class="ico-arrow-right"></i>
			</a>
		</div><!-- /.article__author-content -->
	</div><!-- /.article__author -->
</div><!-- /.article__bottom -->
