<?php
$args = array(
	'post_type'      => 'crb_team',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'meta_query'     => array(
		array(
			'key'     => '_crb_location',
			'value'   => get_the_ID(),
			'compare' => '='
		)
	),
);

$selected_specialty = get_term_by( 'id', $specialty[0]['id'], 'crb_specialty' );
if ( $selected_specialty ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'crb_specialty',
			'field'    => 'slug',
			'terms'    => $selected_specialty->slug
		)
	);
}

$members = new WP_Query( $args );

if ( ! $members->have_posts() ) {
	return;
}
?>

<section class="section-team-members section-team-members--new<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $headline ) : ?>
				<header class="section__head">
					<h2><?php echo esc_html( $headline ); ?></h2>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__body">
				<div class="team-members">
					<ul>
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
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-team-members -->
