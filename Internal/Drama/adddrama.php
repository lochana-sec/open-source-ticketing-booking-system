<?php
include("../include/session_handling.php");
?>

<html>
<head>
<title>User Menu</title>
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
<div style="margin-left:100px">
<a href="../login/usermenu.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;&nbsp;
 <a href="../drama/dramamanagement.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button></a> 
   
</div>
<form method="post" action="adddramaprocess.php" enctype="multipart/form-data"
name="dra" onSubmit="return checkDrama()">
<table width="579" height="723" border="0" align="center" >
  <tr>
    <td colspan="2"><h4 align="center">Add Drama</h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span id="mess" 
    style="color:#F00; font-style:italic"></span>&nbsp;</td>
  </tr>
  <tr>
    <td width="231" height="40">Drama Name</td>
    <td width="314">
    <input type="text" name="dname" id="dname" size="40"/></td>
  </tr>
  <tr>
    <td height="40">Drama Category</td>
    <td>
      <select name="dcat" id="dcat">
      <option value="">select category</option>
        <option value="Comady">Comady</option>
        <option value="Education">Education</option>
        <option value="Classic">Classic</option>
      </select></td>
  </tr>
    <tr>
    <td height="40">No of Directors</td>
    <td>
      <select name="nod" id="nod" onChange="loadD(this.value)">
      <option value="">No of Directors </option>
      <?php for($i=1;$i<=3;$i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php } ?>
      </select></td>
  </tr>
    <tr>
      <td height="40">Director(s)</td>
      <td>
    	<span id="showd">
      <input type="text" name="director[]" id="director" />&nbsp;</span></td>
    	
    </tr>
  <tr>
    <td height="96">Performing</td>
    <td>
    <textarea name="perform" id="perform" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="45">Drama Description</td>
    <td>
    <textarea name="ddes" id="ddes" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="40">Year</td>
    <td>
    <input type="text" name="year" id="year" maxlength="4" 
    onKeyPress="return onlyNos(event,this);" /></td>
  </tr>
  <tr>
    <td height="40">Language</td>
    <td>
      
      <select name="lan" id="lan">
        <option value="Sinhala">Sinhala</option>
        <option value="Tamil">Tamil</option>
      </select></td>
  </tr>
  <tr>
    <td height="40">Country</td>
    <td>
      <select name="country" id="country">
        <option value="Sri Lanak">Sri Lanaka</option>
        <option value="Uk">UK</option>
      </select></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td>
      
    <input type="file" name="image" id="image" /></td>
  </tr>
  <tr>
    <td height="40">Video Clip</td>
    <td><input type="file" name="video" id="video" /></td>
  </tr>
  <tr>
    <td height="57">Audio Clip</td>
    <td><input type="file" name="audio" id="audio" /></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center">
    <button type="submit" name="save" id="save"  class="btn btn-success">
          <span class="glyphicon glyphicon-saved"></span> Save
       </button></td>
  </tr>
</table>
</form>




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