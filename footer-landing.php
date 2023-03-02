			</div><!-- /.main -->
			<footer class="footer footer--alt">
				<div class="shell shell--small">
					<div class="footer__inner">
						<div class="footer__cols">
							<div class="footer__col footer__col-size3 footer__logo-holder">
								<div class="footer__logo">
									<a href="<?php echo home_url(); ?>">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logos/footer-logo.svg" alt="<?php _e( 'Footer Logo', 'crb' ); ?>" />
									</a>
								</div><!-- /.footer__logo -->
							</div><!-- /.footer__col footer__col-size3 -->

							<?php
							$headline  = carbon_get_the_post_meta( 'crb_hf_headline' );
							$address   = carbon_get_the_post_meta( 'crb_hf_address' );
							$phone     = carbon_get_the_post_meta( 'crb_hf_phone' );
							$btn_label = carbon_get_the_post_meta( 'crb_hf_btn_label' );
							?>

							<div class="footer__col footer__col-size3">
								<?php if ( $text = carbon_get_the_post_meta( 'crb_footer_text' ) ) : ?>
									<h6><?php echo esc_html( $text ); ?></h6>
								<?php endif ?>
							</div><!-- /.footer__col footer__col-size3 -->

							<div class="footer__col footer__col-size3 footer__contacts">
								<?php if ( $headline || $address ) : ?>
									<p>
										<?php if ( $headline ) : ?>
											<strong><?php echo esc_html( $headline ); ?></strong>
										<?php endif ?>

										<?php if ( $phone ) : ?>
											<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
										<?php endif ?>

										<?php
										if ( $address ) {
											echo nl2br( esc_html( $address ) );
										}
										?>
									</p>
								<?php endif ?>

								<?php if ( $phone && $btn_label ) : ?>
									<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>" class="btn btn--xsmall"><?php echo esc_html( $btn_label ); ?></a>
								<?php endif ?>
							</div><!-- /.footer__col footer__col-size3 -->
						</div><!-- /.footer__cols -->
					</div><!-- /.footer__inner -->
				</div><!-- /.shell -->
			</footer><!-- /.footer -->
		</div><!-- /.wrapper__inner -->
	</div><!-- /.wrapper -->

	<?php wp_footer(); ?>

	<script>
	var form = document.querySelector('#gform_3');
	form.addEventListener(
	 'submit',
	 function() {
	   CallTrk.captureForm('#gform_3');
	 }
	);
	</script>
	<script type="text/javascript" src="//cdn.callrail.com/companies/513809326/1b6ff70e6dcea1e89eb3/12/swap.js"></script>
	<script type="text/javascript">var sc_project=12247723; var sc_invisible=1; var sc_security="f2c591fe";</script><script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script><noscript><div class="statcounter"><img class="statcounter" src="https://c.statcounter.com/12247723/0/f2c591fe/1/" alt="web counter"></div></noscript>
</body>
</html>
