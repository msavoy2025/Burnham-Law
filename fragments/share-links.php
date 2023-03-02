<?php
$post_title = urlencode( get_the_title() );
$permalink = urlencode( get_the_permalink() );
$checkbox_related = carbon_get_the_post_meta('crb_checkbox_related_articles');
$facebook_link = 'http://www.facebook.com/sharer.php?t=' . $post_title . '&u=' . $permalink;
$twitter_link = 'http://twitter.com/share?text=' . $post_title . '&url=' . $permalink;
?>

<?php if ( empty( $checkbox_related ) ) { ?>
<div class="article__actions">
	<h6><?php _e( 'More Articles', 'crb' ); ?></h6>

	<div class="socials-alt">
		<p><?php _e( 'Share This Article', 'crb' ); ?></p>

		<ul>
			<li>
				<a href="<?php echo esc_url( $twitter_link ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
					Twitter
				</a>
			</li>

			<li>
				<a href="<?php echo esc_url( $facebook_link ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
					Facebook
				</a>
			</li>
		</ul>
	</div><!-- /.socials-alt -->
</div><!-- /.article__actions -->
<?php } else {} ?>
