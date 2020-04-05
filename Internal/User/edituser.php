<?php
//Database connection
require_once("../include/dbconnection_inc.php");
$sql="SELECT * FROM user_role";
$result=mysql_query($sql);

$uid=$_REQUEST['user_id'];
$sqlA="SELECT * FROM system_user WHERE user_id='$uid'";
$resultA=mysql_query($sqlA);
$rowA=mysql_fetch_array($resultA);
?>
<script type="text/javascript">
function checkUserName(str)
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
document.getElementById("show").innerHTML
=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getUserName.php?id="+str,true);
xmlhttp.send();
}
</script>
<script>
function checkForm(){
	var pass=document.getElementById('pass').value;
	var cpass=document.getElementById('cpass').value;
	if(pass!="" && pass.length<6){
	document.getElementById('msg').innerHTML
		="Password should be more than 6 characters";	
		document.getElementById('pass').focus();
		document.getElementById('pass').select();
		return false;
	}
	
	if(pass!="" && pass!=cpass){
		document.getElementById('msg').innerHTML
		="Passwords are not matching";
		document.getElementById('cpass').focus();
		document.getElementById('cpass').select();
		return false;	
	}
	
		
		return true;
}



</script>

<link rel="stylesheet" type="text/css" 
href="../bootstrap/css/bootstrap.min.css"/>
<form method="post" action="edituserprocess.php?uid=<?php echo $uid; ?>"
onsubmit="return checkForm()">
<table width="300" border="0" 
class="table table-condensed table-hover">
  <tr>
    <td><span id="msg"></span>&nbsp;</td>
  </tr>
  <tr>
    <td>
    First Name
    &nbsp;</td>
  </tr>
  <tr>
    <td><label for="fname"></label>
    <input type="text" name="fname" id="fname" value="<?php echo $rowA['firstname']; ?>"
    required></td>
  </tr>
  <tr>
    <td>Last Name</td>
  </tr>
  <tr>
    <td><input type="text" name="lname" id="lname" value="<?php echo $rowA['lastname']; ?>"></td>
  </tr>
  <tr>
    <td>Email</td>
  </tr>
  <tr>
    <td><input type="email" name="email" id="email" value="<?php echo $rowA['email']; ?>"></td>
  </tr>
  <tr>
    <td>User Role</td>
  </tr>
  <tr>
    <td>
      <select name="urole" id="urole">
      <?php while($row=mysql_fetch_array($result)){ ?>
  <option 
  value=" <?php echo $row['user_role_id']; ?>" 
  <?php if($row['user_role_id']==$rowA['user_role_id']){ ?> selected="selected" <?php } ?>>
  <?php echo $row['user_role_name']; ?>
  </option>
      <?php }?>
    </select></td>
  </tr>
  <tr>
    <td>User Name</td>
  </tr>
  <tr>
    <td>
 <input type="text" name="uname" id="uname" 
 onkeyup="checkUserName(this.value)" value="<?php echo $rowA['username']; ?>" readonly="readonly">
 &nbsp;<span id="show"></span>
 
 
 </td>
  </tr>
  <tr>
    <td>Password</td>
  </tr>
  <tr>
    <td><input type="password" 
    name="pass" id="pass">&nbsp;</td>
  </tr>
  <tr>
    <td>Confirm Password</td>
  </tr>
  <tr>
    <td><input type="password" 
    name="cpass" id="cpass">&nbsp;</td>
  </tr>
  <tr>
    <td><button type="submit" class="btn btn-primary"
    ><i class="glyphicon glyphicon-user"></i>
    Add</button> &nbsp;</td>
  </tr>
</table>
</form>