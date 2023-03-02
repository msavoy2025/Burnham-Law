<section class="section-numbers section-dark">
	<div class="shell">
		<header class="section__head">
			<?php echo crb_content( $top_content ); ?>
		</header><!-- /.section__head -->

		<div class="section__body">
			<?php
			if ( $bottom_content ) {
				echo crb_content( $bottom_content );
			}
			?>

			<div class="numbers">
				<ul>
					<li>
						<strong>
							<?php for ( $i = 0; $i < strlen( $left_number ); $i++ ) : ?>
								<span><?php echo $left_number[ $i ]; ?></span>
							<?php endfor; ?>

							<?php if ( $left_number_suffix ) : ?>
								<span><?php echo $left_number_suffix; ?></span>
							<?php endif ?>
						</strong>

						<?php if ( $left_text ) : ?>
							<p><?php echo esc_html( $left_text ); ?></p>
						<?php endif ?>
					</li>

					<li>
						<strong>
							<?php for ( $i = 0; $i < strlen( $right_number ); $i++ ) : ?>
								<span><?php echo $right_number[ $i ]; ?></span>
							<?php endfor; ?>

							<?php if ( $right_number_suffix ) : ?>
								<span><?php echo $right_number_suffix; ?></span>
							<?php endif ?>
						</strong>

						<?php if ( $right_text ) : ?>
							<p><?php echo esc_html( $right_text ); ?></p>
						<?php endif ?>
					</li>
				</ul>
			</div><!-- /.numbers -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-numbers section-dark -->
