<?php
/*
$Id: catalog_products_with_images.tpl.php 1857 2012-06-20 01:21:38Z michael.oscmax@gmail.com $

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
          <td class="main">
		  <?php 
		  echo STORE_NAME . '<br>' . nl2br(STORE_NAME_ADDRESS) . '<br>';
		  echo TEXT_EMAIL . '<a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . '</a><br><br>';
		  echo TEXT_SUBJECT_TO_CHANGE;
		  if (PRODUCT_LIST_CATALOG_CURRENCY == 'show') { 
		    require(DIR_WS_BOXES . 'currencies.php'); 
		  }
		  ?></td>
        </tr>
      </table>
    </td>
  </tr>    
  <tr>
    <td>
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top">
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
            <?php
	        if (isset($_GET['listing'])) { 
	  	      $listing = $_GET['listing'];
	        }
		  
            switch ($listing) {
              case "image":
              $order = "p.products_image,";
              break;
              case "image-desc":
              $order = "p.products_image DESC";
              break;
              case "name":
              $order = "pd.products_name, cd.categories_name";
              break;
              case "name-desc":
              $order = "pd.products_name DESC, cd.categories_name";
              break;
              case "categories":
              $order = "cd.categories_name, pd.products_name";
              break;
              case "categories-desc":
              $order = "cd.categories_name DESC, pd.products_name";
              break;
              case "products_description":
              $order = "pd.products_name, pd.products_description";
              break;
              case "products_description-desc":
              $order = "pd.products_name DESC, pd.products_description";
              break;
              case "model":
              $order = "p.products_model";
              break;
              case "model-desc":
              $order = "p.products_model DESC";
              break;
              case "upc":
              $order = "p.products_upc";
              break;
              case "upc-desc":
              $order = "p.products_upc DESC";
              break;
              case "quantity":
              $order = "p.products_quantity, pd.products_name";
              break;
              case "quantity-desc":
              $order = "p.products_quantity DESC, pd.products_name";
              break;
              case "weight":
              $order = "p.products_weight, pd.products_name";
              break;
              case "weight-desc":
              $order = "p.products_weight DESC, pd.products_name";
              break;
              case "price":
              $order = "p.products_price, pd.products_name";
              break;
              case "price-desc":
              $order = "p.products_price DESC, pd.products_name";
              break;
              case "manufacturers":
              $order = "m.manufacturers_name, pd.products_name";
              break;
              case "manufacturers-desc":
              $order = "m.manufacturers_name DESC, pd.products_name";
              break;
              case "date":
              $order = "p.products_date_added, pd.products_name";
              break;
              case "date-desc":
              $order = "p.products_date_added DESC, pd.products_name";
              break;
		    default:
              $order = "cd.categories_name, pd.products_name";
            }
            ?>
              <tr>
                <td valign="top">
                  <table border="0" width="100%" cellspacing="0" cellpadding="2" class="productListing-list">
                    <tr>
<?php
   $count_rows=0;
   if (PRODUCT_LIST_CATALOG_IMAGE == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_IMAGES; ?></td>
			            </tr>
			          </table>
				    </td>
<?php }
  if (PRODUCT_LIST_CATALOG_OPTIONS == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_OPTIONS; ?></td>
			            </tr>
			          </table>
				    </td>
<?php }
  if (PRODUCT_LIST_CATALOG_DATE == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="middle"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=date-asc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=date-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_DATE; ?></td>
			            </tr>
			          </table>
				    </td>
<?php }
  if (PRODUCT_LIST_CATALOG_MANUFACTURERS == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=manufacturers', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=manufacturers-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT) . '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_MANUFACTURERS; ?></td>
			            </tr>
			          </table>
				    </td>

<?php }
  if (PRODUCT_LIST_CATALOG_NAME == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=name', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=name-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT) . '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_PRODUCTS; ?></td>
			            </tr>
			          </table>
			        </td>
<?php }
  if (PRODUCT_LIST_CATALOG_DESCRIPTION == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
		    	      <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=products_description', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=products_description-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_DESCRIPTION; ?></td>
			            </tr>
			          </table>
				    </td>

<?php }
  if (PRODUCT_LIST_CATALOG_CATEGORIES == 'show') {
		  $count_rows++;
?>
                    <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=categories', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=categories-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_CATEGORIES; ?></td>
			            </tr>
			          </table>
				    </td>
<?php }
   if (PRODUCT_LIST_CATALOG_MODEL == 'show') {
		  $count_rows++;
?>
		            <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=model', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=model-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_MODEL; ?></td>
			            </tr>
			          </table>
			   	    </td>
<?php }
   if (PRODUCT_LIST_CATALOG_UPC == 'show') {
		  $count_rows++;
?>
		            <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=upc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=upc-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
			              <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_UPC; ?></td>
			            </tr>
			          </table>
				    </td>
<?php }
   if (PRODUCT_LIST_CATALOG_QUANTITY == 'show') {
		  $count_rows++;
?>
		            <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
		  	            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=quantity', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=quantity-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
                          <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_QUANTITY; ?></td>
			            </tr>
			          </table>
			        </td>
<?php }
   if (PRODUCT_LIST_CATALOG_WEIGHT == 'show') {
		  $count_rows++;
?>
		            <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=weight', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=weight-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
                          <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_WEIGHT; ?></td>
			            </tr>
			          </table>
			        </td>
<?php }
   if (PRODUCT_LIST_CATALOG_PRICE == 'show') {
		  $count_rows++;
?>
		            <td class="productListing-heading" align="center">
			          <table border="0" cellspacing="0" cellpadding="2">
			            <tr>
			              <td width="15" align="right" valign="bottom"><?php echo '<a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=price', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'up_off.png', IMAGE_BUTTON_UPSORT) . '</a><a href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES , 'listing=price-desc', 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'down_off.png', IMAGE_BUTTON_DOWNSORT). '</a>'?></td>
                          <td align="left" class="productListing-heading"><?php echo TABLE_HEADING_PRICE; ?></td>
			            </tr>
			          </table>
	 		        </td>
<?php
  }
?>
                  </tr>

<?php
  if (strlen($listing)>0) { $sort = $listing; } else { $sort = ""; }
  if ($_GET['page'] > 1) {
          $rows = $_GET['page'] * 20 - 20;
          $page = $_GET['page'];
  }
  if ($_GET['page']<= 0) ($page --);
  if ($_GET['page']== 1) ($page ++);
  if ($page <=0 ) $page = 1;

    $customers_group_id = '0';
  if (PRODUCT_LIST_CUSTOMER_DISCOUNT == 'show') {
    if(tep_session_is_registered('sppc_customer_group_id')) {
      $customers_group_id = $sppc_customer_group_id;
    }
  }
// This query can be used if you use the UPC Mod and want to have the catalog display UPC numbers as well
//$products_query_raw = "select distinct p.products_id, p.products_image, p.products_model, p.products_upc, p.products_quantity, p.products_weight, pd.products_name, p.manufacturers_id, p.products_price, p.products_date_added, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price, m.manufacturers_name, pd.products_description, cd.categories_name, p.products_tax_class_id, p2c.categories_id from  " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_CATEGORIES_DESCRIPTION . " cd on p2c.categories_id = cd.categories_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . $languages_id . "' and cd.language_id = '" . $languages_id . "' order by $order";
  $products_query_raw = "select distinct p.products_id, p.products_image, p.products_model, p.products_quantity, p.products_weight, pd.products_name, p.manufacturers_id, IF(pg.customers_group_price IS NOT NULL, pg.customers_group_price, p.products_price) as products_price, p.products_date_added, IF(s.status = 1, s.specials_new_products_price, NULL) as final_price, m.manufacturers_name, pd.products_description, cd.categories_name, p.products_tax_class_id, p2c.categories_id from " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . TABLE_PRODUCTS_GROUPS . " pg on pg.products_id = pd.products_id and pg.customers_group_id = '" . $customers_group_id . "', " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id and s.customers_group_id = '" . $customers_group_id . "', " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_CATEGORIES_DESCRIPTION . " cd on p2c.categories_id = cd.categories_id where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . $languages_id . "' and cd.language_id = '" . $languages_id . "' order by $order";
  $products_query = tep_db_query($products_query_raw);
 //Discount used for Customer Discount Mod
//  if (PRODUCT_LIST_CUSTOMER_DISCOUNT == 'show') {
//  $discount = mysql_result(mysql_query("select customer_discount from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'"), 0 , 0);
//  }
// Number of products to display per page
  $limit = mysql_result(mysql_query("SELECT configuration_value from  " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_LIST_CATALOG_PERPAGE'"), 0 , 0);
 //Number of text in the products description - not working yet
  $description_length = mysql_result(mysql_query("SELECT configuration_value from  " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_LIST_DESCRIPTION_LENGTH'"), 0 , 0);
  $totalrows = mysql_num_rows($products_query);
  if (empty($page)) { $page = 1; }
  $limitvalue = $page * $limit - ($limit);
  $query = $products_query_raw . " LIMIT $limitvalue, $limit";
  $result = tep_db_query($query);
  if(mysql_num_rows($result) == 0)
        echo("Nothing to Display!");

  while($products = tep_db_fetch_array($result)) {
    $rows++;

    if (strlen($rows) < 2) {
      $rows = '0' . $rows;
    }
 ?>

                  <tr>

<?php if (PRODUCT_LIST_CATALOG_IMAGE == 'show') { ?>
                    <td class="productListing-data-list" align="center"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . $products['products_id'], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . DYNAMIC_MOPICS_THUMBS_DIR . $products['products_image'], $products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>'; ?>&nbsp;</td>
<?php } ?>

<?php if (PRODUCT_LIST_CATALOG_OPTIONS == 'show') { ?>
                    <td class="productListing-data-list" align="left">
<?php
    // Get the options:
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $products['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
      $opt_x = 0;
      $opt_y = 0;
	  $max_y = 0;
      unset($products_options_array);
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $products['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'");
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
        $opt_y = 0;
        $products_options_array[$opt_x][0]= $products_options_name['products_options_name'];
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . $products['products_id'] . "' and pa.options_id = '" . $products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . $languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $opt_y++;
					if ($opt_y > $max_y) $max_y = $opt_y;
 				  $products_option_name=$products_options['products_options_values_name'];
          if ($products_options['options_values_price'] != '0') {
            $produkt_option_name.= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($products['products_tax_class_id'])) .') ';
          } // end if
          $products_options_array[$opt_x][$opt_y] = $products_option_name;
        } // end while
		  $opt_x++;
	  } // end while
	  
?>
	                  <table border="0" cellspacing="0" cellpadding="0">
<?php
      // Start Output:
      $out_x = 0;
      $out_y = 0;

			for ($out_y = 0; $out_y <= $max_y; $out_y++) {
		      echo "<tr>";
			  for ($out_x = 0; $out_x < $opt_x; $out_x++) {
			    echo '<td class="smallText" align="center">' .  $products_options_array[$out_x][$out_y] . '&nbsp;</td>';
		  	  } // end for
			  echo "</tr>";
			} // edn for
?>
				      </table>
<?php

	} // end if ($products_attributes['total'] > 0)
?>
		            </td>
<?php } // end if (PRODUCT_LIST_CATALOG_OPTIONS == 'show') ?>


<?php if (PRODUCT_LIST_CATALOG_DATE == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php
									if (PRODUCT_LIST_CATALOG_DATE_SHOW == 'show') { 
									  echo tep_date_short($products['products_date_added']); 
									} ?>&nbsp;</div></td>
<?php } ?>

<?php if (PRODUCT_LIST_CATALOG_MANUFACTURERS == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . $products['products_id'], 'NONSSL') . '">' . $products['manufacturers_name'] . '</a>'; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_NAME == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . $products['products_id'], 'NONSSL') . '">' . $products['products_name'] . '</a>'; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_DESCRIPTION == 'show') { ?>
                    <td class="productListing-data-list" align="center"><?php echo substr(nl2br($products['products_description']), 0, $description_length); ?>...&nbsp;<?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . $products['products_id'], 'NONSSL') . '"><i>More Info</i>...</a>'; ?></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_CATEGORIES == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT, 'cPath=' . $products['categories_id'], 'NONSSL') . '">' . $products['categories_name'] . '</a>'; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_MODEL == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo $products['products_model']; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_UPC == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo $products['products_upc']; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_QUANTITY == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo $products['products_quantity']; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_WEIGHT == 'show') { ?>
                    <td class="productListing-data-list" align="center"><div align=left><?php echo $products['products_weight']; ?>&nbsp;</div></td>
<?php } ?>
<?php if (PRODUCT_LIST_CATALOG_PRICE == 'show') { ?>
		            <td class="productListing-data-list" align="center"><div align=left><b>
<?php
  if (PRODUCT_LIST_CUSTOMER_DISCOUNT == 'show') {
//  echo $currencies->format($products['final_price']-($products['final_price']*$discount/100));
    echo $currencies->display_price(($products['final_price'] ? $products['final_price'] : $products['products_price']), tep_get_tax_rate($products['products_tax_class_id']));
  }
?></b>&nbsp;</div></td>
<?php } ?>
                  </tr>

<?php
  }
?>
                </table>
              </td>
            </tr>
	        <tr>
	          <td colspan="3" align="right">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
  	                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                  </tr>
                </table>
                <table class="filterbox" width="100%" cellpadding="2" cellspacing="0" border="0">
                  <tr>
                    <td class="smallText" align="right">
<?php
if($page != 1) {
  $pageprev = $page - 1;
  echo '<a class="pageResults" href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, 'listing=' . $sort . '&page=' . $pageprev, 'NONSSL') . '">' . BOX_CATALOG_PREV . '</a> ';
}

//PRODUCT_LIST_PAGEBREAK_NUMBERS_PERPAGE
$displaycount_number = (mysql_result(mysql_query("SELECT configuration_value from  " . TABLE_CONFIGURATION . " WHERE configuration_key = 'PRODUCT_LIST_PAGEBREAK_NUMBERS_PERPAGE'"), 0 , 0)) - 2;
$numofpages = $totalrows / $limit;
// setting both 10s will limit the list to ten page links 20s would set it to display 20 page breaks max.
$displaycount = $numofpages < $displaycount_number ? $numofpages : $displaycount_number;

$startpage = $page > $displaycount / 2 ? floor($page - $displaycount / 2) : 1;


for($i = $startpage; $i <= $startpage + $displaycount; $i++) {
    if($i > $numofpages) {
        break;
    } else
      if($i == $page) {
        if($i>0) echo('<span class="pageResult">' . $i . '</span>&nbsp;'); 
	  } else {
		if($i>0) echo '<a class="pageResults" href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, 'listing=' . $sort . '&page=' . $i, 'NONSSL') . '">' . $i . '</a>&nbsp;';
	}
}

	if(($totalrows % $limit) != 0)
	{

	if($i == $page)

	{
		if($i>0) echo('<span class="pageResult">' . $i . '</span>&nbsp;');
	} else {
		if($i>0) echo '<a class="pageResults" href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, 'listing=' . $sort . '&page=' . $i, 'NONSSL') . '">' . $i . '</a>&nbsp;';
	}
}

if(($totalrows - ($limit * $page)) > 0)
{
	$pagenext = $page + 1;
	echo '<a class="pageResults" href="' . tep_href_link(FILENAME_CATALOG_PRODUCTS_WITH_IMAGES, 'listing=' . $sort . '&page=' . $pagenext, 'NONSSL') . '">' . BOX_CATALOG_NEXT . '</a>&nbsp;';
}
    mysql_free_result($result);
?>
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
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->