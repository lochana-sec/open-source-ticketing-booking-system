$(document).ready(function() {
	$("#formcr").submit(function() {
    var nic=$("#nic").val();
	var tno=$("#mobile").val();
	var pat=/^[0-9]{9}[vVxX]$/;
	var pat1=/^[+0-9]{10,11}$/;
	if(!nic.match(pat)){
		alert("Inavlid NIC");
		$("#nic").focus();
		$("#nic").select();
		return false;	
	}
	
	if(!tno.match(pat1)){
		alert("Invalid Mobile No");
		$("#mobile").focus();
		$("#mobile").select();
		return false;	
	}
	
	if($("#pass").val()!=$("#cpass").val()){
		alert("Passwords are not matched");
		$("#cpass").focus();
		$("#cpass").select();
		return false;	
	}
	

	

	});
});