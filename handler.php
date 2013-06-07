<?php

echo('<div id="body">');
//Decision switch based on the value of EXE
if(isset($_POST["exe"])){
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
  elseif($_POST["exe"]=="reset"){
      create_form_reset_password();
    
  }
  elseif($_POST["exe"]=="reset_password"){
      reset_password($db);
  }
  else{}
}
//end the decision switch

//stylize the header so it has proper positioning
echo('</div>');
if ($logged!=1) {
?>
  <div class="heading">
    <div class="left">
      <h2>TIMETRACKER</h2>
    </div>
  </div>
<?php
} else {
   $user=decrypt($db);
   $sql="SELECT * FROM `Accounts` WHERE `Account_ID`='$user'";
   $stmt=$db->query($sql);
   $row=$stmt->fetch();
     
?>
  <div class="heading">
    <div class="left">
      <h2>TIMETRACKER</h2>
    </div>
    <div class="right">
      <h2>Logged in as: <?php echo $row[1]; ?></h2>
      <?php 
        echo(create_form_logout());
        echo(create_form_reset());
      ?>
    </div>
  </div>
<?php
}
//end stylization of the header

echo('<div id="body">');




//Print these forms if the user is not logged in and hasn't failed an attempt
if ($logged==0){

	create_form_login();
  create_form_new_user();

   }

//Print these forms if the user is not logged because they weren't recognized
//and give them an error message telling them this
elseif($logged==2){
  
  echo('<div class="error">ERROR Username or Password is incorrect</div>');
  create_form_login();
  create_form_new_user();



}
//These forms
else{  //creates the form that allows the user to start and stop the clock

  //creates a clock representation of the time
  if($start==1) create_form_stop();
  else create_form_start();
  
	   
	   //creates the button that allows a user to logout

  create_form_time_create();
  create_form_delete_user();
	display_time($db);
  
     
}


  echo('</div>');