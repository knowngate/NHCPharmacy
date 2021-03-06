<?php
/*
$Id: wishlist.php 1857 2012-06-20 01:21:38Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_WISHLIST', 'My Wish List');
define('NAVBAR_TITLE', 'Wish List');
define('NAVBAR_TITLE_1', 'Wish List');
define('HEADING_TITLE', 'My Wish List');
define('HEADING_TITLE2', '\'s Wish List contains:');

define('TEXT_NAME', 'Name: ');
define('TEXT_EMAIL', 'Email: ');
define('TEXT_YOUR_NAME', 'Your Name: ');
define('TEXT_YOUR_EMAIL', 'Your Email: ');
define('TEXT_MESSAGE', 'Message: ');
define('TEXT_ITEM_IN_CART', 'Item in Cart');
define('TEXT_ITEM_NOT_AVAILABLE', 'Item no longer available');
define('TEXT_DISPLAY_NUMBER_OF_WISHLIST', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> items on your Wish List.)');
define('WISHLIST_EMAIL_TEXT', 'If you would like to email your Wish List to multiple friends or family, just enter their names and emails in each row.  You don\'t have to fill every box, you can just fill in for however many people you want to email your Wish List link to.  Then fill out a short message you would like to include with your email in the text box provided.  This message will be added to all the emails you send.');
define('WISHLIST_EMAIL_TEXT_GUEST', 'If you would like to email your Wish List to multiple friends or family, just enter their name\'s and email\'s in each row.  You don\'t have to fill every box up, you can just fill in for however many people you want to email your Wish List link to.  Then fill out a short message that you would like to include in with your email in the text box provided.  This message will be added to all the emails you send.');
// Customers name will be automatically added to the beginning of this and store name to the end.
define('WISHLIST_EMAIL_SUBJECT', 'has sent you their Wish List from ');  
define('WISHLIST_SENT', 'Your Wish List has been sent.');
define('WISHLIST_EMAIL_LINK', '

$from_name\'s public Wish List is located here:
$link

Thank you,'); //$from_name = Customers name  $link = public wishlist link

define('WISHLIST_EMAIL_GUEST', 'Thank you,');

define('ERROR_YOUR_NAME' , 'Please enter your Name.');
define('ERROR_YOUR_EMAIL' , 'Please enter your Email.');
define('ERROR_VALID_EMAIL' , 'Please enter a valid email address.');
define('ERROR_ONE_EMAIL' , 'You must include at least one name and email.');
define('ERROR_ENTER_EMAIL' , 'Please enter an email address.');
define('ERROR_ENTER_NAME' , 'Please enter the email recipients name.');
define('ERROR_MESSAGE', 'Please include a brief message.');

define('WISHLIST_SECURITY_CHECK', 'Please complete this security question: ');
define('WISHLIST_SECURITY_CHECK_ERROR', 'The Security Check code wasn\'t typed correctly. Try again.');
define('CLEAR_WISHLIST', 'Are you sure you want to clear your entire wishlist?');

define('IMAGE_CLEAR_WISHLIST', 'Clear Wishlist');
define('IMAGE_DELETE_WISHLIST', 'Delete From Wishlist');

define('WISHLIST_NO_CHECKBOX_SELECTED_BUY', 'Please select the checkbox next to the product you wish to add from your Wish List.');
define('WISHLIST_NO_CHECKBOX_SELECTED_DELETE', 'Please select the checkbox next to the product you wish to delete from your Wish List.');
?>