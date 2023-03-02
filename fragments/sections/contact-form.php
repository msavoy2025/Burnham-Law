<section class="section-form section-form--alt section-gray">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $headline || $subhead ) : ?>
				<header class="section__head">
					<?php if ( $headline ) : ?>
						<h2><?php echo esc_html( $headline ); ?></h2>
					<?php endif ?>

					<?php if ( $subhead ) : ?>
						<p><?php echo nl2br( crb_replace_asterisks_with_strong_tag( esc_html( $subhead ) ) ); ?></p>
					<?php endif ?>
				</header><!-- /.section__head -->
			<?php endif ?>

			<div class="section__body">
				<div class="form-steps">
					<?php
					crb_render_gform( $form_id, true, array(
						'tabindex' => 10,
					) );
					?>
				</div><!-- /.form-steps -->
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-form -->
