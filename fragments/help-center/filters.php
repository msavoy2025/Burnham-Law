<?php
$current_url = add_query_arg( array(
	'practice-area' => $current_practice_area,
	'category'      => $current_category,
), get_the_permalink() );

$practice_areas = get_terms( array(
	'taxonomy'   => 'crb_practice_area_cat',
	'hide_empty' => true,
) );

$categories = get_terms( array(
	'taxonomy'   => 'crb_hc_category',
	'hide_empty' => true,
) );
?>

<header class="section__head">
	<div class="help-center-filters js-articles-filter">
		<?php if ( $practice_areas ) : ?>
			<div class="filters__row">
				<p>
					<span><?php _e( 'Practice Area', 'crb' ); ?></span>
				</p>

				<ul>
					<li<?php echo $current_practice_area === 'all' ? ' class="current"' : ''; ?>>
						<?php $href = add_query_arg( 'practice-area', 'all', $current_url ); ?>

						<a href="<?php echo esc_url( $href ); ?>"><?php _e( 'All', 'crb' ); ?></a>
					</li>

					<?php foreach ( $practice_areas as $practice_area ) :
						$href = add_query_arg( 'practice-area', $practice_area->slug, $current_url );
						?>

						<li<?php echo $current_practice_area === $practice_area->slug ? ' class="current"' : ''; ?>>
							<a href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $practice_area->name ); ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div><!-- /.filters__row -->
		<?php endif ?>

		<?php if ( $categories ) : ?>
			<div class="filters__row">
				<p>
					<span><?php _e( 'Category', 'crb' ); ?></span>
				</p>

				<ul>
					<li<?php echo $current_category === 'all' ? ' class="current"' : ''; ?>>
						<?php $href = add_query_arg( 'category', 'all', $current_url ); ?>

						<a href="<?php echo esc_url( $href ); ?>"><?php _e( 'All', 'crb' ); ?></a>
					</li>

					<?php foreach ( $categories as $cat ) :
						$href = add_query_arg( 'category', $cat->slug, $current_url );
						?>

						<li<?php echo $current_category === $cat->slug ? ' class="current"' : ''; ?>>
							<a href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $cat->name ); ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div><!-- /.filters__row -->
		<?php endif ?>
	</div><!-- /.help-center-filters -->
</header><!-- /.section__head -->
