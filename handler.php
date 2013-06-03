<?php

echo('<h2 class="heading">TIMETRACKER</h2>');


if ($_POST["exe"]=="login"){
    $logged=login($db);
    
}

elseif ($_POST["exe"]=="delete"){
    delete($db);
    
}
elseif ($_POST["exe"]=="create"){
    $logged=create_user($db);
    
}

elseif ($_POST["exe"]=="logout"){
    $logged=logout();
    
}
elseif($_POST["exe"]=="create_time"){
 
    create_time($db);
    
}

elseif($_POST["exe"]=="start"){
    //set a cookie with the time they clicked start
	$start=start($db);
  //refresh for cookies sake
  
}

elseif($_POST["exe"]=="stop"){
    //log the time they hit stop and start in the database
	$start=stop($db);
  //refresh for cookies sake
}
elseif($_POST["exe"]=="delete_user"){
 $logged=delete_user($db);
  
  
}
else{}

//Print these forms if the user is not logged in and hasn't failed an attempt
if ($logged==0){
  echo('<div id=body>');
	create_form_login();
  create_form_new_user();
  echo('</div>');
   }

//Print these forms if the user is not logged because they weren't recognized
//and give them an error message telling them this
elseif($logged==2){
  echo('<div id=body>');
  echo('<div class="error">ERROR Username or Password is incorrect</div>');
  create_form_login();
  create_form_new_user();

  echo('</div>');

}
//These forms
else{  //creates the form that allows the user to start and stop the clock
  echo('<div id=body>');
  //creates a clock representation of the time
  if($start==1) create_form_stop();
  else create_form_start();
  
	   
	   //creates the button that allows a user to logout
	create_form_logout();
  create_form_time_create();  
	display_time($db);
  create_form_delete_user();
  echo('</div>');    
}






