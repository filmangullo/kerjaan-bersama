@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Kontak</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
    <!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">Kontak</h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				@if ($message = Session::get('success'))
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Sudah selesai dilakukan dengan baik!</h4>
					<p>{{$message}}</p>
					<hr>
					<p class="mb-0">Kapanpun Anda membutuhkannya, pastikan untuk menggunakan utilitas margin untuk menjaga semuanya tetap bagus dan rapi.</p>
				</div>
				@endif
				<div class="clearfix"> </div>
				<div class="w3layouts_mail_grid">
					<form action="{{route("kontak.store")}}" method="post">
						@csrf
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="name" placeholder="Nama" required="">
							<input type="email" name="email" placeholder="Email" required="">
							<input type="text" name="telepon" placeholder="Telephone / HP" required="">
							<input type="text" name="subject" placeholder="Subjek" required="">
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<textarea name="message" placeholder="Pesan..." required=""></textarea>
							<input type="submit" value="Submit">
						</div>
						<div class="clearfix"> </div>

					</form>
				</div>


			</div>

		</div>
	</div>
@endsection