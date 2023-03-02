<?php
/*
Template Name: Email V2
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left">
      <table width="350" border="0" cellspacing="0" cellpadding="0">
        <!-- Header -->
        <tr>
          <td class="img px-45 pt-34 pb-37" style="font-size: 0pt; line-height: 0pt; text-align: left; padding-left: 45px; padding-right: 45px; padding-top: 34px; padding-bottom: 37px; border: 2px solid #191919;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="img pb-40" style="font-size:0pt; line-height:0pt; text-align:left; padding-bottom: 40px;">
                  <a href="https://burnhamlaw.com/" target="_blank"><img src="<?php echo get_theme_file_uri('/resources/images/temp/burnhamLongLogo.png'); ?>" width="158" height="40" border="0" alt="" /></a>
                </td>
              </tr>
              <tr>
                <td class="img" style="font-size:0pt; line-height:0pt; text-align:left;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="img_box" style="font-size:0pt; line-height:0pt; text-align:left;">
                        <img class="personalImage" src="<?php echo $image ?>" width="82" height="99" border="0" alt="" onerror="this.style.display='none'" style="padding-right:17px;"/>
                      </td>
                      <td class="img_box" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                      <td class="img title_name" style="font-size:0pt; line-height:0pt; text-align:left;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="title-43 ttu" style="font-size: 36px; line-height: 36px; color: #191918; font-family: Arial, Georgia, sans-serif; text-align: left; font-weight: bold; min-width: auto !important; text-transform: uppercase; padding-left: 5px;">
                              <strong><?php echo esc_html( $emailFirstName ); ?></strong><br/>
                              <strong><?php echo esc_html( $emailLastName ); ?></strong>
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

        <!-- Footer -->
        <tr>
          <td class="img px-45 pt-39 pb-39" bgcolor="#191919" style="font-size:0pt; line-height:0pt; text-align:left; padding-left: 45px; padding-right: 45px; padding-top: 39px; padding-bottom: 39px; background-color:#191919;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="text-14 ttu pb-21" style="font-size:10px; line-height:15px; letter-spacing:1px; color:#b5b5b5; font-family:Arial, sans-serif; text-align:left; min-width:auto !important; font-weight:bold; text-transform:uppercase; padding-bottom: 21px;">
                  <strong>
                    <span class="c-white" style="color:#ffffff;"><?php echo esc_html( $emailposition ); ?></span> <br />
										<?php echo esc_html( $emailAddress ) ?> <br />
										<?php echo esc_html( $emailcityzip ) ?>
                  </strong>
                </td>
              </tr>
              <tr>
                <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="img" valign="top" width="135" style="font-size:0pt; line-height:0pt; text-align:left;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="text-14 ttu pb-21" style="font-size:10px; line-height:15px; letter-spacing:1px; color:#b5b5b5; font-family:Arial, sans-serif; text-align:left; min-width:auto !important; font-weight:bold; text-transform:uppercase; padding-bottom: 21px;">
                              <strong style="font-weight: 800;">
                                <span class="c-white" style="color:#ffffff; font-weight: 800;">Office </span> <br />
                                <a href="tel:<?php echo esc_html( $emailOffice ) ?>" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><?php echo esc_html( $emailOffice ) ?></span></a>
                              </strong>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="img" valign="top" style="font-size:0pt; line-height:0pt; text-align:left;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="text-14 ttu pb-21" style="font-size:10px; line-height:15px; letter-spacing:1px; color:#b5b5b5; font-family:Arial, sans-serif; text-align:left; min-width:auto !important; font-weight:bold; text-transform:uppercase; padding-bottom: 21px;">
                              <strong style="font-weight: 800;">
                                <span class="c-white" style="color:#ffffff; font-weight: 800;">Fax</span> <br />
                                <a href="tel:<?php echo esc_html( $emailFax ) ?>" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><?php echo esc_html( $emailFax ) ?></span></a>
                              </strong>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="text-14 ttu pb-21" style="font-size:10px; line-height:15px; letter-spacing:1px; color:#b5b5b5; font-family:Arial, sans-serif; text-align:left; min-width:auto !important; font-weight:bold; text-transform:uppercase; padding-bottom: 21px;">
                  <strong style="font-weight: 800;">
                    <span class="c-white" style="color:#ffffff; font-weight: 800;">Website</span> <br />
                    <a href="https://www.burnhamlaw.com" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;">Burnhamlaw.com</span></a>
                  </strong>
                </td>
              </tr>
              <tr>
                <td class="text-14 ttu" style="font-size:10px; line-height:15px; letter-spacing:1px; color:#b5b5b5; font-family:Arial, sans-serif; text-align:left; min-width:auto !important; font-weight:bold; text-transform:uppercase; font-weight: 800;">
                  <strong style="font-weight: 800;">
                    <span class="c-white" style="color:#ffffff; font-weight: 800;">please follow us</span> <br />
                    <a href="https://www.instagram.com/burnhamlaw/" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;">Instagram</span></a>&nbsp; | &nbsp;<a href="https://www.facebook.com/burnhamlaw/" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;">Facebook</span></a>&nbsp; | &nbsp;<a href="https://www.linkedin.com/company/the-burnham-law-firm-pc/?viewAsMember=true" target="_blank" class="link c-grey" style="text-decoration:none; color:#b5b5b5;"><span class="link c-grey" style="text-decoration:none; color:#b5b5b5;">LinkedIn</span></a>
                  </strong>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!-- END Footer -->
      </table>
    </td>
  </tr>
</table>
</body>
</html>
