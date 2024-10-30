<?php
/*
Plugin Name: Case sensitive urls
Plugin URI: http://vijaymaurya.in/
Description: A plugin to make permalinks case insensitive and redirected to lowercase.
Version: 1.0a
Author: Vijay maurya
Author URI: http://vijaymaurya.in/
*/
if(!is_admin()){
  add_action( 'init', 'vijay_case_sensitive_url' );
}

function vijay_case_sensitive_url(){

	$landing_url = $_SERVER['REQUEST_URI'];

  if(preg_match('/[\.]/', $landing_url)){
    return;
  }

  if(preg_match('/[A-Z]/', $landing_url)){

    $new_url = strtolower($landing_url);
	header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: " . $new_url);
    exit(0);
  }

}
?>