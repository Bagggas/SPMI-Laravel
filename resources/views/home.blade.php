<!doctype html>
<html lang="en">
@include('layouts.head')

<body>

@if($errors->any())
    <script>
        $( document ).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{$errors->first()}}',
            })
        });
    </script>

@elseif ($message = Session::get('success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'success',
                title: '{{$message}}',
                timer: 1500,
            })
        });

    </script>

@endif


<header class="p-3 bg-primary text-dark">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
                <img src="{{url('/img/unipma.png')}}" width="50" height="50" role="img">
            </a>

            <p class="col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 ms-3">Sistem Penjaminan Mutu
                Internal
                <br> UNIVERSITAS PGRI MADIUN </p>

            @guest

            @else
                <div class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                 class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @if (Auth::user()->hasRole('admin'))
                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('admin.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>
                            @elseif (Auth::user()->hasRole('auditee'))

                                <li>
                                    <a class="dropdown-item unstyled"
                                       href="{{ route('auditee.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>

                            @elseif (Auth::user()->hasRole('auditor'))


                            @endif

                            <li>
                                <a class="dropdown-item unstyled" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>
                        </ul>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            @endguest

        </div>
    </div>
    </div>
</header>

<!-- jumbotron -->
<div class="jumbotron">
    <video src="{{ asset('video/Untitled design (1).mp4') }}" autoplay muted loop>
    </video>
    <div class="container-fluid jumbotron-container">
        <div class="container pt-3 pb-4">
            <div class="row align-items-start mt-5 mb-5">
                <div class="col-8">
                </div>
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header-login text-center pt-3">
                            <span class="text-dark fw-semibold">LOGIN</span>
                            <hr>
                        </div>
                        <div class="card-body p-4 pt-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat E-mail" autofocus>
                                </div>

                                <div class="mb-3">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password"
                                           required autocomplete="current-password">
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                <p class="mt-3 mb-3 text-secondary fs-small">Apabila terdapat kendala teknis silahkan
                                    menghubungi
                                    customer service di <a href="mailto: LPM@unipma.ac.id">LPM@unipma.ac.id</a> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jumbotron end-->

<footer class="text-light p-3 bg-primary">
    <div class="text-center">
        Copyright © 2021 Universitas PGRI Madiun
    </div>
</footer>

@include('layouts.global-script')
</body>

</html>
