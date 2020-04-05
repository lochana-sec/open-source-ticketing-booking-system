<table align="center" class="table table-hover" style="color:black">

        <tr>
          <td height="41" colspan="3"><strong>Drama Information</strong></td>
        </tr>
         <tr>
           <td height="25">
           <table class="table table-hover" style="color:black">
 
    <tr>
      <td height="43" colspan="2">Contact Name</td>
      <td height="43"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></td>
      <td width="22%" height="43">Contact Number (947xxxxx)</td>
      <td width="27%"><?php echo $_SESSION['mobile']; ?></td>
    </tr>
    <tr>
      <td height="31" colspan="2">E-mail</td>
      <td height="31"><?php echo $_SESSION['email']; ?></td>
      <td height="31">Remark
        <label><em>(optional)</em></label></td>
      <td height="31">&nbsp;</td>
    </tr>
    </table>
           