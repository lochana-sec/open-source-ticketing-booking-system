function checkValidate(){
	if(document.getElementById('uname').value=="" &&  
	document.getElementById('pass').value==""){
		document.getElementById('msg').innerHTML="Blank User Name and Password";
		document.getElementById('uname').focus();
		return false;
	
	}else if(document.getElementById('uname').value==""){
		document.getElementById('msg').innerHTML="Blank User Name";
		document.getElementById('uname').focus();
		return false;
	}else if(document.getElementById('pass').value==""){
		document.getElementById('msg').innerHTML="Blank Password";
		document.getElementById('pass').focus();
		return false;
	}
		return true;
	}

function OnClickField(){
	
	document.getElementById("msg").innerHTML="";
}

function del(a){
	var r=confirm("Do you want to Delete "+a+" ?");	
	if(r==true){
		return true;	
	}else{
		return false;	
	}
	
}



