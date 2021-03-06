<?php
/*
$Id: currencies.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

////
// Class to handle currencies
// TABLES: currencies
  class currencies {
    var $currencies;

// class constructor
    function currencies() {
      $this->currencies = array();
      $currencies_query = tep_db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . TABLE_CURRENCIES);
      while ($currencies = tep_db_fetch_array($currencies_query)) {
        $this->currencies[$currencies['code']] = array('title' => $currencies['title'],
                                                       'symbol_left' => $currencies['symbol_left'],
                                                       'symbol_right' => $currencies['symbol_right'],
                                                       'decimal_point' => $currencies['decimal_point'],
                                                       'thousands_point' => $currencies['thousands_point'],
                                                       'decimal_places' => $currencies['decimal_places'],
                                                       'value' => $currencies['value']);
      }
    }

// class methods
    function format($number, $calculate_currency_value = true, $currency_type = '', $currency_value = '') {
      global $currency;

      if (empty($currency_type)) $currency_type = strtoupper($currency);

      if ($calculate_currency_value == true) {
        $rate = (tep_not_null($currency_value)) ? $currency_value : $this->currencies[$currency_type]['value'];
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format(tep_round($number * $rate, $this->currencies[$currency_type]['decimal_places']), $this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$currency_type]['thousands_point']) . $this->currencies[$currency_type]['symbol_right'];
      } else {
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format(tep_round($number, $this->currencies[$currency_type]['decimal_places']), $this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$currency_type]['thousands_point']) . $this->currencies[$currency_type]['symbol_right'];
      }

// BOF: MOD - Down for Maintenance
      if (DOWN_FOR_MAINTENANCE=='true' and DOWN_FOR_MAINTENANCE_PRICES_OFF=='true') {
        $format_string= '';
      }
// EOF: MOD - Down for Maintenance

      return $format_string;
    }

    function calculate_price($products_price, $products_tax, $quantity = 1) {
      global $currency;

      return tep_round(tep_add_tax($products_price, $products_tax), $this->currencies[$currency]['decimal_places']) * $quantity;
    }

    function is_set($code) {
      if (isset($this->currencies[$code]) && tep_not_null($this->currencies[$code])) {
        return true;
      } else {
        return false;
      }
    }

    function get_value($code) {
      return $this->currencies[$code]['value'];
    }

    function get_decimal_places($code) {
      return $this->currencies[$code]['decimal_places'];
    }

    function display_price($products_price, $products_tax, $quantity = 1) {
      // BOF: MOD - EASY CALL FOR PRICE v1.4
	  // return $this->format($this->calculate_price($products_price, $products_tax, $quantity));
	  if ($products_price > CALL_FOR_PRICE_VALUE){
	    return $this->format($this->calculate_price($products_price, $products_tax, $quantity));
	  } else {
	    // You can set CALL_FOR_PRICE_TEXT to anything you want. Its style is determined by the page it is displayed on. Changes made here will be visible throughout your site.
	    return TEXT_CALL_FOR_PRICE;
	    // BOF: MOD - EASY CALL FOR PRICE v1.4
	  }
	}
  }
?>
