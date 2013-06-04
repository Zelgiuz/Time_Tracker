<?php
function delete_user($db){
  $sn=$_POST["username"];
  $pw=$_POST["password"];
  
  //hash the password for storage and create the sql query 
	//for creating a user
  $pass=sha1($pw.SYS_SALT);

  $sql= "SELECT * FROM `Accounts` WHERE `Username`='$sn' AND `Password`='$pass'";
  //query 
  if(isset($_POST['checked']) && 
   $_POST['checked'] == 'confirm'){
    $stmt=$db->query($sql);
  
    if($stmt){
      $row=$stmt->fetch();
        if ($row==null){
          echo('<h3 class="error">This user does not exist</h3>');
          
            }		
        elseif($_COOKIE['user']!=sha1($row[0].SYS_SALT)){
          echo('<h3 class="warning">You may not delete any account other than this one</h3>');
          return 1;
        }
        else{
          $user=$row[0];
          $sql="DELETE FROM `Time` WHERE `Account_ID`='$user'";
          
          $db->query($sql);
          $sql="DELETE FROM `Accounts` WHERE `Account_ID`='$user'";
          
          $db->query($sql);
          logout();
          
          echo('<h3 class="success"> Account: '.$sn.' Successfully deleted</h3>');
          return 0;
        }
    }//end if for stmt
    else{
      return 1;
      echo('<h3 class="error">You must check confirm to delete the account</h3>');
    }
  }//end if for $check
  else{
    echo('<h3 class="error">You must check confirm to delete the account</h3>');
    return 1;
  }
}


