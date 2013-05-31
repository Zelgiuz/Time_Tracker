<?php
function create_time($db){
    $start=($_POST['start_minutes']*60+$_POST['start_hours']*3600
              +time()-(time()%86400)+14400);
	  $stop=($_POST['stop_minutes']*60+$_POST['stop_hours']*3600+
                  time()-(time()%86400)+14400);
   $encrypt=$_COOKIE['user'];
    $user= decrypt($encrypt,$db);
    
	//Allows the user to create timestamps.
	$sql= "INSERT INTO `Time`(`Start`,`Stop`, `Account_ID`) 
        VALUES ('$start','$stop','$user')";
	$db->query($sql);
  

}