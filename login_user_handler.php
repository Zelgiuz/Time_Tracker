<?php
function login($db) {
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  //Don't allow old users with shor tpasswords to login without making their passwords more secure
  if (strlen($pw)<5){echo('<h3 class="warning">PassWord too short reset password</h3>');create_form_reset_password();return 0;}
  try {
    //hash the password for an information checking sql query 
	//for logging a user in
    $pass=sha1($pw.SYS_SALT);

    $sql=$db->prepare("SELECT * FROM `Accounts` WHERE `Username`= :Username AND `Password`= :Password");
    $sql->execute(array(':Username'=> $sn,':Password'=> $pass));
    

   //Check to see if the user is a valid user else output Error 
    if($sql){
      $row=$sql->fetch();
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
          
          //Set the global $encrypt value for specific usages later on namely checking the current user
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