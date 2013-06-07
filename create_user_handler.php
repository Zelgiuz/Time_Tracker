<?php


function create_user($db){//Grab the arguments for the function from the post
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  $retype=$_POST["retyped"];
  //Only allow users and passwords to be more than 4 characters
  if (strlen($sn)<5){echo('<h3 class="warning"> Username isnt long enough</h3>');return;}
  if (strlen($pw)<5){echo('<h3 class="warning"> Password isnt long enough</h3>');return;}
  //if the password 2 password fields aren't equal end
  if(!($pw==$retype)){ echo('<h3 class="warning"> PassWords do not match</h3>');return;}

  //else continue; 
  else{
    

    try {
        
 
      $sql= $db->prepare("SELECT * FROM `Accounts` WHERE `Username`= :Username");
     
      $sql->execute(array(':Username' => $sn));
      if($row=$sql->fetch()){
        if ($row!=NULL){
          echo('<h3 class="warning"> Username already exists please try another</h3>');
          return 0;
        }  
      }


      //If the username doesn't already exist  
      //hash the password for storage and create the sql command for creating a user 
      $pass=sha1($pw.SYS_SALT);
      $stmt= $db->prepare("INSERT INTO `Accounts`(`Username`, `Password`) VALUES ( :Username , :Password)");
     
      $stmt->execute(array(':Username' => $sn,':Password'=>$pass));
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

 

