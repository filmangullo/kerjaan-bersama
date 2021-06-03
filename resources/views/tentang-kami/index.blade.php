@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Tentang Kami</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="testimonials_section">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Tentang Kami</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div id="Carousel" class="carousel slide two row">
                <!-- Carousel items -->

                <div class="row">
                    <div class="col-md-3">
                        <img style="display: block;
                    margin-left: auto;
                    margin-right: auto; height:300px;"
                    src="{{ asset('images/dewi.jpg') }}" >
                    </div>
                    <div class="col-md-9">
                        <div class="item active" style="margin-bottom: 15px;">
                            <div class="testimonials_grid_wthree">
                                <h5>Dewi Widya Astuti</h5>

                                <h4><i class="fa fa-quote-left" aria-hidden="true"></i> Dewi Widya Astuti lahir dari pasangan ayah Erlani dan ibu Riwayati pada 27 April 1996 di Besitang. Wanita yang akrab disapa Dewi ini mngenyam pendidikan terakhirnya di Madrasah Aliyah Swasta Proyek Univa Medan (2014), dan sekarang sedang menjadi mahasiswa jurusan pendidikan teknik elektro di UNIMED.    </h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-inner col-md-1">


                    <!--.item-->

                </div>
                <!--.carousel-inner-->
                <div class="col-md-2"
                    style="width: 100% text-align:center; padding:6px">

                </div>
            </div>
            <!--.Carousel-->

        </div>
    </div>
</div>
@endsection
