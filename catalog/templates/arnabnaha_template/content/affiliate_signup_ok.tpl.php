<?php
/*
$Id: affiliate_signup_ok.tpl.php 1775 2012-04-01 19:13:57Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '4'); ?></td>
  </tr>
  <tr>
    <td class="productinfo_header">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top" class="main"><div align="center" class="pageHeading"><?php echo HEADING_TITLE; ?></div><br><?php echo TEXT_ACCOUNT_CREATED . '<a href="' . tep_href_link(FILENAME_CONTACT_US, 'source=affiliate&amp;enquiry=' . TEXT_AFFILIATE_CONTACT_TEXT) . '">' . TEXT_CONTACT_US; ?>.</a></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
  </tr>
  </tr>
  <tr>
    <td>
      <table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
        <tr class="infoBoxContents">
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_SUMMARY, '', 'SSL') . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>