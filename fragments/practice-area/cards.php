<?php
$cards     = carbon_get_the_post_meta( 'crb_cards' );
$side_text = carbon_get_the_post_meta( 'crb_intro_side_text' );
if ( ! $cards && ! $side_text ) {
	return;
}
?>

<section class="section-cards section-gray">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $side_text ) : ?>
				<header class="section__head">
					<h6><?php echo esc_html( $side_text ); ?></h6>
				</header><!-- /.section__head -->
			<?php endif ?>

			<?php if ( $cards ) : ?>
				<div class="section__body">
					<div class="cards">
						<ul>
							<?php foreach ( $cards as $card ) : ?>
								<li>
									<div class="card">
										<div class="card__image">
											<?php echo wp_get_attachment_image( $card['image'], 'crb_narrow_img' ); ?>
										</div><!-- /.card__image -->

										<div class="card__content">
											<?php if ( ! empty( $card['headline'] ) ) : ?>
												<h6><?php echo esc_html( $card['headline'] ); ?></h6>
											<?php endif ?>

											<p><?php echo nl2br( esc_html( $card['content'] ) ); ?></p>
										</div><!-- /.card__content -->
									</div><!-- /.card -->
								</li>
							<?php endforeach ?>
						</ul>
					</div><!-- /.cards -->
				</div><!-- /.section__body -->
			<?php endif ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-cards -->
