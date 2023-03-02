<div class="section__rows">
	<?php foreach ( $rows as $row ) : ?>
		<div class="section__row">
			<div class="entry">
				<div class="entry__title">
					<h6><?php echo esc_html( $row['side_label'] ); ?></h6>
				</div><!-- /.entry__title -->

				<div class="entry__content">
					<?php echo crb_content( $row['content'] ); ?>
				</div><!-- /.entry__content -->
			</div><!-- /.entry -->
		</div><!-- /.section__row -->
	<?php endforeach ?>
</div><!-- /.section__rows -->
