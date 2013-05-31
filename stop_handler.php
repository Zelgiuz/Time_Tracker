<?php 
function stop($db){
  if(isset($_COOKIE['start'])){
    //fetch the start cookie for when the user started the timer
	$start=$_COOKIE['start'];
  $encrypt=$_COOKIE['user'];
  $user=decrypt($encrypt,$db);
	//then delete said cookie so one can't have multiple entry logs
	setcookie("start",0,time()-3600);
	$stop=time();
  $number=0;
 	
	//Allows the user to create timestamps.
	$sql= "UPDATE `Time` SET `Stop`='$stop' WHERE `Stop`='$number' AND `Account_ID`='$user'"; 
	$db->query($sql);
  return 0;
    }
  else{
    echo("Can't log a time when you haven't hit my start button, sheez");
  }
  }