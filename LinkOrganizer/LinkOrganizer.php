<?php

/* 
Plugin Name: Link Organizer
Description: Organize and display links categorically within your WordPress website
Version: 1.0.0
Author: Jack Raney
Author URI: http://author.skeletonmemes.pw/
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action("admin_menu", "loMenu");

function loMenu(){
    add_menu_page("Link Organizer", "Add Link", "manage_options", "addLink", "loAddLink");
    add_submenu_page("addLink", "Remove Link", "Remove Link", "manage_options", "removeLink", "loRemoveLink");
}

function loAddLink(){
    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  include( __DIR__ . '/addLinkPage.php' );
}

function loRemoveLink(){
    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  include( __DIR__ . '/removeLinkPage.php' );
}

register_activation_hook( __FILE__, Activate);

function Activate(){
    CreateTables();
}

function CreateTables(){
    global $wpdb;
    
    $sql = "CREATE TABLE `admin_wordpress`.`lo_links` (
  `Link ID` INT NOT NULL AUTO_INCREMENT,
  `URL` VARCHAR(45) NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `Description` VARCHAR(70) NULL,
  PRIMARY KEY (`Link ID`),
  UNIQUE INDEX `Link ID_UNIQUE` (`Link ID` ASC),
  UNIQUE INDEX `URL_UNIQUE` (`URL` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));";
    $wpdb->query($sql);
    
    $sql = "CREATE TABLE `admin_wordpress`.`lo_types` (
  `Type ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Type ID`),
  UNIQUE INDEX `Type ID_UNIQUE` (`Type ID` ASC));";
    $wpdb->query($sql);
    
    $sql = "CREATE TABLE `admin_wordpress`.`lo_idmatch` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Link ID` INT NULL,
  `Type ID` INT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC));";
    $wpdb->query($sql);
}