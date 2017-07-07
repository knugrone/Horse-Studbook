<?php
/*
Plugin Name: Horse Studbook
Plugin URI:  https://developer.fjordhorse.com.au/Studbook
Description: Studbook for horse breeding organizations
Version:     20160911
Author:      knugrone
Author URI:  https://developer.fjordhorse.com.au/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
*/

global $hstb_db_version;
$hstb_db_version = '1.0';

function hstb_install() {
	global $wpdb;
	global $hstb_db_version;

	$table_name = $wpdb->prefix . 'hstb_horses';

	$charset_collate = '';
	

	$sql = "CREATE TABLE $table_name (
	horseid int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(41) NOT NULL,
  `Sex` varchar(8) DEFAULT NULL,
  `Foal Year` varchar(4) DEFAULT NULL,
  `Sire` varchar(36) DEFAULT NULL,
  `Dam` varchar(41) DEFAULT NULL,
  `Reg No.` varchar(14) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Registry` varchar(11) DEFAULT NULL,
  `Reg No. 2` varchar(13) DEFAULT NULL,
  `Registry No. 2` varchar(11) DEFAULT NULL,
  `Breed` varchar(16) DEFAULT NULL,
  `Color` varchar(9) DEFAULT NULL,
  `Markings` varchar(129) DEFAULT NULL,
  `Owner` varchar(33) DEFAULT NULL,
  `Stable Name of Owner` varchar(21) DEFAULT NULL,
  `Breeder` varchar(28) DEFAULT NULL,
  `Stable Name of Breeder` varchar(21) DEFAULT NULL,
  `Deceased Year` varchar(4) DEFAULT NULL,
  `Deceased` varchar(1) DEFAULT NULL,
  `Country of Origin` varchar(11) DEFAULT NULL,
  `Microchip No.` varchar(16) DEFAULT NULL,
  `Date of Certification` varchar(9) DEFAULT NULL,
  `Notes` varchar(34) DEFAULT NULL,
  `Height` varchar(28) DEFAULT NULL,
  `Legs` varchar(10) DEFAULT NULL,
  `Certifications` varchar(10) DEFAULT NULL,
  `Comment` varchar(10) DEFAULT NULL,
  `Photo` varchar(10) DEFAULT NULL,
  `At Stud` varchar(10) DEFAULT NULL,
  `Blood Type` varchar(6) DEFAULT NULL,
  `Brand N/SH` varchar(78) DEFAULT NULL,
  `Brand O/SH` varchar(25) DEFAULT NULL,
  `DNA typed` varchar(12) DEFAULT NULL,
  `User field 4` varchar(10) DEFAULT NULL,
  `Owner withheld` varchar(17) DEFAULT NULL,
  `User Field6` varchar(10) DEFAULT NULL,
  `User Field7` varchar(10) DEFAULT NULL,
  `User Field8` varchar(10) DEFAULT NULL,
  `User Field9` varchar(10) DEFAULT NULL,
  `Gelded` varchar(9) DEFAULT NULL,
  `Pedigree Granted` varchar(10) DEFAULT NULL,
  `Granted By` varchar(10) DEFAULT NULL,
  `User field 5` varchar(10) DEFAULT NULL,
  `Inbreeding Coefficient` varchar(6) DEFAULT NULL,
  `Relationship Coefficient` varchar(10) DEFAULT NULL,
  `Breeding Method` varchar(9) DEFAULT NULL,
  `HTML Photo` varchar(10) DEFAULT NULL,
  `Blood Type Case #` int(5) DEFAULT NULL,
  `Coggins Test` varchar(10) DEFAULT NULL,
  `User Email` varchar(10) DEFAULT NULL,
  `User Comment` varchar(10) DEFAULT NULL,
  PRIMARY KEY (horseid)
) ";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	$table_name = $wpdb->prefix . 'hstb_contacts';
	
	$sql = "CREATE TABLE $table_name (
		contactid int(9) NOT NULL AUTO_INCREMENT,
  `Contacts Name` varchar(33) NOT NULL,
  `Street Address` varchar(29) DEFAULT NULL,
  `Suburb` varchar(18) DEFAULT NULL,
  `State` varchar(16) DEFAULT NULL,
  `Postcode` varchar(6) DEFAULT NULL,
  `Country` varchar(11) DEFAULT NULL,
  `Stable Name` varchar(21) DEFAULT NULL,
  `Membership No.` varchar(10) DEFAULT NULL,
  `Club` varchar(10) DEFAULT NULL,
  `Email Address` varchar(10) DEFAULT NULL,
  `Web Page` varchar(10) DEFAULT NULL,
  `Photo` varchar(10) DEFAULT NULL,
  `Type of Membership` varchar(10) DEFAULT NULL,
  `Member Since` varchar(10) DEFAULT NULL,
  `Membership Expires` varchar(10) DEFAULT NULL,
  `Home Phone` varchar(10) DEFAULT NULL,
  `Mobile Phone` varchar(10) DEFAULT NULL,
  `Work Phone` varchar(10) DEFAULT NULL,
  `Fax` varchar(10) DEFAULT NULL,
  `Stud Colors` varchar(10) DEFAULT NULL,
  		PRIMARY KEY  (contactid)
	) ";
	

	dbDelta( $sql );



	$table_name = $wpdb->prefix . 'hstb_service';
	
	$sql = "CREATE TABLE $table_name (
		serviceid int(9) NOT NULL AUTO_INCREMENT,
  `Dam's Name` varchar(26) DEFAULT NULL,
  `Date Started` varchar(10) DEFAULT NULL,
  `Date Finished` varchar(10) DEFAULT NULL,
  `Date Fertile` varchar(10) DEFAULT NULL,
  `Date 1st Mating` varchar(10) DEFAULT NULL,
  `Date 2nd Mating` varchar(10) DEFAULT NULL,
  `Mated With` varchar(5) DEFAULT NULL,
  `Mated By` varchar(18) DEFAULT NULL,
  `Comments` varchar(10) DEFAULT NULL,
  `Stud Fee` varchar(5) DEFAULT NULL,
  `Boarding Fee` varchar(5) DEFAULT NULL,
  `Total Fee` varchar(6) DEFAULT NULL,
  `Date Expected` varchar(10) DEFAULT NULL,
  `Country of Mating` varchar(9) DEFAULT NULL,
  `City of Birth` varchar(11) DEFAULT NULL,
  `State of Birth` varchar(15) DEFAULT NULL,
  `Country of Birth` varchar(9) DEFAULT NULL,
		PRIMARY KEY  (serviceid)
	) ;";

	dbDelta( $sql );

//	$charset_collate = $wpdb->get_charset_collate();

	add_option( 'hstb_db_version', $hstb_db_version );
}

