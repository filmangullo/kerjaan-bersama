@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Profil<span>|</span></li>
            <li>{{ Auth::user()->name }}</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle three"> Profil </h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="signin-form">
                <div class="login-form-rec">
                    <form action="{{ route('profil.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-inputs upload">
                            <img id="output" style="border-radius: 0%; width: 50%"/>
                            <p>Upload your resume</p>
                            <input type="file" id="fileselect" accept="image/*" onchange="loadFile(event)" />
                            <div id="filedrag" style="background-color: blueviolet">Upload</div>
                        </div>
                        <input type="text" name="name" placeholder="Nama" value="{{ Auth::user()->name }}" required="">
                        <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                        <input type="password" name="password" placeholder="Password">
                        <input type="text" name="phone" placeholder="No Hp" value="{{ Auth::user()->phone }}" required="" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
@endsection
