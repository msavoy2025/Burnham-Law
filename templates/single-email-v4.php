<?php
/*
Template Name: Email V4
Template Post Type: crb_email
*/
?>
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
      font-weight:bold !important;
    }

    a {text-decoration:none !important;}

    span {text-decoration:none !important;}

  </style>
<?php

$emailPronoun = carbon_get_the_post_meta('crb_email_pronoun');
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left">
      <table width="360" border="0" cellspacing="0" cellpadding="0">
        <!-- Header -->
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="font-size: 0pt; line-height: 0pt; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 30px; padding-bottom: 30px;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="img" width="70" valign="top" style="font-size:0pt; line-height:0pt; text-align:left; vertical-align: top;">
                        <a href="https://burnhamlaw.com/" target="_blank"><img src="<?php echo get_theme_file_uri('/resources/images/logos/logo_v4.png'); ?>" width="70" height="67" border="0" alt="" /></a>
                      </td>
                      <td class="img" width="15"></td>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td style="font-size: 20px; line-height: 26px; color: #242424; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; padding-bottom: 5px;">
                              <strong><?php echo esc_html( $emailFirstName ); ?></strong>
                              <strong><?php echo esc_html( $emailLastName ); ?></strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12px; letter-spacing: 1px; line-height: 16px; color: #a6a6a6; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; padding-bottom: 0px;">
                              <?php echo esc_html( $emailposition ); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12px; letter-spacing: 1px; line-height: 16px; color: #a6a6a6; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; padding-bottom: 20px;">
                              <?php echo esc_html( $emailPronoun ); ?>
                            </td>
                          </tr>
                          <tr>
                            <td class="pb-20" style="padding-bottom: 20px;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td style="padding-bottom: 0px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="70" style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #000001; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase;">
                                          Office
                                        </td>
                                        <td class="img" width="10"></td>
                                        <td style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #a6a6a6; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase;">
                                          <a href="tel:<?php echo esc_html( $emailOffice ) ?>" target="_blank" class="link c-grey" style="text-decoration:none; color:#a6a6a6;"><span class="link c-grey" style="text-decoration:none; color:#a6a6a6;"><?php echo esc_html( $emailOffice ) ?></span></a>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding-bottom: 0px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="70" style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #000001; font-family: Arial, sans-serif; text-align: left; min-width: auto !important; text-transform: uppercase; font-weight: bold;">
                                          Fax
                                        </td>
                                        <td class="img" width="10"></td>
                                        <td style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #a6a6a6; font-family: Arial, sans-serif; text-align: left; min-width: auto !important; text-transform: uppercase; font-weight: bold;">
                                          <a href="tel:<?php echo esc_html( $emailFax ) ?>" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;"><?php echo esc_html( $emailFax ) ?></span></a>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="70" style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #000001; font-family: Arial, sans-serif; text-align: left; min-width: auto !important; text-transform: uppercase; font-weight: bold;">
                                          Website
                                        </td>
                                        <td class="img" width="10"></td>
                                        <td style="font-size: 12px; line-height: 20px; letter-spacing: 1px; line-height: 16px; color: #a6a6a6; font-family: Arial, sans-serif; text-align: left; min-width: auto !important; text-transform: uppercase; font-weight: bold; font-weight: normal;">
                                          <a href="https://burnhamlaw.com/" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;">Burnhamlaw.com</span></a>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12px; color: #a6a6a6; line-height: 20px; letter-spacing: 1px; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; font-weight: bold; padding-bottom: 5px;">
                              <span style="color: #000001;">Location</span> <br />
                            </td>
                          </tr>

                          <tr>
                            <td style="font-size: 12px; color: #a6a6a6; line-height: 14px; letter-spacing: 1px; font-family: Arial, sans-serif; text-align: left; font-weight: normal; min-width: auto !important; text-transform: uppercase; font-weight: bold; padding-bottom: 0px;">
                              <span><?php echo esc_html( $emailAddress ) ?></span>
                            </td>
                          </tr>

                          <tr>
                            <td style="font-size: 12px; color: #a6a6a6; line-height: 14px; letter-spacing: 1px; font-family: Arial, sans-serif; text-align: left; font-weight: normal; min-width: auto !important; text-transform: uppercase; font-weight: bold; padding-bottom: 20px;">
                              <span><?php echo esc_html( $emailcityzip ) ?></span>
                            </td>
                          </tr>


                          <tr>
                            <td style="padding-bottom: 20px;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td style="font-size: 12px; color: #a6a6a6; line-height: 20px; letter-spacing: 1px; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; font-weight: bold;">
                                    <span style="color: #000001;">follow us</span>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 11px; color: #a6a6a6; line-height: 20px; letter-spacing: 1px; font-family: Arial, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; font-weight: bold; padding-bottom: 20px;">
                                    <a href="https://www.instagram.com/burnhamlaw/" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;">Instagram</span></a> | <a href="https://www.facebook.com/burnhamlaw/" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;">Facebook</span></a> </br> <a href="https://www.linkedin.com/company/the-burnham-law-firm-pc/?viewAsMember=true" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;">LinkedIn</span></a> | <a href="https://www.youtube.com/channel/UCarQ4AOCgqJafMrV3wJbpvQ" target="_blank" class="link" style="color: #a6a6a6; text-decoration: none;"><span class="link" style="color: #a6a6a6; text-decoration: none;">Youtube</span></a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!-- END Header -->
      </table>
    </td>
  </tr>
</table>

</body>
</html>
