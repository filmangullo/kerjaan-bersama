<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>Web Belajar</title>
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
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		@include('layouts.navbar')
	</div>
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h4 style="font-size:24px;">Kenapa kita seringkali gagal? Karena kita selalu banyak berencana dan terlalu sedikit berpikir.</h4>
						<p>Dewi Widya Astuti</p>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h4 style="font-size:24px;">Tak ada batasan dalam hidup, kecuali yang kau buat sendiri.</h4>
						<p>Les Brown</p>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h4>Ia yang mengerjakan lebih dari apa yang dibayar pada suatu saat akan dibayar lebih dari apa yang ia kerjakan.</h4>
						<p>Napoleon Hill</p>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">

						<h4>Jangan biarkan opini orang lain menenggelamkan suara dari dalam diri Anda.</h4>
						<p>Steve Jobs</p>

					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->

        <!-- /inner_content -->
        <div class="inner_content_info_agileits">
            <div class="container">
                @auth
                    @if (Auth::user()->role != 'pelajar' && Auth::user()->role_approve == true)
                    <div class="tittle_head_w3ls">

                        <h1 class="text-right">
                            <a href="{{route("mata-pelajaran.create")}}" class="label label-primary">Tambah Pelajaran</a>
                        </h1>

                        <h3 class="tittle">PELAJARAN</h3>
                    </div>
                    @endif
                @endauth

                    <div class="inner_sec_grids_info_w3ls">
                        @foreach ($mataPelajaran as $item)
                        <div class="col-md-4 blog-grid one lost">
                            <a
                                @auth
                                    @if (Auth::user()->role_approve == true)
                                        href="{{route("pertemuan.index", $item->id)}}"
                                @endif
                                    @endauth ><img src="{{asset("images/e4.jpg")}}" alt=""></a>
                            <div class="events_info">
                                <h4><a
                                        @auth
                                            @if (Auth::user()->role_approve == true)
                                                href="{{route("pertemuan.index", $item->id)}}"
                                            @endif
                                        @endauth >{{$item->nama}}</a></h4>
                                <p>{{substr($item->keterangan, 0,70)}} ...</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>

                    </div>

            </div>
        </div>

	<!-- footer -->
	@extends('layouts.footer')
	<!-- //footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="{{asset("js/jquery-2.1.4.min.js")}}"></script>

	<script type="text/javascript" src="{{asset("js/bootstrap.js")}}"></script>
</body>

</html>
