<?php 
session_start();
require_once("include/dbconnection_inc.php");
$cur_date=date("Y-m-d");

//to select last 4 dramas to display in slideahow
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id  ORDER BY s.date DESC LIMIT 5";
$result=mysql_query($sql);

$sqlb="SELECT * FROM drama d,schedule s, time_slot ts
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id AND s.date>'$cur_date' ORDER BY s.date DESC";
$resultb=mysql_query($sqlb);

//to display drama names in drama search txt box
$sqldrama="SELECT * FROM drama ORDER BY drama_name";
$resultdrama=mysql_query($sqldrama);

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NMPT</title>

<!-- favicon (to display logo)-->
<link rel="icon" href="images/drama2.png">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/clear.js"></script>
<script type="text/javascript" src="../js/formvalidation.js"></script>


<script src="common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="common/js/jquery-ui.js" type="text/javascript"></script>
<script src="common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'common/js/facebox/loading.gif',
        closeImage   : 'common/js/facebox/closelabel.png'
      });
    })
</script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common/jquery.min.js"> </script>
<script src="jquery-1.7.1.min.js"> </script>
<script src="slides.min.jquery.js"> </script>
<link type="text/css" rel="stylesheet" href="jq.css">

<link href="CSS/layoutin.css" rel="stylesheet" type="text/css"/>
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>

<script src="jquerislideshow.js"></script>
<script type="text/javascript" src="js/loginvalidate.js"></script>

<link type="text/css" rel="stylesheet" href="css/slider.css" />
<script type="text/javascript" src="js/slideshow-transition-builder-controller.min.js"></script>


<link type="text/css" rel="stylesheet" 
href="bootstrap-3.3.4/css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="bootstrap-3.3.4/js/bootstrap.min.js"></script>


</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"> </div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>

<div id="content" style="color:#000">
<div id="content_left" style="color:#000"> 
<div class="container">
  <h2></h2>
 <div class="container-fluid">
  <h1>&nbsp;</h1>
  <div class="row">
    <div class="col-sm-3 col-md-6 col-lg-4" style="background-color:lavender;" align="center" >
    <h1 class="active">Gamini Haththotuwegama</h1>
      <img src="images/Drama People/z_p12-Haththotuwa.jpg">
      <p>He is recognised as the father of modern street theatre in Sri Lanka. His students have moved from the street to the stage, from stage to television and some even to the silver screen. They owe much to Gamini Haththotuwegama, who, even after manydecades of political theatre, does not seem to have moved at all. In his mid sixties now, the man remains in the street, metaphorically and literally.
He was maybe a couple of years senior to my parents at the Peradeniya University, and they called him “GK”. Some refer to him as “Hatha”, some as “Gamini” and others like myself, “Haththa”. My first recollection of this effervescent man goes back to at least thirty years <a href="http://www.sundayobserver.lk/2009/11/01/fea03.asp" rel="bookmark" target="_blank" style="color:#C00">Read More »</a></p>
 <h1 class="active">
Sir John de Silva</h1>
<img src="images/Drama People/sir_John_de_silva.jpg">
      <p>He subsequently wrote and produced several historical and religious plays drawing from nurti and nadagam traditions. These include Siri Sangabo (1903), Sri Vickrama Rajasinghe (1906), Devanampiya Tissa (1914), Vihara Maha Devi (1916) and Dutugemunu. He also scripted Ramayana, Sakuntala, Vessanatara, Uttara Ramacharitaya, Ratnavali and Nagananda.
de Silva staged his early plays at the Public Hall (later the site of Empire Cinema) with the Sinhala Arya Subodha Natya society. He later formed the Vijaya Ranga society and staged his plays at the Gintupitiya Theatre. de Silva died on January 28, 1922. </p><a href="https://en.wikipedia.org/wiki/John_de_Silva "rel="bookmark" target="_blank" style="color:#C00">Read More »</a></p>
    </div>
    &nbsp;
    <div class="col-sm-9 col-md-6 col-lg-4" style="background-color:lavenderblush;" align="center">
    <h1>Henry Jayasena</h1>
    <img src="images/Drama People/Henry_Jayasena1.jpg">
 <p>While with PWD, Jaysena created many of his most famous plays, Pawkarayo (1958) Janelaya (1962), Thavath Udesenak (1964), Manaranjana Wedawarjana (1965), Ahas Malilga (1966), Hunuwataye Kathawa (1967), Apata Puthey Magak Nethey (1968), Diriya Mawa (1972), Makara (1973) and Sarana Siyoth Se Puthini Habha Yana (1975). Before retiring from government work, he also served as Deputy Director for the National Youth Services Council (Arts and Sports Division) and the Sri Lanka Rupavahini Corporation (Programmes Division)<p><a href="https://en.wikipedia.org/wiki/John_de_Silva "rel="bookmark" target="_blank" style="color:#C00">Read More »</a></p>
 <h1>Mahagama Sekara</h1>
 <img src="images/Drama People/download.jpg">
 <p>Mahagama Sekara (7 April 1929 – 14 January 1976) is one of Sri Lanka’s well known poets and was a significant figure in Sinhalese poetry. He was also a teacher, lyricist, playwright, novelist, artist, translator and a filmmaker. Sekera is best remembered as a poet and songwriter with several of his works even becoming popular songs in Sri Lanka. His works occasionally have an introspective Buddhist influenced outlook. His poems and songs remain widely quoted on the island nearly thirty years after his death. His demise at the age of forty-seven was considered a tragic loss by many in Sri Lankan literary circles</p><a href="https://en.wikipedia.org/wiki/John_de_Silva "rel="bookmark" target="_blank" style="color:#C00">Read More »</a>
 </p></div></div></div></div></div></div></div>
 
<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>