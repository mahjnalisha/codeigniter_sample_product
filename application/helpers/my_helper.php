<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function char_limit($str, $n = 500) {
	if (strlen($str) <= $n) {
		return $str;
	}
	return substr($str, 0, $n) . '...';
}

?>