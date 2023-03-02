<?php
$members = carbon_get_the_post_meta( 'crb_cta_members' );
$rand_member_index = array_rand( $members );

if ( ! has_post_thumbnail( $members[$rand_member_index]['id'] ) ) {
	return;
}

$member_name = get_the_title( $members[$rand_member_index]['id'] );
$member_name_parts = explode( ' ', $member_name );

$headline   = carbon_get_the_post_meta( 'crb_cta_headline' );
$btn_label  = carbon_get_the_post_meta( 'crb_cta_btn_label' );
$btn_target = carbon_get_the_post_meta( 'crb_cta_btn_target' );
$btn_url    = carbon_get_the_post_meta( 'crb_cta_btn_url' );
?>

<div class="helpCenterCTA">
  <div class="helpCenterCTA_left">
  	<?php if ( $subhead = carbon_get_the_post_meta( 'crb_cta_subhead' ) ) : ?>
    	<p class="helpCenterCTA_help"><?php echo esc_html( $subhead ); ?></p>
  	<?php endif ?>

	<?php if ( $headline ) : ?>
	    <div class="helpCenterCTA_slogan">
	    	<div class="oldh1"><?php echo esc_html( $headline ); ?></div>
	    </div>
	<?php endif ?>

    <?php if ( $content = carbon_get_the_post_meta( 'crb_cta_content' ) ) : ?>
    	<p><?php echo nl2br( esc_html( $content ) ); ?></p>
    <?php endif ?>

    <div class="helpCenterCTA_inner">
    	<?php if ( $phone = carbon_get_the_post_meta( 'crb_cta_phone' ) ) : ?>
	      <div class="helpCenterCTA_call">
	        <h6><?php _e( 'Call us', 'crb' ); ?></h6>

	        <p>
	        	<a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
	        </p>
	      </div>
    	<?php endif ?>

    	<?php if ( $locations = carbon_get_the_post_meta( 'crb_cta_locations' ) ) : ?>
	      <div class="helpCenterCTA_locations">
	        <h6><?php _e( 'Locations', 'crb' ); ?></h6>

	        <div class="subLocations">
	          <ul>
	          	<?php foreach ( $locations as $location ) : ?>
		            <li>
		            	<a href="<?php the_permalink( $location['id'] ); ?>"><?php echo get_the_title( $location['id'] ); ?></a>
		            </li>
	          	<?php endforeach ?>
	          </ul>
	        </div>
	      </div>
    	<?php endif ?>
    </div><!-- helpCenterCTA_inner close -->

    <?php if ( $btn_label && $btn_url ) : ?>
    	<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
    <?php endif ?>
  </div><!-- helpCenterCTA_left close -->

  <div class="helpCenterCTA_right" style="background-image:url(<?php echo get_the_post_thumbnail_url( $members[$rand_member_index]['id'], 'crb_person' ); ?>);">
    <div class="helpCenterCTA_rightText">
      <h3><?php echo implode( '<br>', $member_name_parts ); ?></h3>

		<?php if ( $position = carbon_get_post_meta( $members[$rand_member_index]['id'], 'crb_position' ) ) : ?>
			<p><?php echo esc_html( $position ); ?></p>
		<?php endif ?>

		<?php if ( $location_id = carbon_get_post_meta( $members[$rand_member_index]['id'], 'crb_location' ) ) : ?>
			<p><?php echo get_the_title( $location_id ); ?></p>
		<?php endif ?>
    </div>
  </div>
</div>
