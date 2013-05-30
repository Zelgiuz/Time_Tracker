<?php

//load config
require('config.php');
//load database object
/* Connect to the database located at spa5@redbottledesign.com*/
include('db.php');
//Deal with cookies
require('login_user_handler.php');
require('forms.php');
require('display_time.php');
require('create_user_handler.php');
require('logout_user_handler.php');
require('decrypt_handler.php');
//require ('create_time_handler.php');
require('start_handler.php');
require('stop_handler.php');
require('delete_handler.php');

//output the <head> !doctype <body> of html
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- TWO STEPS TO INSTALL DYNAMIC CLOCK:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  -->






    <title> TimeTrackingWebsite</title>
    <link rel="stylesheet" href="style.css">
    <!-- Meta Data -->
    <meta name="description" content="TimeTrackingapp">
    <meta name="keywords" content="Time,Tracker,Html">
    <meta name="author" content="Andrew">
 
    <!-- Styling the headings to be the color of rainbows -->


   </head>
 <body>