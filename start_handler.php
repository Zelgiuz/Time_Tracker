<?php 
function start($db){
  if (!(isset($_COOKIE["start"]))){  
    setcookie("start",1);
    $start=time();    
    $user=decrypt($db);
    $number=0;
    $sql= $db->prepare("UPDATE `Time` SET `Stop`='$start' WHERE `Account_ID`= :user AND `Stop`='$number'");
    $sql->execute(array(':user'=>$user));
    

    //insert into the database their start time and their stop time
    $sql1= $db->prepare("INSERT INTO `Time`(`Start`,`Stop`, `Account_ID`) VALUES ('$start','$number', :user)");
	  $sql1->execute(array(':user'=>$user));
    return 1;
    }
  else{   
    return 1;
  }
}