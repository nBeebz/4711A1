<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * helpers/common_helper.php
 * Common helper functions
 */

 // Returns TRUE if user is logged in, false otherwise.
 function logged_in()
 {
	return isset( $_SESSION['logged'] );
 }
 
 /**
  * Makes a button with the given label that links to the given url
  * @param String $url URL to link to
  * @param String $label Label to be given to button
  */
 function make_link_button( $url, $label )
 {
	 return "<a href='$url'><button>$label</button></a>";
 }
 
/* End of file common_helper.php */
/* Location: application/helpers/common_helper.php */