<section class="section-columns<?php echo $bg_color === 'gray' ? ' section-gray' : ''; ?>">
	<div class="shell">
		<div class="section__inner">
			<div class="section__col">
				<div class="section__entry">
					<?php echo crb_content( $left_column ); ?>
				</div><!-- /.section__entry -->
			</div><!-- /.section__col -->

			<div class="section__col">
				<div class="section__entry">
					<?php echo crb_content( $right_column ); ?>
				</div><!-- /.section__entry -->
			</div><!-- /.section__col -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-columns -->
