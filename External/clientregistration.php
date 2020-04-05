<?php 
require_once("include/dbconnection_inc.php");

/** $cur_date=date("Y-m-d");

//to select last 4 dramas to display in slideahow
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id AND s.date>='$cur_date' ORDER BY s.date DESC LIMIT 5";
$result=mysql_query($sql);

$sqlb="SELECT * FROM drama d,schedule s, time_slot ts
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id AND s.date>='$cur_date' ORDER BY s.date DESC";
$resultb=mysql_query($sqlb);

//to display drama names in drama search txt box
$sqldrama="SELECT * FROM drama ORDER BY drama_name";
$resultdrama=mysql_query($sqldrama); **/

$sql="SELECT * FROM district" ;
$result=mysql_query($sql);

$month=array("January","February","March","April","May","June","July","August",
"September","Octomber","November","December");
$title=array("Rev","Prof","Dr","Mr","Mrs","Ms");
$y=date("Y");
$ya=$y-18;
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BMICH</title>

<!-- favicon (to display logo)-->
<link rel="icon" href="images/logo2 copy1.png">

<link href="common/bootstrap.min.css" rel="stylesheet">

<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/clear.js"></script>
<script type="text/javascript" src="../js/formvalidation.js"></script>


<script src="common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="common/js/jquery-ui.js" type="text/javascript"></script>
<script src="common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'common/js/facebox/loading.gif',
        closeImage   : 'common/js/facebox/closelabel.png'
      });
    })
</script>

<script src="common/bootstrap.min.js"></script>
<script src="common/jquery.min.js"> </script>
<script src="jquery-1.7.1.min.js"> </script>
<script src="slides.min.jquery.js"> </script>
<link type="text/css" rel="stylesheet" href="jq.css">

<link href="CSS/layoutin.css" rel="stylesheet" type="text/css"/>
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>

<script src="jquerislideshow.js"></script>
<script src="js/clientregistration.js"></script>
<!--only numbers(restrict to type letters) -->
<script language="Javascript" type="text/javascript"> 
 
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57) && 
				charCode!=43) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		</script>
<script type="text/javascript" src="js/ajax.js">
</script>
</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>
      

<div id="content">

<form method="post" action="addclientprocess.php" id="formcr">
  <table width="580" border="0" align="center" style="color:black">
  
  <tr>
    <td height="81" colspan="3" align="center"> 
    <h3>Register with NMPT</h3></td>
    </tr>
     <tr>
    <td colspan="3" align="center"> 
    <span class="alert1">
    <?php if(isset($_REQUEST['msg'])) { 
		
		echo $_REQUEST['msg'];
	}
	?>
    </span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="35">Title</td>
    <td>
      <select name="title" id="title" required>
      <option value="">Title</option>
      <?php foreach($title as $t){ ?>
      <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
    
      <?php } ?>
      </select>
       <span id="req">*</span></td>
  </tr>
  <tr>
    <td width="24">&nbsp;</td>
    <td width="182" height="35">First Name</td>
    <td width="360">
      <input name="fname" type="text" id="fname" size="40" maxlength="40" 
      required> <span id="req">*</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Last Name</td>
    <td>
      <input type="text" name="lname" id="lname" size="40" 
      maxlength="40" required>
      <span id="req">*</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Gender</td>
    <td>Male <input type="radio" name="radio" id="male" value="male">
    Female <input type="radio" name="radio" id="female" value="female">
    <span id="req">*</span>
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">DOB</td>
    <td>
      <select name="date" id="date" required>
       <option value="0">Date
        <?php for($i=1;$i<=31;$i++){?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>`
       <?php } ?>
       </option>
       
      </select>&nbsp;
      <select name="month" id="month" required>
       <option value="">Month</option>
        <?php foreach($month as $k=>$v){ ?>
      <option value="<?php echo $k+1; ?>"><?php echo $v; ?></option>
    
      <?php } ?>
      </select>&nbsp;
      <select name="year" id="year" required>
       <option value="0">Year
       <?php for($i=1930;$i<=$ya;$i++){?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>`
       <?php } ?>
       </option>
      </select>&nbsp;
      <span id="req">*</span>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">NIC</td>
    <td> <input type="text" name="nic" id="nic" size="10" 
    maxlength="10" required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Address</td>
    <td><input type="text" name="address" id="address" 
    size="40" maxlength="40" required> <span id="req">*</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">City</td>
    <td> <input type="text" name="city" id="city" size="40"
     maxlength="40" required> <span id="req">*</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">District</td>
    <td><select name="district">
  <?php while ($rowdis=mysql_fetch_array($result)){?>
    <option value="<?php echo $rowdis['d_id'];?>">
    <?php echo $rowdis['description']; ?></option>
	<?php } ?>
  </select> <span id="req">*</span>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Contact No</td>
    <td><input type="text" name="mobile" id="mobile" size="11" 
    maxlength="10" onKeyPress="return onlyNos(event,this);" required>
    <span id="req">*</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Email</td>
    <td>  <input type="email" name="email" id="email" size="40" 
    maxlength="40" required 
    onKeyUp="checkEmail(this.value)"> 
    <span id="req">*</span> <span id="mess">&nbsp;</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Password</td>
    <td><input type="password" name="pass" id="pass" 
    size="40" maxlength="40" required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40">Confirm</td>
    <td> <input type="password" name="cpass" id="cpass" 
    size="40" maxlength="40" required>
  
    </td>
  </tr>
  <tr>
    <td height="10" colspan="3"> 
	</td>
    </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
    <td height="10" colspan="1">
    <input type="checkbox" name="ch" id="ch" value="1" required /> I agreeed to terms</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" colspan="2" align="center">
    <input type="submit" name="regisubmit" id="regisubmit" value="Submit" class="btn-sm btn-primary" style="background:#000" />&nbsp;
    <input type="reset" name="reset" id="reset" value="Reset" class="btn-sm btn-primary" style="background:#000" />&nbsp;
    
    </tr>
  <tr>
    <td height="40" colspan="3">&nbsp;    </td>
    </tr>
  
</table>
</form>
</div>


<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/fb.jpg" width="30" height="30"></li>
        <li style="width:50px"><img src="images/tw.jpg" width="30" height="30"></li>
       <li style="width:50px"><img src="images/g.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/ut.jpg" width="30" height="30"></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>