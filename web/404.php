<?php
//Reset buffer
ob_clean();
//General 404 status msg
header("HTTP/1.1 404 Page Not Found");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>404 - Page Not Found</title>
		<style type="text/css" media="screen">
			@font-face {
				font-family: 'Apple-Chancery';
				src: url('/themes/aesir/fonts/Apple-Chancery.eot');
				src: local('☺'), url('/themes/aesir/fonts/Apple-Chancery.woff') format('woff'), url('/themes/aesir/fonts/Apple-Chancery.ttf') format('truetype'), url('/themes/aesir/fonts/Apple-Chancery.svg') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			body {
				margin: 10px;
				padding: 0;
				font-family: "Apple-Chancery", "Lucida Grande", "Lucida Sans", sans-serif;
				background:#ffbfbe;
			}
			h1 {
				font-size:62px;
				color:#AF8483;
			}
			h2 {
				font-size:24px;
				color:#B98B8A;
				margin-bottom:50px;
			}
			h3 {
				font-size:18px;
				color:#AE8483;
			}
		</style>
	</head>

	<body>
	<center>
		<h1>404 - page not found</h1>
		<h2>try hiting the return button...</h2>
		<img alt="" src="/themes/aesir/images/gophers-working-pink.png"></img>
		<h3>maybe our gopher are still working to get this page up.</h3>
		</center>
	</body>
</html>
