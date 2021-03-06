<?php
/*
$Id: image_resize.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.oscmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/

function image_resize($image, $width, $height, $quality, $input_directory, $output_directory){
  $cache_dir = 'cache/';
  if ($input_directory !== '') {
  	$source = $input_directory . $image;
  } else {
  	$source = $image;
  }
  if ($output_directory !== '') {
	$target = $output_directory . $image;
  } else {
	$target = $image;
  }
  include_once( DIR_FS_CATALOG . 'ext/phpthumb/phpthumb.class.php');

	// create phpThumb object
	$phpThumb = new phpThumb();

	// set data source -- do this first, any settings must be made AFTER this call
	$phpThumb->setSourceFilename($source);	

	// set parameters (see "URL Parameters" in phpthumb.readme.txt)
	$phpThumb->setParameter('config_cache_directory', $cache_dir); 

        if ($width !== '') {
           $phpThumb->setParameter('w', $width);
           } else {
           $phpThumb->setParameter('h', $height);  
           }
        if ($quality !== '') {                        		 
        $phpThumb->setParameter('q', $quality);
        }
	// generate & output thumbnail
	if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
		if ($phpThumb->RenderToFile($target)) {
		// do something on success
//		        echo 'Successfully rendered to "'.$image.'"';
		} else {
		// do something with debug/error messages
		echo 'Failed:<pre>'.implode("\n\n", $phpThumb->debugmessages).'</pre>';
		}
	} else {
		// do something with debug/error messages
		echo 'Failed:<pre>'.$phpThumb->fatalerror."\n\n".implode("\n\n", $phpThumb->debugmessages).'</pre>';
	}
// return $output;
}
?>
