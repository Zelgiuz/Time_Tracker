<?php 
function reset_password($db){
    //re-retrieve the necessary user information from the reset password form
    $user=$_POST['username'];
    $oldpw=$_POST['old-password'];
    $pw=$_POST['password'];
    $retype=$_POST['retype-password'];
    
    //Check that the necessary restrictions to passwords have been met
    if ($pw!=$retype){ echo('<h3 class="error"> New passwords do not match.</h3>');return;}
    if (strlen($pw)<5){ echo('<h3 class="error"> New password not long enough.</h3>');return;}
    
    $oldpass=sha1($oldpw.SYS_SALT);
    $pass=sha1($pw.SYS_SALT);
    
    //Make sure the user entered the proper information again
    $sql= $db->prepare("SELECT * FROM `Accounts` WHERE `Username`= :user AND `Password`= :pass");
    $sql->execute(array(':user'=> $user,':pass'=> $oldpass));
    $row=$sql->fetch();
    if ($row==NULL){echo('<h3 class="error">Username or Old password is incorrect</h3>');return;}
    
    //Change the password   
    $sql= $db->prepare("UPDATE `Accounts` SET `Password`= :pass WHERE `Username` = :user");
    $sql->execute(array(':pass'=>$pass,':user'=>$user));

}