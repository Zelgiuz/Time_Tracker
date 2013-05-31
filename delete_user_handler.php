<?php
function delete_user($db){
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  //hash the password for storage and create the sql query 
	//for creating a user
  $pass=sha1($pw.SYS_SALT);

  $sql= "SELECT * FROM `Accounts` WHERE `Username`='$sn' AND `Password`='$pass'";
  //query 
  $stmt=$db->query($sql);
  if($stmt){
      $row=$stmt->fetch();
        if ($row==null){
          echo("This user does not exist");
          
            }		
        elseif($_COOKIE['user']!=sha1($row[0].SYS_SALT)){
          echo("You can not delete another account from this account");
        }
        else{
          $user=$row[0];
          $sql="DELETE FROM `Time` WHERE `Account_ID`='$user'";
          
          $db->query($sql);
          $sql="DELETE FROM `Accounts` WHERE `Account_ID`='$user'";
          
          $db->query($sql);
          logout();
          echo("<h3> Account: ".$sn." Succesfully deleted</h3>");
        }
  }
  else{
      setcookie("logged","failed",$expire,$path,$secure,$httponly);
  }

}


