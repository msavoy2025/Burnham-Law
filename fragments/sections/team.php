<section class="section-team-members<?php echo $bg_color === 'dark' ? ' section-team-members--alt section-dark' : ' section-gray'; ?>">
	<div class="shell">
		<div class="section__inner">
			<header class="section__head">
				<?php if ( $headline ) : ?>
					<h2><?php echo nl2br( esc_html( $headline ) ); ?></h2>
				<?php endif ?>

				<?php if ( $subhead ) : ?>
					<h6><?php echo esc_html( $subhead ); ?></h6>
				<?php endif ?>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div class="team-members">
					<ul>
						<?php foreach ( $members as $member ) : ?>
							<?php
							crb_render_fragment( 'single-member', array(
								'member_id' => $member['id']
							) );
							?>
						<?php endforeach ?>
					</ul>
				</div><!-- /.team-members -->
			</div><!-- /.section__body -->

			<div class="section__actions">
				<h5><?php echo nl2br( esc_html( $bottom_text ) ); ?></h5>

				<?php if ( $btn_label && $btn_url ) : ?>
					<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn--lg" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
				<?php endif ?>
			</div><!-- /.section__actions -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-team-members -->
