<!doctype html>
<html lang="en">
@include('layouts.head')

<body id="body-admins">
@include('layouts.navbar')

@if ($message = Session::get('success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'success',
                title: '{{$message}}',
                timer: 1500,
            })
        });

    </script>

@elseif ($message = Session::get('error'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'error',
                title: '{{$message}}',
                timer: 1500,
            })
        });

    </script>
@endif

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
{{--            SIDEBAR--}}
            <div id="side-bar" class="flex-shrink-0 ps-3 pt-3 bg-white overflow-auto" style="width: 180px;">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            Standart
                        </button>
                        <div class="collapse" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboard')}}" class="link-dark rounded">Data</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Auditee
                        </button>
                        <div class="collapse show" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboardAuditee')}}" class="link-dark rounded">Data</a></li>
                                <li class="fw-bold"><a href="{{route('pageTambahAuditee')}}" class="link-dark rounded">Tambah Auditee</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            Auditor
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboardAuditor')}}" class="link-dark rounded">Data</a></li>
                                <li><a href="{{route('pageTambahAuditor')}}" class="link-dark rounded">Tambah Auditor</a></li>
                            </ul>
                        </div>
                    </li>
{{--                    <li class="border-top my-3"></li>--}}
{{--                    <li class="mb-1">--}}
{{--                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">--}}
{{--                            Pengumuman--}}
{{--                        </button>--}}
{{--                        <div class="collapse" id="account-collapse">--}}
{{--                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">--}}
{{--                                <li><a href="#" class="link-dark rounded">Data</a></li>--}}
{{--                                <li><a href="#" class="link-dark rounded">Tambah Pengumuman</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
        <div class="col-10 border-start">
{{--            CONTENT--}}
            <div class="container-fluid">
                <h1 class="fw-bold mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    TAMBAH AUDITEE </h1>
                <hr>
                <div class="card mt-4 mb-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tambahAuditee') }}">
                            @csrf
                            <div class="form-group row mt-3 mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="fakultas" class="col-md-4 col-form-label text-md-right">{{ __('Fakultas') }}</label>

                                <div class="col-md-6">

                                    <select id="opt-fakultas" name="fakultas" class="form-select fakultas  @error('fakultas') is-invalid @enderror" >
                                        <option></option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Keguruan Ilmu Pendidikan">Keguruan Ilmu Pendidikan</option>
                                        <option class="Ekonomi & Bisnis" value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
                                        <option class="Teknik" value="Teknik">Teknik</option>
                                        <option class="Ilmu Kesehatan & Sains" value="Ilmu Kesehatan & Sains">Ilmu Kesehatan & Sains</option>
                                        <option class="Ilmu Hukum" value="Ilmu Hukum">Ilmu Hukum</option>
                                        <option class="Pascasarjana Pendidikan Ilmu Pengetahuan Sosial" value="Pascasarjana Pendidikan Ilmu Pengetahuan Sosial">Pascasarjana Pendidikan Ilmu Pengetahuan Sosial</option>
                                        <option class="Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia" value="Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia">Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia</option>
                                    </select>

                                    @error('fakultas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Program Studi') }}</label>

                                <div class="col-md-6">

                                    <select id="opt-prodi" name="prodi" class="form-select prodi @error('prodi') is-invalid @enderror" value="{{ old('prodi') }}">
                                        <option></option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Guru Pendidikan Anak Usia Dini">Pendidikan Guru Pendidikan Anak Usia Dini</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Bimbingan Konseling">Bimbingan Konseling</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Pancasila dan Kewarganegaraan">Pendidikan Pancasila dan Kewarganegaraan</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Sejarah">Pendidikan Sejarah</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Akuntansi">Pendidikan Akuntansi</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Matematika">Pendidikan Matematika</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Biologi">Pendidikan Biologi</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Fisika">Pendidikan Fisika</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Teknik Elektro">Pendidikan Teknik Elektro</option>
                                        <option class="Keguruan Ilmu Pendidikan" value="Pendidikan Profesi Guru">Pendidikan Profesi Guru</option>
                                        <option class="Ekonomi & Bisnis" value="Akuntansi">Akuntansi</option>
                                        <option class="Ekonomi & Bisnis" value="Manajemen">Manajemen</option>
                                        <option class="Ekonomi & Bisnis" value="D3 Manajemen Pajak">D3 Manajemen Pajak</option>
                                        <option class="Teknik" value="Teknik Informatika">Teknik Informatika</option>
                                        <option class="Teknik" value="Sistem Informasi">Sistem Informasi</option>
                                        <option class="Teknik" value="Teknik Industri">Teknik Industri</option>
                                        <option class="Teknik" value="Teknik Kimia">Teknik Kimia</option>
                                        <option class="Teknik" value="Teknik Elektro">Teknik Elektro</option>
                                        <option class="Ilmu Kesehatan & Sains" value="Farmasi">Farmasi</option>
                                        <option class="Ilmu Kesehatan & Sains" value="Ilmu Keolahragaan">Ilmu Keolahragaan</option>
                                        <option class="Ilmu Hukum" value="Hukum">Hukum</option>
                                        <option class="Pascasarjana Pendidikan Ilmu Pengetahuan Sosial" value="Pascasarjana Pendidikan Ilmu Pengetahuan Sosial">Pascasarjana Pendidikan Ilmu Pengetahuan Sosial</option>
                                        <option class="Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia" value="Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia">Pascasarjana Pendidikan Ilmu Bahasa dan Sastra Indonesia</option>
                                    </select>

                                    @error('prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ url()->previous() }}">
                                        <button type="button" class="btn btn-secondary"> {{ __('Batal') }}</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

    <script>
        $(function(){
            $("#opt-fakultas").on("change",function(){
                var levelClass = $('#opt-fakultas').find('option:selected').attr('class');
                console.log(levelClass);
                $('#opt-prodi option').each(function () {
                    var self = $(this);
                    if (self.hasClass(levelClass) || typeof(levelClass) == "undefined") {
                        self.show();
                    } else {
                        self.hide();
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".fakultas").select2({
                theme: "bootstrap-5",
                placeholder: "",
            });
        });
    </script>


@include('layouts.global-script')
</body>

</html>
