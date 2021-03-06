<?php
/*
$Id: affiliate_banners_banners.tpl.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
?>
<!-- body_text //-->
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '4'); ?></td>
      </tr>
      <tr>
        <td class="productinfo_header">
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
              <td align="right"> </td>
            </tr>
            <tr>
              <td colspan=2 class="main"><?php echo TEXT_INFORMATION; ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td>
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
<?php
  if (tep_db_num_rows($affiliate_banners_values)) {

    while ($affiliate_banners = tep_db_fetch_array($affiliate_banners_values)) {
      $prod_id = $affiliate_banners['affiliate_products_id'];
      $cat_id = $affiliate_banners['affiliate_category_id'];
      $ban_id = $affiliate_banners['affiliate_banners_id'];
      
	  switch (AFFILIATE_KIND_OF_BANNERS) {
        case 1: // Link to Products
          if ($prod_id < 1 & $cat_id < 1) {
            $link = '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_DEFAULT . '?ref=' . $affiliate_id . '&amp;affiliate_banner_id=' . $ban_id . '" target="_blank"><img src="' . HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'banners/' . $affiliate_banners['affiliate_banners_image'] . '" border="0" alt="' . $affiliate_banners['affiliate_banners_title'] . '"></a>';
            $link1 = '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_DEFAULT . '?ref=' . $affiliate_id . '&amp;affiliate_banner_id=' . $ban_id . '" target="_blank"><img src="' . HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'banners/' . $affiliate_banners['affiliate_banners_image'] . '" border="0" alt="' . $affiliate_banners['affiliate_banners_title'] . '"></a>';
          }
          break;
        
		case 2: // Link to Products
          if ($prod_id < 1 & $cat_id < 1) {
            $link = '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_DEFAULT . '?ref=' . $affiliate_id . '&amp;affiliate_banner_id=' . $ban_id . '" target="_blank"><img src="' . HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'banners/' . $affiliate_banners['affiliate_banners_image'] . '" border="0" alt="' . $affiliate_banners['affiliate_banners_title'] . '"></a>';
            $link1 = '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_DEFAULT . '?ref=' . $affiliate_id . '&amp;affiliate_banner_id=' . $ban_id . '" target="_blank"><img src="' . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_AFFILIATE_SHOW_BANNER . '?ref=' . $affiliate_id . '&affiliate_banner_id=' . $ban_id . '" border="0" alt="' . $affiliate_banners['affiliate_banners_title'] . '"></a>';
          }
          break;
      } // end switch

      if ($prod_id < 1 & $cat_id < 1) { ?>
            <tr>
              <td>
                <table width="100%" align="center" border="0" cellpadding="4" cellspacing="0" class="infoBoxContents">
                  <tr>
                    <td class="infoBoxHeading"><?php echo TEXT_AFFILIATE_NAME; ?> <?php echo $affiliate_banners['affiliate_banners_title']; ?></td>
                  </tr>
                  <tr>
                    <td class="smallText" align="center"><?php echo $link; ?></td>
                  </tr>
                  <tr>
                    <td class="smallText"><?php echo TEXT_AFFILIATE_INFO; ?></td>
                  </tr>
                  <tr>
                    <td class="smallText" align="center"><textarea cols="60" rows="4" class="boxText"><?php echo $link; ?></textarea> </td> 
                  </tr>
                </table>
                <?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?>
              </td>
            </tr>
<?php } // end if ($prod_id < 1 & $cat_id < 1)
   } // end while
} // end if (tep_db_num_rows($affiliate_banners_values))
?>
          </table>
        </td>
      </tr>
    </table>
<!-- body_text_eof //-->