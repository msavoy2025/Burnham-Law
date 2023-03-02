<?php
$headline = carbon_get_the_post_meta( 'crb_intro_headline' );
$subhead = carbon_get_the_post_meta( 'crb_intro_subhead' );
$content = carbon_get_the_post_meta( 'crb_intro_content' );

$specialties = get_terms( array(
	'taxonomy'   => 'crb_specialty',
	'hide_empty' => true,
) );
?>

<header class="section__head">
	<div class="section__head-inner">
		<?php if ( $headline ) : ?>
			<h1><?php echo nl2br( esc_html( $headline ) ); ?></h1>
		<?php endif ?>

		<?php if ( $subhead ) : ?>
			<h6><?php echo nl2br( esc_html( $subhead ) ); ?></h6>
		<?php endif ?>

		<?php if ( $content ) : ?>
			<p><?php echo nl2br( esc_html( $content ) ); ?></p>
		<?php endif ?>
	</div><!-- /.section__head-inner -->

	<?php if ( $specialties ) :
		$selected_specialty_slug = crb_request_param( 'specialty' );
		$selected_term = get_term_by( 'slug', $selected_specialty_slug, 'crb_specialty' );
		?>

		<div class="filter-select js-team-filter">
			<span><?php echo $selected_term ? esc_html( $selected_term->name ) : __( 'Filter By Specialty', 'crb' ); ?></span>

			<ul>
				<?php
				$permalink = get_the_permalink();
				foreach ( $specialties as $specialty ) :
					$href = add_query_arg( 'specialty', $specialty->slug, $permalink );
					?>

					<li>
						<a href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $specialty->name ); ?></a>
					</li>
				<?php endforeach ?>

				<li>
					<a href="<?php echo esc_url( $permalink ); ?>"><?php _e( 'View All', 'crb' ); ?></a>
				</li>
			</ul>
		</div><!-- /.select -->
	<?php endif ?>
</header><!-- /.section__head -->
