<?php
include("../include/session_handling.php");
?>
<?php
//To start the session
if(!isset($_SESSION)){
	session_start();	
}
$role_id=$_SESSION['user_role_id'];
//Database connection
require_once("../include/dbconnection_inc.php");
$sql="SELECT * FROM system_user u,user_role ur WHERE u.user_role_id=ur.user_role_id  ORDER BY u.user_id DESC";
$result=mysql_query($sql);
?>
<html>
<head>
<title>NMPT</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="../css/layout.css" />

<link href="../common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/clear.js"></script>
<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../common/js/jquery-ui.js" type="text/javascript"></script>
<script src="../common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../common/js/facebox/loading.gif',
        closeImage   : '../common/js/facebox/closelabel.png'
      });
    })
</script>
<link rel="icon" href="../images/drama/Drama200x200.png" />
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
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		
		
		
		function checkDrama(){
			if(document.getElementById('dname').value==""){
document.getElementById('mess').innerHTML="Empty Drama Name";
			return false;	
			}
			
		}
 
 function del(a){
	var res=confirm("Do You Want to Delete "+a);
	if(res==true){
		return true;
	}else{
		return false;
}
}

 
    </script>
    
    <script type="text/javascript">
function searchUsers(str)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById("show1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchUsers.php?id="+str,true);
xmlhttp.send();
}
</script>
    
    
    <!-- To link JS -->
  <script src="../js/ajax.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<div id="main">
<div id="header">
 <div id="header_content">
    	<?php 
//insert header part
require_once("../include/header.php"); ?>    
    </div>
</div>
<div id="navi"><?php require_once("../include/navi.php"); ?></div>
<div id="content">
    <br />
  <table width="80%" border="0" align="center">
    <tr>
    <td width="57%">
   
    &nbsp;
    <a href="../login/usermenu.php">
    <button class="btn btn-primary"><i class="glyphicon glyphicon-home">
    </i> Home</button>
    </a>
      
    </td>
    <td width="43%">
&nbsp;
    <!--<h4>Search :
    
    <input type="text" class="input-sm" name="search"onKeyUp="searchUsers(this.value)" />
    
    <i class="glyphicon glyphicon-search"></i> </h4>--></td>
  </tr>
  <tr>
    <td colspan="2">
   <p align="center" style="color:green">
   <?php if(isset($_REQUEST['msg'])){
	 	echo $_REQUEST['msg'];  
   }
   ?>
   &nbsp;</p>
   <div id="show1">
   <h2 align="center">User Report</h2>
      <table width="100%" border="0" 
      class="table table-hover table-responsive table-striped">
        <tr>
          <td width="11%">User_ID</td>
          <td width="11%">User Name</td>
          <td width="12%">First Name</td>
          <td width="13%">Last Name</td>
          <td width="10%">Emaill</td>
          <td width="11%">User Role</td>
          
        </tr>
       <?php while($row=mysql_fetch_array($result)){
       ?>
	    <tr>
          <td>
          <?php echo $row['user_id']; ?>&nbsp;</td>
          <td>
          <?php echo $row['username']; ?>
          &nbsp;</td>
          <td>
          <?php echo $row['firstname']; ?>&nbsp;</td>
          <td>
          <?php echo $row['lastname']; ?>
          &nbsp;</td>
          <td>
          <?php echo $row['email']; ?>
          
          &nbsp;</td>
          <td><?php echo $row['user_role_name']; ?>
          &nbsp;</td>
    
        </tr>
        <?php } ?>
      </table>
      </div>
      
      <p>&nbsp;</p></td>
    </tr>
</table>




</div>
  <div id="pre-footer">
    <div id="pre">  &nbsp;
   <!-- <img src="../images/esoft-logo.jpg" height="40" width="auto" /> -->
    </div>
    
    </div>
<div id="footer">
<?php
//insert footer part
require_once("../include/footer.php"); ?>

</div>
</div>
</body>
</html>