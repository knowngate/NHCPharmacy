<?php
/*
$Id: catalog_products_with_images.php 1857 2012-06-20 01:21:38Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

/*
  notes: added to the catalog/includes/languages/english.php 
  define('IMAGE_BUTTON_UPSORT', 'Sort Asending');
  define('IMAGE_BUTTON_DOWNSORT', 'Sort Desending');
*/

// Most of this file is changed or moved to BTS - Basic Template System - format.
// For adding in contribution or modification - parts of this file has been moved to: catalog\templates\fallback\contents\<filename>.tpl.php as a default (sub 'fallback' with your current template to see if there is a template specife change).
//       catalog\templates\fallback\contents\<filename>.tpl.php as a default (sub 'fallback' with your current template to see if there is a template specife change).
// (Sub 'fallback' with your current template to see if there is a template specific file.)

  require('includes/application_top.php');

  require(bts_select('language', FILENAME_CATALOG_PRODUCTS_WITH_IMAGES));

  // Use $location if you have a pre breadcrumb release of OSC then comment out $breadcrumb line
  //$location = ' &raquo; <a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, '', 'NONSSL') . '" class="headerNavigation">' . NAVBAR_TITLE . '</a>';

  // Use $breadcrumb if you have a breadcrumb release of OSC then comment out $location line
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, '', 'NONSSL'));

  $content = CONTENT_PRINTABLE_CATALOG;

  include (bts_select('main')); // BTSv1.5

  require(DIR_WS_INCLUDES . 'application_bottom.php');
   
?>