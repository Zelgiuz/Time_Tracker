<?php 
function start($db){
  if (!(isset($_COOKIE["start"]))){  
    setcookie("start",1);
    $start=time();
    $encrypt=$_COOKIE['user'];
    $user=decrypt($encrypt,$db);
    $number=0;
    $sql= "UPDATE `Time` SET `Stop`='$start' WHERE `Account_ID`='$user' AND `Stop`='$number'";
    $db->query($sql);

    //insert into the database their start time and their stop time
    $sql1= "INSERT INTO `Time`(`Start`,`Stop`, `Account_ID`) VALUES ('$start','$number','$user')";
	  $db->query($sql1);
    return 1;
    }
  else{
    echo("Can't log start a new log before you stop the current one, SRSLY!");
  }
}