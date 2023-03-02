<section class="section-about section-gray">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<?php if ( $middle_headline ) : ?>
					<h6><?php echo esc_html( $middle_headline ); ?></h6>
				<?php endif ?>

				<p><?php echo nl2br( esc_html( $middle_content ) ); ?></p>
			</div><!-- /.section__content -->

			<div class="section__columns">
				<div class="section__col">
					<ul>
						<?php foreach ( $left_rows as $row ) : ?>
							<li>
								<strong><?php echo esc_html( $row['bold_text'] ); ?></strong>

								<p><?php echo esc_html( $row['text'] ); ?></p>
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.section__col -->

				<div class="section__col">
					<ul>
						<?php foreach ( $right_rows as $row ) : ?>
							<li>
								<strong><?php echo esc_html( $row['bold_text'] ); ?></strong>

								<p><?php echo esc_html( $row['text'] ); ?></p>
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.section__col -->
			</div><!-- /.section__columns -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-about -->
