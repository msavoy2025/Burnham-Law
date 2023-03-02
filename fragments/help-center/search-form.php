<?php
$placeholder = carbon_get_the_post_meta( 'crb_search_placeholder' );
$val = get_query_var('search') ? get_query_var('search') : '';
?>

<section class="section-search">
	<div class="shell">
		<div class="section__inner">
			<div class="search-form">
				<form action="<?php the_permalink(); ?>" method="get" role="search" class="js-help-center-form">
					<label>
						<input type="search" title="<?php echo esc_html( $placeholder ); ?>" name="search" value="<?php echo esc_html( $val ); ?>" placeholder="<?php echo esc_html( $placeholder ); ?>" class="search__field">
					</label>
				</form>
			</div><!-- /.search-form -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-search -->
