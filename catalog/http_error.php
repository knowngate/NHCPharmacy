<?php
/*
$Id: http_error.php 1857 2012-06-20 01:21:38Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
  require('includes/application_top.php');

  require(bts_select('language', FILENAME_HTTP_ERROR));

  $content = http_error; 

  include (bts_select('main')); // BTSv1.5


  require(DIR_WS_INCLUDES . 'application_bottom.php'); 

?>