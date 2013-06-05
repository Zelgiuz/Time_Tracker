<?php
function create_time($db){
    $start=($_POST['start_minutes']*60+$_POST['start_hours']*3600
              +time()-(time()+14400)%86400);
	  $stop=($_POST['stop_minutes']*60+$_POST['stop_hours']*3600+
                  time()-(time()+14400)%86400);
   
    $user= decrypt($db);
    
	//Allows the user to create timestamps.
	$sql=$db->prepare("INSERT INTO `Time`(`Start`,`Stop`, `Account_ID`) 
        VALUES ( :start, :stop, :user)");
	$sql->execute(array(':start'=>$start, ':stop'=>$stop, ':user'=>$user));
  

}