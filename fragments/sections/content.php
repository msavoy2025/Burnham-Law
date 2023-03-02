<section class="section-tile-details<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<?php if ( $subhead ) : ?>
			<header class="section__head">
				<h6><?php echo esc_html( $subhead ); ?></h6>
			</header><!-- /.section__head -->
		<?php endif ?>

		<div class="section__body">
			<div class="tile-details">
				<?php if ( $logo ) : ?>
					<div class="tile__logo">
						<?php echo wp_get_attachment_image( $logo, 'crb_logo' ); ?>

						<?php if ( $logo_text ) : ?>
							<h6><?php echo esc_html( $logo_text ); ?></h6>
						<?php endif ?>
					</div><!-- /.tile__logo -->
				<?php endif ?>

				<div class="tile__head">
					<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>

					<?php if ( $centered_content ) : ?>
						<h6><?php echo nl2br( esc_html( $centered_content ) ); ?></h6>
					<?php endif ?>
				</div><!-- /.tile__head -->

				<div class="tile__body">
					<?php if ( $left_word || $middle_word || $right_word ) : ?>
						<div class="tile__content">
							<p>
								<?php
								if ( $left_word ) {
									echo esc_html( $left_word );
								}
								?>

								<?php if ( $middle_word ) : ?>
									<span><?php echo esc_html( $middle_word ); ?></span>
								<?php endif ?>

								<?php
								if ( $right_word ) {
									echo esc_html( $right_word );
								}
								?>
							</p>
						</div><!-- /.tile__content -->
					<?php endif ?>

					<?php if ( $bottom_content ) : ?>
						<div class="tile__entry">
							<?php echo wpautop( esc_html( $bottom_content ) ); ?>
						</div><!-- /.tile__entry -->
					<?php endif ?>
				</div><!-- /.tile__body -->
			</div><!-- /.tile-details -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-tile-details -->
