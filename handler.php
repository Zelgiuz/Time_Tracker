<?php

echo("<h1>This is a website that stores time logs in a database</h1>");


if ($_POST["exe"]=="login"){
    login($db);
    header("Location: index.php");
}

elseif ($_POST["exe"]=="delete"){
    delete($db);
    header("Location: index.php");
}
elseif ($_POST["exe"]=="create"){
    create_user($db);
    header("Location: index.php");
}

elseif ($_POST["exe"]=="logout"){
    logout();
    header("Location: index.php");
}
elseif($_POST["exe"]=="create_time"){
 
    create_time($db);
}

elseif($_POST["exe"]=="start"){
    //set a cookie with the time they clicked start
	start($db);
  //refresh for cookies sake
  header("Location: index.php");
}

elseif($_POST["exe"]=="stop"){
    //log the time they hit stop and start in the database
	stop($db);
  //refresh for cookies sake
  header("Location: index.php");
}
elseif($_POST["exe"]=="delete_user"){
  delete_user($db);
  
}
else{}

//Print these forms if the user is not logged in and hasn't failed an attempt
if (!(isset($_COOKIE["logged"]))){
	create_form_new_user();
	create_form_login();
   }

//Print these forms if the user is not logged because they weren't recognized
//and give them an error message telling them this
elseif($_COOKIE["logged"]=="failed"){

  create_form_new_user();
  echo("<h3>ERROR Username or Password is incorrect</h3>");
  create_form_login();

}
//These forms
else{  //creates the form that allows the user to start and stop the clock
  
  //creates a clock representation of the time
  if(isset($_COOKIE['start'])) create_form_stop();
  else create_form_start();
  
	   
	   //creates the button that allows a user to logout
	create_form_logout();
  create_form_time_create();  
	display_time($db);
  create_form_delete_user();
      
}






