@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Panduan</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Panduan</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="w3layouts_mail_grid row" style="text-align: left">
                <p>1. Siswa atau guru untuk pertama kali diwajibkan Registrasi atau daftar terlebih dahulu, jika sudah/pernah registrasi silahkan ke Poin ke 2 untuk login.</p> <br>
                <img src="{{asset('images/register.png') }}" style="width: 90%; margin">
            </div>

            <div class="w3layouts_mail_grid row" style="text-align: left">
                <p>2. Siswa atau guru yang sudah mendaftar/registrasi wajib login untuk mengikuti proses belajar mengajar.</p> <br>
                <img src="{{asset('images/login.png') }}" style="width: 90%; margin">
            </div>
        </div>

    </div>
</div>
@endsection
