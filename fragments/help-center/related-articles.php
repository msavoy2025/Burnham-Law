<?php
$args = array(
	'post_type'      => 'crb_help_center',
	'posts_per_page' => 3,
);

$post_categories = get_the_terms( get_the_ID(), 'crb_hc_category' );
$post_practice_area = get_the_terms( get_the_ID(), 'crb_practice_area_cat' );

if ( $post_categories || $post_practice_area ) {
	$args['tax_query'] = array(
		'relation' => 'OR',
	);

	if ( $post_categories ) {
		$args['tax_query'][] = array(
	        'taxonomy' => 'crb_hc_category',
	        'field'    => 'slug',
	        'terms'    => $post_categories[0]->slug,
		);
	}

	if ( $post_practice_area ) {
		$args['tax_query'][] = array(
	        'taxonomy' => 'crb_practice_area_cat',
	        'field'    => 'slug',
	        'terms'    => $post_practice_area[0]->slug,
		);
	}
}

$articles = new WP_Query( $args );

if ( ! $articles ) {
	return;
}
?>

<div class="section__body">
	<div class="articles">
		<ul class="articles__items">
			<?php
			while ( $articles->have_posts() ) : $articles->the_post();
				crb_render_fragment( 'single-help-center-article' );
			endwhile;

			wp_reset_postdata();
			?>
		</ul>
	</div><!-- /.articles -->
</div><!-- /.section__body -->
