<?php
//new user form
function create_form_new_user(){
echo('
     <h2>New user? Create an account here</h2>  
     <form method="post" action="index.php">
        ScreenName: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        Retype-Password: <input type="password" name="retyped"><br>
        <input type="submit" value="CreateUser"><br>
        <input type="hidden" name="exe" value="create">
     </form>
  ');//end form
}


//login form
function create_form_login(){ 
  echo('
    <h2>Already Registered? Login here.</h2>
    <form method="post" action="index.php">
      ScreenName: <input type="text" name="username"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Login"><br>
      <input type="hidden" name="exe" value="login">
    </form>

');//end form



}
//The Form to Logout

function create_form_logout(){
  echo('
    <form method="post" "action=index.php">
      <input type="submit" value="Logout"><br>
      <input type="hidden" name="exe" value="logout">
    </form>
  ');//end form
}


//This is the display of the timer
//Disabled for the MVP
function create_form_time_create(){
echo('
  <h4> Enter times here in military format, date is assumed to be today.</h4>
  <form method="post" "action=index.php">
    Start: Hours <input type="text" name="start_hours">Minutes<input type="text" name="start_minutes"><br>    
    Stop: Hours <input type="text" name="stop_hours">Minutes<input type="text" name="stop_minutes"><br>
    <input type="submit" value="Log Time"<br>
	<input type="hidden" name="exe" value="create_time">
  </form>    
');
}

//the start and stop buttons
function create_form_start(){
echo('     
	 <!-- start button -->
    <form method="post" "action=index.php">
      <input type="submit" value="Start!"><br>
      <input type="hidden" name="exe" value="start">
    </form>
	');
}
function create_form_stop(){
	echo('<!-- stop button -->
    <form method="post" "action=index.php">
      <input type="submit" value="Stop!"><br>
      <input type="hidden" name="exe" value="stop">
    </form>
    ');
}
function create_form_delete_user(){
  echo('<!-- form to delete a user-->
     <h3>THIS IS THE FORM TO DELETE YOUR ACCOUNT </h3>
     <h4>ENTER YOUR INFO ONLY IF YOU DO NOT WANT TO USE THIS SITE </h4>
     <h4>All of your information and time logs will be deleted.</h4>
    <form method="post" "action=index.php">
      Username: <input type="text" name="username"><br>
      Password: <input type="password" name="password"<br>
      Retype-Password<input type="password" name="re_type"<br>
      <input type="submit" value= "DELETE!"<br>
      <input type="hidden" name="exe" value="delete_user">
      </form>
  ');
}
