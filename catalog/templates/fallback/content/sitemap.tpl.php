<?php
/*
$Id: sitemap.tpl.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
?>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '4'); ?></td>
      </tr>
	  <tr>
        <td class="productinfo_header" colspan="3">
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    
        <table width="100%" cellspacing="5" cellpadding="5">
          <tr valign="top">
<?php
  ( defined('FWR_MENU_CACHE_PATH') && constant(FWR_MENU_CACHE_PATH) ? 
  $cachepath = constant(FWR_MENU_CACHE_PATH) : $cachepath = '' );
  if( function_exists('buildSiteMap') && $sitemaptd = buildSiteMap($cachepath, $languages_id) ) {
?>
            <td class="sitemap"><?php echo PHP_EOL . $sitemaptd[0] . PHP_EOL; ?></td>
            <td class="sitemap"><?php echo PHP_EOL . $sitemaptd[1] . PHP_EOL; ?></td>
<?php
  } else {
?> 
            <td class="main"><?php echo TEXT_SITEMAP_UNAVAILABLE; ?></td>
<?php
  }
?>
          </tr>
         </table>
