<?php
/*
$Id: downloads_controller.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

////
// BOF: WebMakers.com Added: configuration key value lookup
  function tep_get_configuration_key_value($lookup) {
    $configuration_query_raw= tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key='" . $lookup . "'");
    $configuration_query= tep_db_fetch_array($configuration_query_raw);
    $lookup_value= $configuration_query['configuration_value'];
    return $lookup_value;
  }
// EOF: WebMakers.com Added: configuration key value lookup

?>
