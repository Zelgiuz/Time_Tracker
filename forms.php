<?php
//new user form
function create_form_new_user(){
echo('
    <div id="signin">
    
    <form method="post" action="index.php">
    <h2>Register</h2>  
     
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" default="Repeat Password" name="retyped" placeholder="Retype Password"><br>
        <div id="formbutton"><input type="submit" value="Register"></div><br>
        <input type="hidden" name="exe" value="create">
        
     </form>
     
     </div>
  ');//end form
}


//login form
function create_form_login(){ 
  echo('
    <div id="signin">
    
    <form method="post" action="index.php">
    <h2>Sign In</h2>
      <input type="text" default="username" name="username" placeholder="Username"><br>
      <input type="password" default="password" name="password" placeholder="Password"><br>
      <div id="formbutton"><input type="submit" value="Sign in"></div><br>
      <input type="hidden" name="exe" value="login">
    </form>
    </div>

');//end form



}
//The Form to Logout

function create_form_logout(){
  echo('<div id="logout">
    <form method="post" action="index.php">
      <input type="submit" value="Logout"><br>
      <input type="hidden" name="exe" value="logout">
    </form>
    </div>
  ');//end form
}


//The form that adds time manually based on today
function create_form_time_create(){
echo('
    <div id="create-time">
     <h3>Add Custom Time</h3>
     <h5>All times are in 24 hours format</h5>
     <h5>Date is assumed to be today</h5>
  <form method="post" action="index.php">
    Start:<input type="text" name="start_hours" placeholder="HH:MM"><br>    
    Stop: <input type="text" name="stop_hours" placeholder="HH:MM"><br>
    <div id="add-button"><input type="submit" value="Add"></div><br>
	<input type="hidden" name="exe" value="create_time">
  </form>    
  </div>
');
}

//the start button form.
function create_form_start(){
echo('
   <div id="start-stop">
	 <!-- start button -->
    <form method="post" action="index.php">
      <div id="startbutton"><input type="submit" value="Start Timer"></div><br>
      <input type="hidden" name="exe" value="start">
    </form>
    </div>
	');
}
//THE STOP BUTTON FORM!
function create_form_stop(){
	echo('
    <div id="start-stop">
    <!-- stop button -->
    <form method="post" action="index.php">
    <div id="stopbutton">  <input type="submit" value="Stop Timer"></div><br>
      <input type="hidden" name="exe" value="stop">
    </form>
    </div>
    ');
}
//THE START DELET USER FORM!
function create_form_delete_user(){
  echo('<!-- form to delete a user-->
     
    <div id="delete-acct">
    <form method="post" action="index.php">
    <h3>Delete Account</h3>
      If you check confirm and click delete all of your data will be destroyed.
      Press only with this knowledge.<br>
      <input type="text" default="Username" name="username" placeholder="Username"><br>
      <input type="password" default="Password" name="password" placeholder="Password"><br>
      <input type="checkbox" value="confirm" name="checked">Confirm<br>
      <div id="deletebutton"><input type="submit" value= "Delete Account"></div><br>
      
      <input type="hidden" name="exe" value="delete_user">
      </form>
    </div>
  ');
}
