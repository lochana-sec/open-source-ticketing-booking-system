<?php
//To display Text fields
$nod=$_GET['nod'];
require_once("../include/dbconnection_inc.php");

for($i=1;$i<=$nod;$i++){ 
$sqla="sql".$i;
$sqla=mysql_query("SELECT * FROM director");
	echo "<select name=director[] id='director'>";
	while($row=mysql_fetch_array($sqla)){
		echo "<option value='".$row['director_id']."'>".$row['director_name']."</option>";	
	}
	echo "</select>";
	echo "<br /><br />";
}

?>