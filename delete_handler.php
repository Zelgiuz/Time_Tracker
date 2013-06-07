<?php
function delete($db){
  //deletes time entries using the table
  $id=$_POST['ID'];
  $sql= $db->prepare("DELETE FROM `Time` WHERE `ID`= :id");
  $sql->execute(array(':id'=>$id));

}