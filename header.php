<?php

//load config
if(file_exists('config.php'))
require('config.php');
else echo("RENAME CONFIG.SAMPLE.PHP to CONFIG.PHP AFTER MAKING THE APPROPRIATE CHANGES");

//load database object
/* Connect to the database located at spa5@redbottledesign.com*/
include('db.php');
//Deal with cookies
if(isset($_COOKIE['logged'])) $logged=$_COOKIE['logged'];
else $logged=0;

if(isset($_COOKIE['start']))$start=$_COOKIE['start'];
else $start=0;

if(isset($_COOKIE['user']))$encrypt=$_COOKIE['user'];
else $encrypt="";

require('login_user_handler.php');
require('forms.php');
require('display_time.php');
require('create_user_handler.php');
require('logout_user_handler.php');
require('decrypt_handler.php');
require('delete_user_handler.php');
require ('create_time_handler.php');
require('start_handler.php');
require('stop_handler.php');
require('delete_handler.php');

//output the <head> !doctype <body> of html
?>
<!DOCTYPE html>
<html>
  <head>







    <title> TimeTrackingWebsite</title>
    <link rel="stylesheet" href="style.css">
    <!-- Meta Data -->
    <meta name="description" content="TimeTrackingapp">
    <meta name="keywords" content="Time,Tracker,Html">
    <meta name="author" content="Andrew">
 
    <!-- Styling the headings to be the color of rainbows -->


   </head>
 <body>
 <div id="wrapper">