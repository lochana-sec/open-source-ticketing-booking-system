
<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("dtbs",$con);
	
$query=mysql_query("select * from audience
 where fname LIKE '%{$key}%' or lname LIKE '%{$key}%'");
    
	
	while($row=mysql_fetch_assoc($query))
    {
		
      $array[] = $row['fname']." ".$row['lname'];
    }
    echo json_encode($array);
?>
