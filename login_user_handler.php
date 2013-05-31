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
          return 2;
          setcookie("logged",2,$expire,$path,$secure,$httponly);
          
            }		
        else{
          //Settings for the Cookies
          $expire=0; $path="";$secure=FALSE;$httponly=FALSE;

          //Set the cookies for current user and logged in
          setcookie("logged",TRUE,$expire,$path,$secure,$httponly);
          
          setcookie("user",sha1($row[0].SYS_SALT));
          global $encrypt; $encrypt=sha1($row[0].SYS_SALT);
          return 1;
        }
    }
    else{
          return 2;
        setcookie("logged",2,$expire,$path,$secure,$httponly);
        
    }
   }//end try
  //output errors
  catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
  }
}