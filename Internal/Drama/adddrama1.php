<!--lect-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Drama</title>
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



</head>

<body>
<form method="post" action="adddramaprocess.php" enctype="multipart/form-data"
name="dra" onsubmit="return checkDrama()">
<table width="555" border="0" >
  <tr>
    <td colspan="2"><h4 align="center">Add Drama</h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span id="mess" 
    style="color:#F00; font-style:italic"></span>&nbsp;</td>
  </tr>
  <tr>
    <td width="231" height="35">Drama Name</td>
    <td width="314"><label for="dname"></label>
    <input type="text" name="dname" id="dname" size="40"/></td>
  </tr>
  <tr>
    <td>Drama Category</td>
    <td><label for="dcat"></label>
      <select name="dcat" id="dcat">
      <option value="">select category</option>
        <option value="Comady">Comady</option>
        <option value="Education">Education</option>
        <option value="Classic">Classic</option>
      </select></td>
  </tr>
  <tr>
    <td>Performing</td>
    <td><label for="perform"></label>
    <textarea name="perform" id="perform" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Drama Description</td>
    <td><label for="ddes"></label>
    <textarea name="ddes" id="ddes" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Year</td>
    <td><label for="year"></label>
    <input type="text" name="year" id="year" maxlength="4" 
    onKeyPress="return onlyNos(event,this);" /></td>
  </tr>
  <tr>
    <td>Language</td>
    <td><label for="lan"></label>
      <label for="lan"></label>
      <select name="lan" id="lan">
        <option value="Sinhala">Sinhala</option>
        <option value="Tamil">Tamil</option>
      </select></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><label for="country"></label>
      <select name="country" id="country">
        <option value="Sri Lanak">Sri Lanaka</option>
        <option value="Uk">UK</option>
      </select></td>
  </tr>
  <tr>
    <td>Image</td>
    <td><label for="image"></label>
      <label for="image"></label>
    <input type="file" name="image2" id="image" /></td>
  </tr>
  <tr>
    <td>Video Clip</td>
    <td><input type="file" name="video" id="video" /></td>
  </tr>
  <tr>
    <td height="57">Audio Clip</td>
    <td><input type="file" name="audio" id="audio" /></td>
  </tr>
  <tr>
    <td height="52" colspan="2"><input type="submit" name="save" id="save" value="Submit" /></td>
  </tr>
</table>
</form>
</body>
</html>