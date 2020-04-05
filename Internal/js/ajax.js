// AJAX
function loadD(id)
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
              document.getElementById("showd").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" align="middle" />';

              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("showd").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","functionAJAX.php?nod="+id,true);
            xmlhttp.send();            
 }

function loadShowTime(id)
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
              document.getElementById("showt").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" align="middle" />';

              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("showt").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","functionAJAX.php?date="+id,true);
            xmlhttp.send();            
 }