<?php
if ( ! $menu_items = carbon_get_theme_option( 'crb_menu_items' ) ) {
	return;
}
?>

<div class="nav-dropdown">
	<button type="button" class="nav__close"><?php _e( 'Hover To Close', 'crb' ); ?></button>

	<div class="nav-dropdown__inner">
		<div class="shell">
			<?php foreach ( $menu_items as $menu_item ) :
				if ( ! $menu_item['second_level'] ) {
					continue;
				}
				?>

				<div class="dropdown" id="<?php echo crb_convert_string_to_id( $menu_item['top_level_label'] ); ?>">
					<?php if ( ! empty( $menu_item['second_level_top_text'] ) ) : ?>
						<p><?php echo esc_html( $menu_item['second_level_top_text'] ); ?></p>
					<?php endif ?>

					<div class="nav__dropdown">
						<ul class="dropdown__list">
							<?php foreach ( $menu_item['second_level_items'] as $second_level_item ) :
								if ( ! $second_level_item['third_level'] ) {
									$href = esc_url( $second_level_item['url'] );
								} else {
									$href = '#';
								}
								?>

								<li>
									<?php if ( $second_level_item['third_level'] ) : ?>
										<div class="dropdown__inner">
									<?php else : ?>
										<a href="<?php echo $href; ?>">
									<?php endif ?>
										<span class="dropdown__bg" style="background-image: url(<?php echo wp_get_attachment_image_url( $second_level_item['bg_image'], 'crb_fullwidth' ); ?>);"></span>

										<div class="dropdown__title">
											<?php if ( ! empty( $second_level_item['subhead'] ) ) : ?>
												<h6><?php echo esc_html( $second_level_item['subhead'] ); ?></h6>
											<?php endif ?>

											<h2><?php echo nl2br( esc_html( $second_level_item['headline'] ) ); ?></h2>

											<?php if ( $second_level_item['third_level'] && ! empty( $second_level_item['third_level_top_text'] ) ) : ?>
												<p><?php echo esc_html( $second_level_item['third_level_top_text'] ); ?></p>
											<?php endif ?>
										</div>

										<?php if ( ! $second_level_item['third_level'] && ! empty( $second_level_item['box_content'] ) ) :
											$list_parts = explode( "\n", $second_level_item['box_content'] );
											?>

											<ul>
												<?php foreach ( $list_parts as $list_part ) : ?>
													<li><?php echo esc_html( $list_part ); ?></li>
												<?php endforeach ?>
											</ul>
										<?php endif ?>

										<?php if ( $second_level_item['third_level'] ) : ?>
											<ul>
												<?php foreach ( $second_level_item['third_level_items'] as $third_level_item ): ?>
													<li>
														<a href="<?php echo esc_url( $third_level_item['url'] ); ?>" target="<?php echo $third_level_item['target']; ?>"><?php echo esc_html( $third_level_item['label'] ); ?></a>
													</li>
												<?php endforeach ?>
											</ul>
										<?php endif ?>
									<?php if ( $second_level_item['third_level'] ) : ?>
										</div><!-- /.dropdown__inner -->
									<?php else : ?>
										</a>
									<?php endif ?>
								</li>
							<?php endforeach ?>
						</ul>
					</div><!-- /.nav__dropdown -->
				</div><!-- /.dropdown -->
			<?php endforeach ?>
		</div><!-- /.shell -->
	</div><!-- /.nav-dropdown__inner -->
</div><!-- /.nav-dropdown -->
