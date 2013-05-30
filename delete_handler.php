<?php
function delete($db){
  $id=$_POST['ID'];
  $sql= "DELETE FROM `Time` WHERE `ID`='$id'";
  $db->query($sql);

}