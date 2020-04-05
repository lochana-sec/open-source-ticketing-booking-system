<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/layout.css" type="text/css" />

<div id="content">
<form id="log" name="log" method="POST" action="userauthentic.php" 
onSubmit="return checkValidate();">
<table width="243" border="0" align="center">
  <tr>
    <th colspan="2" align="left"><h3 class="log1">LOGIN</h3></th>
  </tr>
  <tr>
    <td colspan="2" align="left"><span id="msg" class="error">
    <?php
	if(isset($_REQUEST['msg'])){ //To check the value
		echo $_REQUEST['msg'];
	}
	?>
    
    
    </span>&nbsp;</td>
    </tr>
  <tr>
    <td width="200" align="left" class="inp">User Name</td>
   </tr>
  <tr>
    <td align="left" class="inp">&nbsp;</td>
  </tr>
   <tr>
    <td align="left"><label for="uname"></label>
    <input type="text" name="uname" id="uname" placeholder="User Name" onclick="OnClickField()"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    
  </tr>
  <tr>
    <td align="left" class="inp">Password</td>
    </tr>
  <tr>
    <td align="left" class="inp">&nbsp;</td>
  </tr>
    <tr>
    <td align="left"><label for="pass"></label>
    <input type="password" name="pass" id="pass" placeholder="Password" onClick="OnClickField()"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  
  </tr>
  <tr>
    <td  align="left">
    <button type="submit" name="Login" id="Login"  class="btn btn-success">
          <span class="glyphicon glyphicon-log-in"></span> Log in
       </button></td>
  </tr>
</table>
</form>
</div>
<div id="footer1">
  <?php
    //insert footer part
require_once("../include/footer.php"); ?>
</div>
