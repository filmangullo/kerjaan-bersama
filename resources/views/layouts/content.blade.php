<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>Soft a Human Resource Management Category Bootstrap Responsive Web Template | Contact :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />

	<link href="{{asset("css/font-awesome.css")}}" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
		rel='stylesheet' type='text/css'>
	@yield('style')
</head>

<body>
	<!-- header -->
    <div class="header" id="home">
		@include('layouts.navbar')
	</div>
	<!-- banner -->
	<div class="inner_page_agile">
		<h3>Web Belajar</h3>
	</div>
	<!--//banner -->
	<!--/w3_short-->
	@yield('short')
	<!--//w3_short-->
	<!-- /inner_content -->
	@yield('content')
	<!-- //inner_content -->
	<!-- footer -->
    @extends('layouts.footer')
	<!-- //footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="{{asset("js/jquery-2.1.4.min.js")}}"></script>
	<script type="text/javascript" src="{{asset("js/bootstrap.js")}}"></script>
</body>

</html>