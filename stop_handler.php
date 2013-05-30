<?php 
function stop($db){
  if(isset($_COOKIE['start'])){
    //fetch the start cookie for when the user started the timer
	$start=$_COOKIE['start'];
  $user=$_COOKIE['user'];
	//then delete said cookie so one can't have multiple entry logs
	setcookie("start","",time()-3600);
	$stop=time();
  $number=0;
    $user=$_COOKIE['user'];	
	//Allows the user to create timestamps.
	$sql= "UPDATE `Time` SET `Stop`='$stop' WHERE `Stop`='$number' AND `Account_ID`='$user'"; 
	$db->query($sql);
    }
  else{
    echo("Can't log a time when you haven't hit my start button, sheez");
  }
  }