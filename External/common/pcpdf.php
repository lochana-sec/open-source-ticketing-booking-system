<?php 
session_start();
if((!isset($_SESSION['userlevel'])) || 
        $_SESSION['userlevel']!='admin1'&& $_SESSION['userlevel']!='admin2'
        && $_SESSION['userlevel']!='md1'
        && $_SESSION['userlevel']!='md2'&& $_SESSION['userlevel']!='customer'&& $_SESSION['userlevel']!='pc'
        
       ){
    header("location:indexinternal.php?err=2");
}
?>
    <?php
$order_ID=$_REQUEST['order_ID'];
require_once '../model/report.php';
$obj=new Report();
$result=$obj->PCReport();

include_once 'common/dompdf/dompdf_config.inc.php';
$date=date("Y/m/d");
$html="<feildset>
    <table width='500' height='1000' border='0' align='center'>
    <tr>
    <td colspan='3'><img src='images/logo.jpg' height='50'></td>
    
    </tr>
     
     <tr>
    <td colspan='3'><font size='3'>RICH COLOR EXPORT (PVT) LTD</font></td>
    
    </tr>
    <tr>
    <td colspan='3'><font size='2'>For Green Journey</font> </td>
    
    </tr>
    
    <tr>
    <td colspan='3' bgcolor='#15f215'></td>
    
    </tr>
    
 <tr>
    <td colspan='3' height='20'></td>
    
    </tr>
   
 <tr>
  
  <td colspan='3' align='center'><font size='20'>Test Report-</font> <br/> <font size='15px'>Order ID :".$order_ID."</font></td></tr></table><br/><br/>";
  $value=  mysql_fetch_assoc($result);
    
    $html.="<table border='1' align='center' cellspacing='0' width='400px'><tr><td>PC Report ID</td><td>".$value['pc_id']."</td></tr><tr><td>Pressing Heat Amount</td><td>".$value['heatp']."</td></tr><tr><td>Pressing Weight<td>".$value['weightp']."</td></tr><tr><td>Pressing Time</td><td>".$value['timep']."</td></tr><tr><td>Curing Heat</td><td>".$value['heatc']."</td></tr><tr><td>Curing Weight</td><td>".$value['weightc']."</td></tr><tr><td>Curing Time</td><td>".$value['timec']."</td></tr><tr><td>Curing Result</td><td>".$value['curingresult']."</td></tr><tr><td>Pressing Result</td><td>".$value['pressingresult']."</td></tr><tr><td>Pressing & Curing Remarks</td><td>".$value['pcremark']."</td></tr>";

  

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("dompdf_out.pdf",
array("Attachment" => false));
exit(0);


 include("foot.inc"); 
?>
