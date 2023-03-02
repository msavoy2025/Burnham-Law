<?php
$green_aop             = carbon_get_the_post_meta( 'crb_green_areas_of_practice' );
$black_aop             = carbon_get_the_post_meta( 'crb_black_areas_of_practice' );
$green_percentage      = carbon_get_the_post_meta( 'crb_green_aop_percentage' );
$litigation_percentage = carbon_get_the_post_meta( 'crb_litigation_percentage' );
$details               = carbon_get_the_post_meta( 'crb_details' );
?>

<div class="team__details">
	<ul class="team__details-list">
		<?php if ( $green_aop || $black_aop ) : ?>
			<li>
				<h6><?php _e( 'Areas Of Practice', 'crb' ); ?></h6>

				<div class="list-percentages">
					<ul>
						<?php if ( $green_aop ) : ?>
							<li>
								<strong><?php echo $green_percentage; ?>%</strong>

								<p><?php echo esc_html( $green_aop ); ?></p>
							</li>
						<?php endif ?>

						<?php if ( $black_aop ) : ?>
							<li>
								<strong><?php echo 100 - $green_percentage; ?>%</strong>

								<p><?php echo esc_html( $black_aop ); ?></p>
							</li>
						<?php endif ?>
					</ul>

					<!--<div class="bar">
						<span style="width: <?php echo $green_percentage; ?>%;"></span>
					</div>--><!-- /.bar -->
				</div><!-- /.list-percentages -->
			</li>
		<?php endif ?>

		<?php if ( $litigation_percentage ) : ?>
			<li>
				<h6><?php _e( 'Litigation Percentage', 'crb' ); ?></h6>

				<div class="list-percentages">
					<ul>
						<li>
							<strong><?php echo $litigation_percentage; ?>%</strong>

							<p><?php _e( 'Practice Devoted to Litigation', 'crb' ); ?></p>
						</li>
					</ul>

					<!--<div class="bar">
						<span style="width: <?php echo $litigation_percentage; ?>%;"></span>
					</div>--><!-- /.bar -->
				</div><!-- /.list-percentages -->
			</li>
		<?php endif ?>

		<?php if ( $details ) : ?>
			<?php foreach ( $details as $group ) : ?>
				<li>
					<?php if ( ! empty( $group['list_title'] ) ) : ?>
						<h5><?php echo esc_html( $group['list_title'] ); ?></h5>
					<?php endif ?>

					<ul>
						<?php foreach ( $group['items'] as $item ) : ?>
							<li><?php echo esc_html( $item['text'] ); ?></li>
						<?php endforeach ?>
					</ul>
				</li>
			<?php endforeach ?>
		<?php endif ?>
	</ul><!-- /.team__details-list -->
</div><!-- /.team__details -->
