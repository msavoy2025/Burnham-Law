<section class="section-features section-gray">
	<div class="shell shell--small">
		<div class="section__inner">
			<aside class="section__aside">
				<?php if ( $statistics_headline ) : ?>
					<h6><?php echo nl2br( esc_html( $statistics_headline ) ); ?></h6>
				<?php endif ?>

				<div class="list-features">
					<ul>
						<?php foreach ( $statistics as $statistic ) : ?>
							<li>
								<strong>
									<?php echo $statistic['number'] ?>

									<?php if ( ! empty( $statistic['suffix'] ) ) : ?>
										<small><?php echo esc_html( $statistic['suffix'] ); ?></small>
									<?php endif ?>
								</strong>

								<p><?php echo esc_html( $statistic['label'] ); ?></p>
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.list-features -->
			</aside><!-- /.section__aside -->

			<div class="section__content">
				<?php if ( $headline ) : ?>
					<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
				<?php endif ?>

				<?php if ( $subhead ) : ?>
					<h5><?php echo nl2br( esc_html( $subhead ) ); ?></h5>
				<?php endif ?>

				<div class="list-arrows">
					<ul>
						<?php foreach ( $list_items as $list_item ) : ?>
							<li><?php echo nl2br( esc_html( $list_item['text'] ) ); ?></li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.list-arrows -->
			</div><!-- /.section__content -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell shell-/-small -->
</section><!-- /.section-features section-gray -->
