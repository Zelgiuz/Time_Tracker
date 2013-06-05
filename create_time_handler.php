<?php
function create_time($db){
    //split the start string entry into an array of 2 values if the colon appears
    //if not close function report error
    if (strpos($_POST['start_hours'],':')===FALSE) {
    echo('<h3 class="error"> Incorrect syntax to add time need a ":"</h3>');
    return;
    }
    //split the stop string entry into an array of 2 values if the colon appears
    //if not close function report error
    if (strpos($_POST['stop_hours'],':')===FALSE) {
    echo('<h3 class="error"> Incorrect syntax to add time need a ":"</h3>');
    return;
    }
    //Check the make sure hours and minutes are proper values
    $starts=explode(':',$_POST['start_hours']);
    $stops=explode(':',$_POST['stop_hours']);
    if ($starts[0]>23){
      echo('<h3 class="error">ERROR: Entered 24 or more for hours in start </h3>');
      return;
    }
    
    if ($starts[1]>59){
      echo('<h3 class="error"> ERROR: Entered 60 or more for minutes in start </h3>');
      return;
    }
    if ($stops[0]>23){
      echo('<h3 class="error"> ERROE: Entered 24 or more for hours in stop </h3>');
      return;
    }
    if ($stops[1]>59){
      echo('<h3 class="error">ERROR: Entered 60 or more for minutes in stop </h3>');
      return;
    }
   //Change the values of starts and stops by using time 
   //so that the date in the database is read as today + the user input
    $start=($starts[1]*60+$starts[0]*3600
              +time()-(time()%86400)+14400);
	  $stop=($stops[1]*60+$stops[0]*3600+
                  time()-(time()%86400)+14400);
   
    $user= decrypt($db);
    
	//Enter user created timestamps into the database
	$sql=$db->prepare("INSERT INTO `Time`(`Start`,`Stop`, `Account_ID`) 
        VALUES ( :start, :stop, :user)");
	$sql->execute(array(':start'=>$start, ':stop'=>$stop, ':user'=>$user));
  

}