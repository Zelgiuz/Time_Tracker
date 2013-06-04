<?php
function display_time($db){
  $user=decrypt($db);
    $sql="SELECT * FROM `Time` WHERE `Account_ID`='$user' ORDER BY `Start` DESC";
    $stmt=$db->query($sql);
	if ($stmt){
		echo('<div id="timetable">
      <table border="0" style"border-collapse:collapse;" cellspacing="0">
		  <tr>
		    <th>Start</th>
		    <th>Stop</th>
			<th>Total</th>
      
		  </tr>
		  ');
	    while ($row=$stmt->fetch()){
        if ($row[1]==0){
          echo('<tr id="in-progress">
            <td id="in-progress">'.date('D, M jS Y h:i:s a',$row[0]).'</td>	
            <td id="in-progress">In Progress</td>
            <td id="in-progress">'.gmdate("H:i:s",(time()-$row[0])).'</td>
		        </tr>');
        }
        else{
		 
          echo('<tr>
            <td>'.date('D, M jS Y h:i:s a',$row[0]).'</td>	
            <td>'.date('D, M jS Y h:i:s a',$row[1]).'</td>
            <td>'.gmdate("H:i:s",($row[1]-$row[0])).'</td>
            <td><form method="post" action="index.php">
                <input type="submit" value="Delete"><br>
                <input type="hidden" name="exe" value="delete">
                <input type="hidden" name="ID" value="'.$row[3].'">
				</form>
				</td>
		        </tr>');
				
        }
		}
	
	    echo('</table></div>');
	}
	else{
	 echo('I am sorry but there are no records of your time logs');
	}
}