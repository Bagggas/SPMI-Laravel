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

            </div>
        </div>
    </div>
</header>

<!-- jumbotron -->
<div class="jumbotron">
    <video src="{{ asset('video/hero.mp4') }}" autoplay muted loop>
    </video>
    <div class="container-fluid jumbotron-container">
        <div class="container pt-3 pb-4">
            <div class="row align-items-start mt-5 mb-5">
                <div class="col-8">
                </div>
                <div class="col">
                    <div class="card mt-4 px-2 ps-2">
                        <div class="card-header card-header-login text-center">
                            <span class="text-dark">LOGIN</span>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1"
                                       class="form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1"
                                       class="form-label ">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            <p class="mt-3 mb-4 text-secondary fs-small">Apabila terdapat kendala teknis silahkan
                                menghubungi
                                customer service di <a href="mailto: LPM@unipma.ac.id">LPM@unipma.ac.id</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jumbotron end-->

@include('layouts.footer')
@include('layouts.global-script')
</body>

</html>
