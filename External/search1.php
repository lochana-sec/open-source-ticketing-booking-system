
<?php
    $key1=$_GET['key1'];
    $array1 = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("dtbs",$con);
	
$query1=mysql_query("select * from system_user
 where firstname LIKE '%{$key1}%'");
    
	
	while($row1=mysql_fetch_assoc($query1))
    {
		
      $array1[] = $row1['firstname'];
    }
    echo json_encode($array);
?>
