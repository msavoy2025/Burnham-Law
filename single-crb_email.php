<html>
<body>
  <style>
    * {
      margin:0;
      padding:0;
    }

    h2 {
      font-weight:800 !important;
    }

    span {
      font-weight:800 !important;
    }

    a {text-decoration:none !important;}

    span {text-decoration:none !important;}

  </style>
<?php

$emailImage = carbon_get_the_post_meta('crb_email_image');
$emailFirstName = carbon_get_the_post_meta('crb_email_firstname');
$emailLastName = carbon_get_the_post_meta('crb_email_lastname');
$emailposition = carbon_get_the_post_meta('crb_email_position');
$emailAddress = carbon_get_the_post_meta('crb_email_address');
$emailcityzip = carbon_get_the_post_meta('crb_email_cityzip');
$emailOffice = carbon_get_the_post_meta('crb_email_office');
$emailFax = carbon_get_the_post_meta('crb_email_fax');
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
?>

<?php
while (have_posts()) {
  the_post(); ?>

<table border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width:1039px; height: 208px;" bgcolor="#ffffff">
	<tr>
		<td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="left" valign="top">

				<!-- Main -->
<table id="emailStuff">
<tr>
  <td class="emailImage" style="position:relative;"><img src="<?php echo $image ?>" width="165" height="auto" border="0" onerror="this.style.display='none'"></td>
  <td class="emailName" style="border-right:3px solid #1a1a1a; vertical-align:bottom; display: table-cell; padding-top:0; padding-bottom:15px; padding-right: 55px; padding-left: 40px;">
    <span style="font-family: 'futura-pt-condensed',Helvetica,sans-serif; font-style: normal; font-weight: 800 !important; font-size: 50px; line-height: 90%; letter-spacing: -0.02em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:5px;"><?php echo esc_html( $emailFirstName ); ?></span><br>
    <span style="font-family: 'futura-pt-condensed',Helvetica,sans-serif; font-style: normal; font-weight: 800 !important; font-size: 50px; line-height: 75%; letter-spacing: -0.02em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:20px;"><?php echo esc_html( $emailLastName ); ?></span>
    <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: #1A1A1A; margin-top:25px; margin-bottom:0px;"><?php echo esc_html( $emailposition ); ?></p>
    <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: normal; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: rgba(26, 26, 26, 0.3); margin-top:0; margin-bottom:0px;"><?php echo esc_html( $emailAddress ); ?></p>
    <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: normal; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: rgba(26, 26, 26, 0.3); margin-top:0; margin-bottom:0px;"><?php echo esc_html( $emailcityzip ); ?></p>
  </td>
  <td class="burnhamLogo" style="padding-top:25px; padding-left:55px;">
    <img style="padding-bottom:20px;" src="<?php echo get_theme_file_uri('/resources/images/temp/burnhamLongLogo.png'); ?>">
    <table style="padding-bottom:10px;">
      <tr>
        <td style="padding-right:20px">
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:0px;">Office</p>
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: normal; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: rgba(26, 26, 26, 0.3); margin-top:0; margin-bottom:0px;"><?php echo esc_html( $emailOffice ); ?></p>
        </td>
        <td style="padding-right:20px">
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:0px;">Fax</p>
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: normal; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: rgba(26, 26, 26, 0.3); margin-top:0; margin-bottom:0px;"><?php echo esc_html( $emailFax ); ?></p>
        </td>
        <td>
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:0px;">Website</p>
          <p style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: normal; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: rgba(26, 26, 26, 0.3); margin-top:0; margin-bottom:0px;">
            <a style="text-decoration:none; color: rgba(26, 26, 26, 0.3);" href="https://burnhamlaw.com">burnhamlaw.com</a>
          </p>
        </td>
      </tr>
    </table>
    <table>
      <tr style="margin:0; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; color: #1A1A1A; margin-top:0; margin-bottom:0px;"><td style="width:200px;">Please Follow Us</td></tr>
    </table>
    <table>
      <tr>
        <td style="border-right:2px solid rgba(26,26,26,.3); padding-right:20px; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; margin-top:0; margin-bottom:0px;">
          <a style="text-decoration:none !important; color: rgba(26, 26, 26, 0.2) !important;"  href="https://www.instagram.com/burnhamlaw/">Instagram</a>
        </td>
        <td style="border-right:2px solid rgba(26,26,26,.3); padding-left:20px; padding-right:20px; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; margin-top:0; margin-bottom:0px;">
          <a style="text-decoration:none !important; color: rgba(26, 26, 26, 0.2) !important;" href="https://www.facebook.com/burnhamlaw/">Facebook</a>
        </td>
        <td style="border-right:2px solid rgba(26,26,26,.3); padding-left:20px; padding-right:20px; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; margin-top:0; margin-bottom:0px;">
          <a style="text-decoration:none !important; color: rgba(26, 26, 26, 0.2) !important;" href="https://www.linkedin.com/organization-guest/company/the-burnham-law-firm-pc">LinkedIn</a>
        </td>
        <td style="padding-left:20px; font-family: 'futura-pt-condensed',Helvetica,Arial,sans-serif; font-style: normal; font-weight: bold; font-size: 14px; line-height: 130%; letter-spacing: .01em; text-transform: uppercase; margin-top:0; margin-bottom:0px;">
          <a style="text-decoration:none !important; color: rgba(26, 26, 26, 0.2) !important;" href="https://www.spreaker.com/show/deep-bench-with-todd-burnham">Podcast</a>
        </td>
      </tr>
    </table>
  </td>
</tr>
</table>

</td>
</tr>
</table>
<?php } ?>
</body>
</html>
