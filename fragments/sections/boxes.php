<section class="section-cases section-gray">
	<div class="shell">
		<div class="section__inner">
			<header class="section__head">
				<h2><?php echo esc_html( $headline ); ?></h2>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div class="cases">
					<ul>
						<?php foreach ( $boxes as $box ) : ?>
							<li>
								<div class="case">
									<?php if ( ! empty( $box['link_url'] ) ) : ?>
										<a href="<?php echo esc_url( $box['link_url'] ); ?>" target="<?php echo $box['link_target']; ?>"></a>
									<?php endif ?>

									<div class="case__image">
										<span class="image-fit">
											<?php echo wp_get_attachment_image( $box['image'], 'crb_box_img' ); ?>
										</span>
									</div><!-- /.case__image -->

									<div class="case__content">
										<?php if ( ! empty( $box['subhead'] ) ) : ?>
											<h6><?php echo esc_html( $box['subhead'] ); ?></h6>
										<?php endif ?>

										<h4><?php echo nl2br( esc_html( $box['headline'] ) ); ?></h4>

										<?php if ( ! empty( $box['content'] ) ) : ?>
											<p><?php echo nl2br( esc_html( $box['content'] ) ); ?></p>
										<?php endif ?>
									</div><!-- /.case__content -->

									<?php if ( ! empty( $box['link_label'] ) ) : ?>
										<div class="case__actions">
											<span><?php echo esc_html( $box['link_label'] ); ?></span>
										</div><!-- /.case__actions -->
									<?php endif ?>
								</div><!-- /.case -->
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.cases -->
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-cases -->
