<?php
function delete($db){
  $id=$_POST['ID'];
  $sql= $db->prepare("DELETE FROM `Time` WHERE `ID`= :id");
  $sql->execute(array(':id'=>$id));

}