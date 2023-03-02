<section class="section-form<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<header class="section__head">
				<?php if ( $headline ) : ?>
					<h2><?php echo esc_html( $headline ); ?></h2>
				<?php endif;

				if ( $content ) {
					echo crb_content( $content );
				}
				?>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div class="form-steps">
					<?php
					crb_render_gform( $form_id, true, array(
						'tabindex' => 10,
					) );
					?>
				</div><!-- /.form-steps -->
			</div><!-- /.section__body -->

			<?php if ( $left_text || $right_text ) : ?>
				<footer class="section__foot">
					<?php if ( $left_text ) : ?>
						<h6>
							<?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $left_text ) ) ); ?>

							<?php if ( $left_side_phone ) : ?>
								<br>

								<a href="tel:<?php echo crb_filter_phone_number( $left_side_phone ); ?>"><?php echo esc_html( $left_side_phone ); ?></a>
							<?php endif ?>
						</h6>
					<?php endif ?>

					<?php if ( $right_text ) : ?>
						<h6>
							<?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $right_text ) ) ); ?>

							<?php if ( $right_side_phone ) : ?>
								<br>

								<a href="tel:<?php echo crb_filter_phone_number( $right_side_phone ); ?>"><?php echo esc_html( $right_side_phone ); ?></a>
							<?php endif ?>
						</h6>
					<?php endif ?>
				</footer><!-- /.section__foot -->
			<?php endif ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-form -->
