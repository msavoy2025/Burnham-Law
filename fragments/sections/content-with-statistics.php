<section class="section-text<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__content">
			<?php echo crb_content( $content ); ?>
		</div><!-- /.section__content -->

		<?php if ( $statistics ) : ?>
			<div class="section__details">
				<div class="list-numbers">
					<ol>
						<?php foreach ( $statistics as $statistic ) : ?>
							<li>
								<strong>
									<?php echo $statistic['number'] ?>

									<?php if ( ! empty( $statistic['suffix'] ) ) : ?>
										<sub><?php echo esc_html( $statistic['suffix'] ); ?></sub>
									<?php endif ?>
								</strong>

								<p><?php echo esc_html( $statistic['label'] ); ?></p>
							</li>
						<?php endforeach ?>
					</ol>
				</div><!-- /.list-numbers -->
			</div><!-- /.section__details -->
		<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-text section-gray -->
