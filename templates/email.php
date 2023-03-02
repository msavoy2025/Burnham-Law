<?php
/**
 * Template Name: Email Signatures
 */
 ?>
 <?php get_header(); ?>
 <div class="emailSignature shell">
 <?php
	 $email = new WP_Query(array(
		 'posts_per_page' => -1,
		 'post_type' => 'crb_email'
		 ));

	 while($email->have_posts()) {
		 $email->the_post(); ?>
		 <div class="EmailBox">
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
			<div class="eventImage eventImageSlide" style="background-image:url(<?php echo $url ?>);"></div>
			<h4 class="eventTitle"><?php the_title(); ?></h4>
			<a href="<?php the_permalink(); ?>">My Email Signature</a>
		 </div>

 <?php } ?>
</div><!-- shell close -->
 <?php get_footer(); ?>
