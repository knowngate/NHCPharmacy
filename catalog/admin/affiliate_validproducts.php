<?php
/*
$Id: affiliate_validproducts.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_AFFILIATE_BANNERS);

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="templates/fallback/stylesheet.css">
<head>
<body>
<table width="580" class="infoBox">
<tr>
<td colspan="2" class="infoBoxHeading"><?php echo TEXT_VALID_PRODUCTS_LIST; ?></td>
</tr>
<?php
    echo "<tr><td><b>". TEXT_VALID_PRODUCTS_ID . "</b></td><td><b>" . TEXT_VALID_PRODUCTS_NAME . "</b></td></tr><tr>";
    $result = mysql_query("SELECT * FROM products, products_description WHERE products.products_id = products_description.products_id and products_description.language_id = '" . $languages_id . "' ORDER BY products_description.products_name");
    if ($row = mysql_fetch_array($result)) {
        do {
            echo "<td class='infoBoxContents'>&nbsp;".$row["products_id"]."</td>\n";
            echo "<td class='infoBoxContents'>".$row["products_name"]."</td>\n";
            echo "</tr>\n";
        }
        while($row = mysql_fetch_array($result));
    }
    echo "</table>\n";
?>
<p class="smallText" align="right"><?php echo '<a href="javascript:window.close()">' . TEXT_CLOSE_WINDOW . '</a>'; ?>&nbsp;&nbsp;&nbsp;</p>
<br>
</body>
</html>
<?php require('includes/application_bottom.php'); ?>