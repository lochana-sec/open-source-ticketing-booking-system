<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title>FancyBox 1.3.4 | Demonstration</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="layout.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/layoutin.css" rel="stylesheet" />
 	<link rel="stylesheet" href="style.css" />
 	<link href="layout.css" rel="stylesheet" type="text/css" />
 	<link href="layoutin.css" rel="stylesheet" type="text/css" />
 	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
</head>
<body>
<div id="header"></div>
<?php require_once("../include/header.php"); ?> 
<div id="navi"></div>

<div id="content">
  <p><br />

		<a id="example1" href="example/download.jpg"><img alt="example1" src="example/download.jpg" width="330" /></a>

		<a id="example2" href="example/z_p-46-Madyawediyakuge.jpg" ><img alt="example2" src="example/z_p-46-Madyawediyakuge.jpg" width="180" /></a>

		<a id="example3" href="example/z_p17-Balloth.jpg"><img alt="example3" src="example/z_p17-Balloth.jpg" width="300" /></a>
		
		<a id="example4" href="example/284.jpg"><img class="last" alt="example4" src="example/284.jpg" width="400" /></a>
    <a id="example7" href="example/11_b.jpg"><img class="last" alt="example4" src="example/11_b.jpg" width="400" /></a><a id="example8" href="example/natuukari-pic-300x147.jpg"><img class="last" alt="example4" src="example/natuukari-pic-300x147.jpg" width="400" /></a><a id="example9" href="example/images (1).jpg"><img class="last" alt="example4" src="example/images (1).jpg" width="400" /></a></p>

	<p><br />
	  <a id="example6" href="example/1063.JPG"/><img alt="example5" src="example/1063.JPG" width="300"/></a>
      <a id="example5" href="example/z_p26-Authenticity3.jpg"><img alt="example4" src="example/z_p26-Authenticity3.jpg" width="300"/></a>
      <a rel="example_group" href="example/images.jpg" title=""><img alt="" src="example/images.jpg" width="400" /></a>
  <p><br />
  <p>&nbsp;</p>
</div>
</body>
</html>