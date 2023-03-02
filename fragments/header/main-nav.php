<?php
if ( ! $menu_items = carbon_get_theme_option( 'crb_menu_items' ) ) {
	return;
}
?>

<nav class="nav">
	<ul>
		<?php foreach ( $menu_items as $menu_item ) :
			if ( $menu_item['second_level'] ) {
				$href = '#' . crb_convert_string_to_id( $menu_item['top_level_label'] );
			} else {
				$href = esc_url( $menu_item['top_level_url'] );
			}
			?>

			<li<?php echo $menu_item['second_level'] ? ' class="menu-item-has-children"' : ''; ?>>
				<a href="<?php echo $href; ?>" target="<?php echo $menu_item['top_level_target']; ?>"><?php echo esc_html( $menu_item['top_level_label'] ); ?></a>
			</li>
		<?php endforeach ?>
	</ul>
</nav><!-- /.nav -->

<nav class="nav-mobile">
	<p><?php _e( 'Make a selection below', 'crb' ); ?></p>

	<ul>
		<?php foreach ( $menu_items as $menu_item ) : ?>
			<?php if ( $menu_item['second_level'] ) : ?>
				<li class="menu-item-has-children">
					<a href="#"><?php echo esc_html( $menu_item['top_level_label'] ); ?></a>

					<div class="sub-menu">
						<div class="sub-menu__top">
							<a href="#"><?php _e( 'Back to Main Menu', 'crb' ); ?></a>

							<p><?php echo esc_html( $menu_item['top_level_label'] ); ?></p>
						</div><!-- /.sub-menu__top -->

						<ul>
							<?php foreach ( $menu_item['second_level_items'] as $second_level_item ) : ?>
								<?php if ( ! $second_level_item['third_level'] ) : ?>
									<li>
										<a href="<?php echo esc_url( $second_level_item['url'] ); ?>" target="<?php echo $second_level_item['target']; ?>"><?php echo esc_html( $second_level_item['headline'] ); ?></a>
									</li>
								<?php else : ?>
									<li class="menu-item-has-children">
										<a href="#"><?php echo esc_html( $second_level_item['headline'] ); ?></a>

										<div class="sub-menu">
											<div class="sub-menu__top">
												<a href="#"><?php echo __( 'Back to ', 'crb' ) . esc_html( $menu_item['top_level_label'] ); ?></a>

												<p><?php echo esc_html( $second_level_item['headline'] ); ?></p>
											</div><!-- /.sub-menu__top -->

											<ul>
												<?php foreach ( $second_level_item['third_level_items'] as $third_level_item ) : ?>
													<li>
														<a href="<?php echo esc_url( $third_level_item['url'] ); ?>" target="<?php echo $third_level_item['target']; ?>"><?php echo esc_html( $third_level_item['label'] ); ?></a>
													</li>
												<?php endforeach ?>
											</ul>
										</div><!-- /.sub-menu -->
									</li>
								<?php endif ?>
							<?php endforeach ?>
						</ul>
					</div><!-- /.sub-menu -->
				</li>
			<?php else : ?>
				<li>
					<a href="<?php echo esc_url( $menu_item['top_level_url'] ); ?>" target="<?php echo $menu_item['top_level_target']; ?>"><?php echo esc_html( $menu_item['top_level_label'] ); ?></a>
				</li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>
</nav><!-- /.nav-mobile -->
