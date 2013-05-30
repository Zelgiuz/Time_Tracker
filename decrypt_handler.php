<?php
function decrypt($encrypt,$db){
      
      //find the user id and only store temporarily 
      //so its not stored on a cookie
      $sql = "SELECT * FROM `Accounts`";
      $stmt=$db->query($sql);
      while($row=$stmt->fetch()){
        if ($encrypt=sha1($row[0].SYS_SALT)){
          $user=$row[0];
          return $user;
        }
        else echo("FAILURE");
      }
      

  


}
