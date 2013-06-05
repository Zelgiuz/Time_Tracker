<?php


function create_user($db){//Grab the arguments for the function from the post
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  $retype=$_POST["retyped"];
  //if the password 2 password fields are equal
  if(!($pw==$retype)){ echo('<h3 class="warning"> PassWords do not match</h3>');return;}

  //else end; 
  else{
    

    try {
        
 
    


      //If the username doesn't already exist  
      //hash the password for storage and create the sql command for creating a user 
      $pass=sha1($pw.SYS_SALT);
      $sql= $db->prepare("INSERT INTO `Accounts`(`Username`, `Password`) VALUES ( :Username , :Password)");
     
      $sql->execute(array(':Username' => $sn,':Password'=>$pass));
      login($db);
    //If the username already exists

      return 1;
    }//end try
    //output errors
    catch (PDOException $e){
      echo 'Connection failed: ' . $e->getMessage();
    }//end try-catch
  }//end pw checking
}

 

