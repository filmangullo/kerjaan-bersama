<div class="content white agile-info">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <h1><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Web <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belajar</label></h1>
                </a>
            </div>
            <!--/.navbar-header-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-2" id="link-effect-2">
                    <ul class="nav navbar-nav">
                        <li class="{{Route::is("beranda.index") ? 'active' : ''}}"><a href="{{route("beranda.index")}}"
                                class="effect-3">Beranda</a></li>

                        <li class="{{Route::is("panduan.index") ? 'active' : ''}}"><a href="{{route("panduan.index")}}"
                                class="effect-3">Panduan</a></li>
                        <li class="{{Route::is("tentang-kami.index") ? 'active' : ''}}"><a
                                href="{{route("tentang-kami.index")}}" class="effect-3">Tentang Kami</a></li>
                        <li class="{{Route::is("kontak.index") ? 'active' : ''}}"><a href="{{route("kontak.index")}}"
                                class="effect-3">Kontak</a></li>
                        @guest
                        <li><a href="{{route("login")}}" class="effect-3">Masuk</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{route("register")}}" class="effect-3">Registrasi</a></li>
                        @endif
                        @else
                        <li class="dropdown">
                            <a class="dropdown-toggle effect-3"
                                data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('profil', Auth::user()->id) }}" style="hover:background-color:green; cursor: pointer">Profil</a></li>
                                <hr>
                                <li><a href="{{ route('logout') }}" style="hover:background-color:green" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </nav>
            </div>
            <!--/.navbar-collapse-->
            <!--/.navbar-->
        </div>
    </nav>
</div>
