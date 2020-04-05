
<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("dtbs",$con);
	
$query=mysql_query("select * from drama
 where drama_name LIKE '%{$key}%'");
    
	
	while($row=mysql_fetch_assoc($query))
    {
		
      $array[] = $row['drama_name'];
    }
    echo json_encode($array);
?>
