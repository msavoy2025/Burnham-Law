<?php
/**
 * Template Name: Help Center
 */
get_header();

crb_render_fragment( 'help-center/search-form' );
?>

<section class="section-help-center">
	<div class="shell">
		<?php
		$current_category      = crb_request_param( 'category' ) ? crb_request_param( 'category' ) : 'all';
		$current_practice_area = crb_request_param( 'practice-area' ) ? crb_request_param( 'practice-area' ) : 'all';
		$paged                 = get_query_var('paged') ? get_query_var('paged') : 1;

		crb_render_fragment( 'help-center/filters', array(
			'current_category'      => $current_category,
			'current_practice_area' => $current_practice_area,
		) );

		$args = array(
			'post_type'      => 'crb_help_center',
			'posts_per_page' => 3,
			'paged'          => $paged,
		);

		if ( $search_val = crb_request_param( 'search' ) ) {
			$args['s'] = esc_sql( $search_val );
		}

		if ( $current_category != 'all' ) {
			$args['tax_query'][] = array(
		        'taxonomy' => 'crb_hc_category',
		        'field'    => 'slug',
		        'terms'    => esc_sql( $current_category ),
			);
		}

		if ( $current_practice_area != 'all' ) {
			$args['tax_query'][] = array(
		        'taxonomy' => 'crb_practice_area_cat',
		        'field'    => 'slug',
		        'terms'    => esc_sql( $current_practice_area ),
			);
		}

		$articles = new WP_Query( $args );
		?>

		<div class="section__body">
			<div class="articles">
				<ul class="articles__items posts-holder">
					<?php if ( $articles->have_posts() ) :
						while ( $articles->have_posts() ) : $articles->the_post();
							crb_render_fragment( 'single-help-center-article' );
						endwhile;

						wp_reset_postdata();
					else :
						$no_results_text = carbon_get_the_post_meta( 'crb_no_results_text' ); ?>

						<li class="no-results">
							<h4><?php echo esc_html( $no_results_text ); ?></h4>
						</li>
					<?php endif ?>
				</ul>

				<div class="load-spinner">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/spinner.svg" class="js-spinner" alt="<?php _e( 'Spinner Image', 'crb' ); ?>"/>
				</div>
			</div><!-- /.articles -->
		</div><!-- /.section__body -->

		<div class="paging">
			<?php
			carbon_pagination( 'posts', array(
				'wrapper_before' => '',
				'wrapper_after'  => '',
				'enable_prev'    => false,
				'next_html'      => '<a href="{URL}" class="js-load-more"></a>',
				'current_page'   => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				'total_pages'    => $articles->max_num_pages,
			) );
			?>
		</div>
	</div><!-- /.shell -->
</section><!-- /.section-help-center -->

<?php
crb_render_fragment( 'cta' );

get_footer();
