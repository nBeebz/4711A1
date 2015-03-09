<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * helpers/common_helper.php
 * Common helper functions
 */


function base_styles()
{
	$styles = scandir( "assets/css" );
	$result = '';
	foreach ($styles as $style) {
		if (strpos($style,'.css') !== false)
			$result .= '<link rel="stylesheet" type="text/css" href="/assets/css/' . $style . '"/>' . PHP_EOL;
	}
	return $result;
}


function base_scripts()
{
	$scripts = scandir( "assets/js" );
	$result = '';
	foreach ($scripts as $script) {
		if (strpos($script,'.js') !== false)
			$result .= '<script src="/assets/js/' . $script . '"></script>' . PHP_EOL;
	}
	return $result;
}

function logged_in()
{
	return true;
}
/* End of file common_helper.php */
/* Location: application/helpers/common_helper.php */