<?php
$args = array(
	'post_type'      => 'crb_team',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC',
);

if ( $selected_specialty_slug = crb_request_param( 'specialty' ) ) {
    $args['tax_query'] = array(
        array (
			'taxonomy' => 'crb_specialty',
			'field'    => 'slug',
			'terms'    => esc_sql( $selected_specialty_slug ),
        )
    );
}

$members = new WP_Query( $args );

if ( ! $members->have_posts() ) {
	return;
}
?>

<div class="section__body">
	<div class="team-members">
		<ul class="posts-holder">
			<?php while ( $members->have_posts() ) : $members->the_post(); ?>
				<?php
				crb_render_fragment( 'single-member', array(
					'member_id' => get_the_ID(),
				) );
				?>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
		</ul>
	</div><!-- /.team-members -->
</div><!-- /.section__body -->
