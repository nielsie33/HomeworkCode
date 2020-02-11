<?php

// function to create the DB / Options / Defaults					
function install_tables() {
	
   	global $wpdb;
  	global $tblname;
	$tblname = $wpdb->prefix . 'meo_event';
	$tblname1 = $wpdb->prefix . 'meo_event_category';
	$tblname2 = $wpdb->prefix . 'meo_event_type';
	// create the ECPT metabox database table
	if($wpdb->get_var("show tables like '$tblname'") != $tblname) 
	{
		$sql = "CREATE TABLE " . $tblname . " (
		`id_event` bigint(10) NOT NULL AUTO_INCREMENT,
		`event_title` varchar(64) NOT NULL,
		`fk_event_category` bigint(10) NOT NULL,
		`fk_event_type` bigint(10) NOT NULL,
		`event_info` varchar(1024) NOT NULL,
		`event_date` date NOT NULL,
		`event_due_date` date NOT NULL,
		`event_end_date` date NULL,
		PRIMARY KEY id_event (id_event)
		);";
		
		$sql1 = "CREATE TABLE " . $tblname1 . " (
		`id_event_category` bigint(10) NOT NULL AUTO_INCREMENT,
		`name` varchar(32) NOT NULL,
		`description` varchar(1024) NOT NULL,
		PRIMARY KEY id_event_category (id_event_category),
		UNIQUE KEY name (name)
		);";
		
		$sql2 = "CREATE TABLE " . $tblname2 . " (
		`id_event_type` bigint(10) NOT NULL AUTO_INCREMENT,
		`name` varchar(32) NOT NULL,
		`description` varchar(1024) NOT NULL,
		PRIMARY KEY id_event_type (id_event_type),
		UNIQUE KEY name (name)
		);";
 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		dbDelta($sql1);
		dbDelta($sql2);
	}
 
}



/*
// function to create the DB / Options / Defaults					
function install_tables() {
	
   	global $wpdb;
  	global $tblname;
	$tblname = $wpdb->prefix . 'meo_event';
	$tblname1 = $wpdb->prefix . 'meo_event_category';
	$tblname2 = $wpdb->prefix . 'meo_event_type';
	// create the ECPT metabox database table
	if($wpdb->get_var("show tables like '$tblname'") != $tblname) 
	{
		$sql = "CREATE TABLE " . $tblname . " (
		`id_event` bigint(10) NOT NULL AUTO_INCREMENT,
		`event_title` varchar(64) NOT NULL,
		`fk_event_category` bigint(10) NOT NULL,
		`fk_event_type` bigint(10) NOT NULL,
		`event_info` varchar(1024) NOT NULL,
		`event_date` date NOT NULL,
		`event_due_date` date NOT NULL,
		`event_end_date` date NULL,
		PRIMARY KEY id_event (id_event)
		);";
 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
	
	if($wpdb->get_var("show tables like '$tblname1'") != $tblname1) 
	{
		$sql1 = "CREATE TABLE " . $tblname1 . " (
		`id_event_category` bigint(10) NOT NULL AUTO_INCREMENT,
		`name` varchar(32) NOT NULL,
		`description` varchar(1024) NOT NULL,
		PRIMARY KEY id_event_category (id_event_category),
		UNIQUE KEY name (name)
		);";
 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql1);
	}
	
	if($wpdb->get_var("show tables like '$tblname2'") != $tblname2) 
	{
		$sql2 = "CREATE TABLE " . $tblname2 . " (
		`id_event_type` bigint(10) NOT NULL AUTO_INCREMENT,
		`name` varchar(32) NOT NULL,
		`description` varchar(1024) NOT NULL,
		PRIMARY KEY id_event_type (id_event_type),
		UNIQUE KEY name (name)
		);";
 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql2);
	}
 
}
// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'install_tables'); */

?>