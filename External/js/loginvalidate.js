$(document).ready(function() {
	$("#form1").submit(function() {
    var email=$("#email").val();
	var pwd=$("#pwd").val();
	if(email==""){
		$("#msg").text("Empty User Name");
		return false;
	}
	if(pwd==""){
		$("#msg").text("Empty Password");
		return false;
	}
	
	});
});