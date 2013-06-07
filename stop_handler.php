<?php 
function stop($db){
  if(isset($_COOKIE['start'])){
    //fetch the start cookie for when the user started the timer
	$start=$_COOKIE['start'];
  $user=decrypt($db);
	//then delete said cookie so one can't have multiple entry logs
	setcookie("start",0,time()-3600);
	$stop=time();
  $number=0;
 	
	//Allows the user to create timestamps.
	$sql= $db->prepare("UPDATE `Time` SET `Stop`='$stop' WHERE `Stop`='$number' AND `Account_ID`= :user"); 
	$sql->execute(array(':user'=>$user));
  return 0;
    }
  else{
    return 0;
  }
  }