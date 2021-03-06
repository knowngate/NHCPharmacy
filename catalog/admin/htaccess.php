<?php
/*
$Id: htaccess.php 1775 2012-04-01 19:13:57Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
/*
  Copyright (C) 2007 Google Inc.

/**
 * Google Checkout v1.5.0
 * 
 * .htaccess .htpasswd pair for Google Checkout Basic Authentication on CGI php
 *
 * ChangeLog:
 * v0.2
 * 02-22-2007
 * Add sandbox and checkout account
 * Add check for directory
 * Add cwd or get['url'] to set defaul dir
 * Add file creation
 *
 * v0.1
 * 02-14-2006 st. Valentine's day :D
 * Basic creation of text to paste in files
 *
 * README:
 * 
 * NOTE: This must be used if you run PHP over CGI
 * 
 * Run this script, fill the form with your Google Checkout Merchant Id/Key
 * and with the absolute path to your catalog/googlechekout/ directoy.
 * ie. /home/ropu/public_html/catalog/googlecheckout
 * 
 * Click "Create" button
 * 
 * If you select not to create files, copy the contents for .htaccess 
 * and .htpasswd into those files and place them in that directory.
 * 
 * googlecheckout/responsehandler.php folowing code will be disabled if 
 * CGI config is set to True
 * 
 * 
[CODE]
	//Parse the HTTP header to verify the source.
		if(isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) && isset($HTTP_SERVER_VARS['PHP_AUTH_PW'])) {
		  $compare_mer_id = $HTTP_SERVER_VARS['PHP_AUTH_USER']; 
		  $compare_mer_key = $HTTP_SERVER_VARS['PHP_AUTH_PW'];
		}
		else {
		  error_func("HTTP Basic Authentication failed.\n");
		  exit(1);
		}
		
		if($compare_mer_id != $merchant_id || $compare_mer_key != $merchant_key) {
		  error_func("HTTP Basic Authentication failed.\n");
		  exit(1);
		} 
[/CODE] 
 *
 * Test the responsehandler.php with the responsehandler_test.php
 *
 */
 
  require('includes/application_top.php');
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=<?php echo 'CHARSET'; ?>">
  <title>.htaccess .htpasswd pair for Google Checkout Basic authentication on CGI php installations</title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css"
	href="includes/javascript/jquery-ui-1.8.2.custom.css">
<style type="text/css">
body {
	font-family: Verdana, Arial, sans-serif;
	font-size: 90%;
	text-align: center;
}
table {
	margin: 0 auto;
	text-align: left;
}
.required {
	border: #ff0000 solid 1px;
	margin: 1px;
}
.feedback {
	text-align: left;
}
</style>
	<script language="JavaScript" type="text/javascript">
	  function checkCreate(){
	 		var check = document.getElementById('check');
			var create = document.getElementById('create');
	 		if(check.checked) {
	 			create.disabled = false;
	 		}
	 		else {
	 		  create.disabled = true;
	 		}
	  }
	</script>
</head>
<body>  
<?
require(DIR_WS_INCLUDES . 'header.php'); 

if(isset($_POST['submit'])) {

	$errors = array();
	if(isset($_POST['sb']) && empty($_POST['sb_id'])){
	  $errors[] = "Your SandBox Merchant ID must not by empty";
	}
	if(isset($_POST['sb']) && empty($_POST['sb_key'])){
	  $errors[] = "Your SandBox Merchant KEY must not by empty";
	}
	if(isset($_POST['gc']) && empty($_POST['gc_id'])){
	  $errors[] = "Your Checkout Merchant ID must not by empty";
	}
	if(isset($_POST['gc']) && empty($_POST['gc_key'])){
	  $errors[] = "Your Checkout Merchant KEY must not by empty";
	}
	if(!isset($_POST['sb']) && !isset($_POST['gc'])) {
	  $errors[] = "Select at least SandBox or Checkout Account";
	}
	if(empty($_POST['path']) || (isset($_POST['check']) && !is_dir($_POST['path']))){
	  $errors[] = "The path is not valid";
	}
	if(isset($_POST['create']) && !is_writable($_POST['path'])) {
	  $errors[] = $_POST['path'] . " is NOT writable";
	}
	
	if(empty($errors)) {

		
		$htaccess = 'AuthName "Google checkout Basic Authentication"' . "\n";
		$htaccess .= 'AuthType Basic' . "\n";
		$htaccess .= 'AuthUserFile ' . tep_db_prepare_input(strip_tags($path)) . "/.htpasswd\n";
		$htaccess .= 'require valid-user';
		echo "<xmp>.htaccess file:\n<<<Start---\n";
		echo $htaccess;
		echo "\n---End>>>\n";
		
		$htpasswd = "";
		if(isset($_POST['sb'])) {
			$sb_user = tep_db_prepare_input(strip_tags(@$_POST['sb_id']));
			$sb_pass = tep_db_prepare_input(strip_tags(@$_POST['sb_key']));
			$sb_crypt_pass = rand_salt_crypt($sb_pass);
	
			$htpasswd .= $sb_user . ":" . $sb_crypt_pass ."\n";
		}
		if(isset($_POST['gc'])) {
			$gc_user = tep_db_prepare_input(strip_tags(@$_POST['gc_id']));
			$gc_pass = tep_db_prepare_input(strip_tags(@$_POST['gc_key']));
			$gc_crypt_pass = rand_salt_crypt($gc_pass);
	
			$htpasswd .= $gc_user . ":" . $gc_crypt_pass ."\n";
		}
		if(isset($_POST['path'])) {
			$path = tep_db_prepare_input(strip_tags(@$_POST['path']));
		}

		echo "\n\n.htpasswd file:\n<<<Start---\n";
		echo $htpasswd;
		echo "---End>>>\n</xmp>\n";
		
		if(isset($_POST['create'])){
		  $htaccess_file = fopen($path . "/.htaccess", w);
		  $htpasswd_file = fopen($path . "/.htpasswd", w);
		  fwrite($htaccess_file, $htaccess);
		  fwrite($htpasswd_file, $htpasswd);
		  fclose($htaccess_file);
		  fclose($htpasswd_file);
		  echo "Files Created!<br />";
		}
	}
	else {
	  
	  echo "<table align=center border=0 cellpadding=0 cellspacing=0>\n";
	  echo "<tr><th style='color:red'>Errors:</th><tr>\n";
		foreach($errors as $error){
		  echo "<tr>\n";
		  echo "<td style='color:red'><li>" . $error . "</li></td>\n";
		  echo "</tr>\n";
		}  
		echo "</table>";
//	  print_r($errors);
	}

}

if(!isset($_POST['path']) || empty($_POST['path'])){
  
  chdir("../googlecheckout");
  $_POST['path'] = isset($_GET['url'])?$_GET['url']:tep_db_prepare_input(strip_tags(getcwd()));
  $path = tep_db_prepare_input(strip_tags($_POST['path']));
  
}
// For function rand_salt_crypt()
// .htpasswd file functions
// Copyright (C) 2004,2005 Jarno Elonen <elonen@iki.fi>
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
// * Redistributions of source code must retain the above copyright notice, this
//   list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright notice,
//   this list of conditions and the following disclaimer in the documentation
//   and/or other materials provided with the distribution.
// * The name of the author may not be used to endorse or promote products derived
//   from this software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE AUTHOR ''AS IS'' AND ANY EXPRESS OR IMPLIED
// WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
// AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR
// BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
// DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
// LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
// ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

// Generates a htpasswd compatible crypted password string.
function rand_salt_crypt( $pass )
{
  $salt = "";
  mt_srand((double)microtime()*1000000);
  for ($i=0; $i<CRYPT_SALT_LENGTH; $i++)
    $salt .= substr("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789./", mt_rand() & 63, 1);
  return crypt($pass, $salt);
}
?>
<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
	<tr>
		<td width="<?php echo BOX_WIDTH; ?>" valign="top">
		<table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1"
			cellpadding="1" class="columnLeft">
			<!-- left_navigation //-->
			<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
			<!-- left_navigation_eof //-->
		</table>
		</td>
		<!-- body_text //-->
		<td width="100%" valign="top">
		<table border="0" width="100%" cellspacing="0" cellpadding="2">
			<tr>
				<td>
  <h2 align=center>.htaccess .htpasswd pair for Google Checkout Basic authentication on CGI php installations</h2>
  <form action="" method="post">
  <table border=1 cellpadding=2 cellspacing=0 align=center>
    <tr>
      <th align="center" colspan="2">Sandbox Account: <input type="checkbox" value="true" name="sb"<?php echo (!isset($_POST['submit']) || isset($_POST['sb']))?' checked':'';?>/></th>
    </tr>
    <tr>
      <th align="right">Merchant ID: </th>
      <td><input type="text" value="<?=tep_output_string(strip_tags(@$_POST['sb_id']));?>" name="sb_id" size="40"/></td>
    </tr>
    <tr>
      <th align="right">Merchant Key: </th>
      <td><input type="text" value="<?=tep_output_string(strip_tags(@$_POST['sb_key']));?>" name="sb_key" size="40"/></td>
    </tr>
    <tr>
      <th align="center" colspan="2">Checkout Account: <input type="checkbox" value="true" name="gc"<?php echo (!isset($_POST['submit']) || isset($_POST['gc']))?' checked':'';?>/></th>
    </tr>
    <tr>
      <th align="right">Merchant ID: </th>
      <td><input type="text" value="<?=tep_output_string(strip_tags(@$_POST['gc_id']));?>" name="gc_id" size="40"/></td>
    </tr>
    <tr>
      <th align="right">Merchant Key: </th>
      <td><input type="text" value="<?=tep_output_string(strip_tags(@$_POST['gc_key']));?>" name="gc_key" size="40"/></td>
    </tr>
    <tr>
      <th align="center" colspan="2">&nbsp</th>
    </tr>
    <tr>
      <th align="right">Absolute <i>dir</i> to googlecheckout/ :</th>
      <td><input type="text" value="<?=tep_output_string(strip_tags(@$_POST['path']));?>" name="path" size="40"/>
      <br /><small>( ie. <b>/home/ropu/public_html/catalog/googlecheckout</b> )</small>
      </td>
    </tr>
    <tr>
      <th align="right">Check if <i>dir</i> exists: </th>
      <td><input type="checkbox" value="true" id="check" onChange="checkCreate()" name="check"<?php echo isset($_POST['check'])?' checked':'';?>/></td>
    </tr>
    <tr>
      <th valign=top align="right">Create Files: </th>
      <td><input type="checkbox" value="true" id="create" name="create"<?php echo (isset($_POST['create'])&&isset($_POST['check']))?' checked':'';?><?php echo (!isset($_POST['check']))?' disabled':'';?>/>
      <br /><small>(Tip: To create files <i>dir</i> must have <b>Write</b> (777) permission)</small>
      <br /><small>Old files will be overrided!</small>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="submit" value="Create"/><div align=right><small>Coded by:<b>Ropu</b></small></div></td>
    </tr>    
  </table>
  </form>
		</td>
			</tr>
			<tr>
				<td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
			</tr>
		</table>
		</td>
		<td width="25%"><!-- Placeholder for right hand column --></td>
		<!-- body_text_eof //-->
	</tr>
</table>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>