<?php
/*
$Id: authorizenet_cc_aim.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_TITLE', 'Authorize.net Credit Card AIM');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_PUBLIC_TITLE', 'Credit Card (Processed by Authorize.net)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_DESCRIPTION', '<img src="images/icons/icon_popup.gif" border="0" alt="">&nbsp;<a href="https://www.cdgcommerce.com/internet-services.php?R=1017" target="_blank" style="text-decoration: underline; font-weight: bold;">Get an Authorize.net account</a>');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_OWNER', 'Credit Card Owner:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_NUMBER', 'Credit Card Number:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_EXPIRES', 'Credit Card Expiry Date:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_CVC', 'Credit Card Check Number (CVC):');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_TITLE', 'There has been an error processing your credit card');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_GENERAL', 'Please try again and if problems persist, please try another payment method.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_DECLINED', 'This credit card transaction has been declined. Please try again and if problems persist, please try another credit card or payment method.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_INVALID_EXP_DATE', 'The credit card expiration date is invalid. Please check the card information and try again.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_EXPIRED', 'The credit card has expired. Please try again with another card or payment method.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_CVC', 'The credit card check number (CVC) is invalid. Please check the card information and try again.');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AMEX', 'American Express');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_VISA', 'Visa');
?>