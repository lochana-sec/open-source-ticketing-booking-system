<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");
$sql = "SELECT * FROM drama ORDER BY drama_id DESC";
$result = mysql_query($sql) or die(mysql_error());
include_once '../../External/common/dompdf/dompdf_config.inc.php';




$html='<h4 align="center">Drama Reports</h4>

<br /><br />

<table border="0" align="center" width="500" class="table table-responsive table-striped">
    <tr>
    <th>&nbsp;</th>
    <th>Drama Name</th>
    <th>Director</th>
    <th>Category</th>
    <th>Performing</th>
    <th>Language</th>
    <th>Country</th>
  
  </tr>';
  while ($row_Recordset1 = mysql_fetch_assoc($result)) { 
  $html.='<tr>
    <td align="center" valign="middle">';
   if($row_Recordset1['image']==""){ 
		$html.='<img src="../drama/drama_image/drama2.png" width="75" height="auto" />';
	
   }else{
		$html.='<img src="../drama/drama_image/'.$row_Recordset1['image'].'" width="75" height="auto" />';
        
        
	}
	
    
    
    $html.='</td>
    <td>'.$row_Recordset1["drama_name"].'</td>
    <td>';
	
	$drama_id=$row_Recordset1["drama_id"];
  $sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
  $resultd=mysql_query($sqld);
	while($rowd=mysql_fetch_array($resultd)){
		$html.=$rowd["director_name"];	
	}
		
	$html.='</td>
    <td>'.$row_Recordset1['drama_cat'].'</td>
    <td>'.$row_Recordset1['performing'].'</td>
    <td>'.$row_Recordset1['language'].'</td>
    <td>'.$row_Recordset1['country'].'</td>
    
  </tr>';
  }
 $html.='</table>';
 $dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("dompdf_out.pdf",
array("Attachment" => false));
exit(0);


 include("foot.inc");
