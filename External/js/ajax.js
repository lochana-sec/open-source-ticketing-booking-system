// AJAX
function checkEmail(id)
          {
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
              document.getElementById("mess").innerHTML = '<img src="images/loading.gif" alt="Please Wait" align="middle" />';

              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("mess").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","functionAJAX.php?email="+id,true);
            xmlhttp.send();            
 }

