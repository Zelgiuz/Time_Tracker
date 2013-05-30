<?php
function login($db) {
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  try {
    //hash the password for storage and create the sql query 
	//for creating a user
    $pass=sha1($pw.SYS_SALT);

    $sql= "SELECT * FROM `Accounts` WHERE `Username`='$sn' AND `Password`='$pass'";
    //query 
    $stmt=$db->query($sql);
    

   //Check to see if the user is a valid user else output Error 
    if($stmt){
      $row=$stmt->fetch();
        if ($row==null){
              //if no rows exist query failed set cookie as such
	      setcookie("logged","failed",$expire,$path,$secure,$httponly);
            }		
        else{
          //Settings for the Cookies
          $expire=0; $path="";$secure=FALSE;$httponly=FALSE;

          //Set the cookies for current user and logged in
          setcookie("logged",TRUE,$expire,$path,$secure,$httponly);
          setcookie("user",$row[0]);
        }
    }
    else{
        setcookie("logged","failed",$expire,$path,$secure,$httponly);
    }
   }//end try
  //output errors
  catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
  }
}