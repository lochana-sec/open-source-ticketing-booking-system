<?php
session_start();
$cdate=date("Y-m-d");
$ts=time();

require_once("include/dbconnection_inc.php");

if(isset($_REQUEST['sid'])){
	$pid=$_SESSION['sid'];
$sid=$_SESSION['sid'];
echo $session_id=$_SESSION['session_id'];
$total=$_SESSION['total'];
$bdate=date("Y-m-d");
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND 
ts.time_slot_id=s.time_slot_id  
AND schedule_id='$sid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

$pm="paypal";

$drama_id=$row['drama_id'];
$drama_name=$row['drama_name'];
$time_slot_id=$row['time_slot_id'];
$description=$row['description'];
$date=$row['date'];

//To get ticket prices
$sqlb="SELECT * FROM booking
WHERE session_id='$session_id'";
$resultb=mysql_query($sqlb);

//To get ticket prices
$sqlpp="SELECT * FROM payment 
WHERE pay_id='$pid'";
$resultpp=mysql_query($sqlpp);
$rowp=mysql_fetch_array($resultpp);

$sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
$resultd=mysql_query($sqld);
$dirarray=array();
while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}

}
include_once 'common/dompdf/dompdf_config.inc.php';
$html="<table width='500' cellpadding='0' cellspacing='0'>
  
<tr style='background-color:#000'><td width='100'>&nbsp;</td>
<td width='300' align='center'>&nbsp;</td>
<td width='100'>&nbsp;</td></tr>
    <tr>
      <td height='400px' colspan='9' align='center'>&nbsp;
        <table width='400' border='0' align='center'>
          <tr>
            <td width='100'>Ref No:".$rowp['pay_id']."</td>
            <td width='200' align='center'><h3>E-Ticket</h3></td>
            <td width='100'>&nbsp;</td>
            </tr>
          <tr>
            <td colspan='3' align='center'>
              
              <table width='400' align='center' border='0'>
                <tr>
                  <td width='200'><span class='pa'>Drama Name</span></td>
                  <td width='200'>".$drama_name."&nbsp;</td>
                  </tr>
				<tr>
                  <td>Total Amount (RS)</td>
                  <td>".$rowp['total']."&nbsp;</td>
                  </tr>
                
                <tr>
                  <td>Date/Time</td>
                  <td>".$date."&nbsp;(".$description.")</td>
                  </tr>
                <tr>
                  <td>Payment Method</td>
                  <td>".$rowp['method']."&nbsp;</td>
                  </tr>				  
				  <tr>
                  <td>Seat Reference</td>
                  <td>
                    <table border='1' width='200' style='border:border-collapse'><tr>
					<td>";
					while($rowseat=mysql_fetch_array($resultb)){
						$html.="<td>".$rowseat['seatref']."</td>";
						
					}
					
					
					$html.="</td>
					
					</tr>
                      </table>
                    &nbsp;</td>
                  </tr>
                <tr>
                  <td>Contact Name</td>
                  <td>".$_SESSION['fname']." ".$_SESSION['fname']."&nbsp;</td>
                  </tr>
                <tr>
                  <td>Mobile Number</td>
                  <td>".$_SESSION['mobile']."&nbsp;</td>
                  </tr>
                <tr>
                  <td>Email Address</td>
                  <td>".$_SESSION['email']."&nbsp;</td>
                  </tr>
                
                <tr>
                  <td height='22'>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
          </table></td></tr>
    </table>";

				  
				  
				  
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("dompdf_out.pdf",
array("Attachment" => false));
exit(0);


 include("foot.inc"); 
 ?>