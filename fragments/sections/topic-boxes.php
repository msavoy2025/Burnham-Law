<section class="section-tabs section-gray">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $headline || $subhead ) : ?>
				<header class="section__head">
					<?php if ( $subhead ) : ?>
						<h6><?php echo esc_html( $subhead ); ?></h6>
					<?php endif ?>

					<?php if ( $headline ) : ?>
						<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
					<?php endif ?>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__body">
				<div class="tabs js-tabs">
					<div class="tabs__head">
						<nav class="tabs__nav js-tabs-nav">
							<?php if ( $left_boxes_text ) : ?>
								<h6><?php echo esc_html( $left_boxes_text ); ?></h6>
							<?php endif ?>

							<ul>
								<?php foreach ( $left_boxes as $key => $box ) : ?>
									<li<?php echo $key === 0 ? ' class="current"' : ''; ?>>
										<a href="#tab1<?php echo $key + 1; ?>">
											<h4><?php echo esc_html( $box['headline'] ); ?></h4>

											<?php if ( ! empty( $box['subhead'] ) ) : ?>
												<p><?php echo esc_html( $box['subhead'] ); ?></p>
											<?php endif ?>
										</a>
									</li>
								<?php endforeach ?>
							</ul>
						</nav><!-- /.tabs__nav -->

						<nav class="tabs__nav js-tabs-nav">
							<?php if ( $right_boxes_text ) : ?>
								<h6><?php echo esc_html( $right_boxes_text ); ?></h6>
							<?php endif ?>

							<ul>
								<?php foreach ( $right_boxes as $key => $box ) : ?>
									<li>
										<a href="#tab2<?php echo $key + 1; ?>">
											<h4><?php echo nl2br( esc_html( $box['headline'] ) ); ?></h4>

											<?php if ( ! empty( $box['subhead'] ) ) : ?>
												<p><?php echo esc_html( $box['subhead'] ); ?></p>
											<?php endif ?>
										</a>
									</li>
								<?php endforeach ?>
							</ul>
						</nav><!-- /.tabs__nav -->
					</div><!-- /.tabs__head -->

					<div class="tabs__body">
						<?php foreach ( $left_boxes as $key => $box ) : ?>
							<div class="tab<?php echo $key === 0 ? ' current' : ''; ?>" id="tab1<?php echo $key + 1; ?>">
								<?php echo crb_content( $box['content'] ); ?>
							</div><!-- /.tab -->
						<?php endforeach ?>

						<?php foreach ( $right_boxes as $key => $box ) : ?>
							<div class="tab" id="tab2<?php echo $key + 1; ?>">
								<?php echo crb_content( $box['content'] ); ?>
							</div><!-- /.tab -->
						<?php endforeach ?>
					</div><!-- /.tabs__body -->
				</div><!-- /.tabs js-tabs -->

				<?php $all_boxes = array_merge( $left_boxes, $right_boxes ); ?>

				<div class="accordion js-accordion">
					<?php foreach ( $all_boxes as $box ) : ?>
						<div class="accordion__section">
							<div class="accordion__head js-accordion-head">
								<h3><?php echo nl2br( esc_html( $box['headline'] ) ); ?></h3>
							</div><!-- /.accordion__head -->

							<div class="accordion__body js-accordion-body">
								<?php echo crb_content( $box['content'] ); ?>
							</div><!-- /.accordion__body -->
						</div><!-- /.accordion__section -->
					<?php endforeach ?>
				</div><!-- /.accordion js-accordion -->
			</div><!-- /.section__body -->

			<?php if ( $bottom_text ) : ?>
				<footer class="section__foot">
					<h6><?php echo esc_html( $bottom_text ); ?></h6>
				</footer><!-- /.section__foot -->
			<?php endif ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-tabs -->
