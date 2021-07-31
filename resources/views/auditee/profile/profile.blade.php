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

<script>
    $(document).ready(function () {
        $('[data-bs-toggle="popover"]').tooltip();
    });

    function deleteFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form

        swal.fire({
            icon: "warning",
            title: "Hapus Data?",
            text: "Data yang telah terhapus tidak dapat dikembalikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus data",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Dibatalkan',
                    'Hapus data dibatalkan, data tidak terhapus.',
                    'error'
                )
            }
        })

        // function(isConfirm){
        //     if (isConfirm) {
        //         form.submit();          // submitting the form when user press yes
        //     } else {
        //         Swal.fire(
        //             'The Internet?',
        //             'That thing is still around?',
        //             'question'
        //         );
        //     }
        // });
    }
</script>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-2 border-end">
            <div id="side-bar" class="ps-3 pt-3 bg-white overflow-auto" style="width: 180px;">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#home-collapse" aria-expanded="true">
                            Penilaian
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li ><a href="{{route('auditee.dashboard')}}" class="link-dark rounded">Data</a>
                                </li>
                                <li><a href="{{route('auditee.dashboard')}}" class="link-dark rounded">Lihat hasil</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#account-collapse" aria-expanded="false">
                            User
                        </button>
                        <div class="collapse show" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="fw-bold"><a href="{{ route('auditee.profile') }}" class="link-dark rounded">Profil</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card p-3 mb-5 border-0">
            <h2 class="text-center">Profil Saya</h2>
            <hr>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ asset('img/blank-profile-picture-973460_1280.png') }}" width="120" height="120"
                             class="rounded float-left mt-2" alt="...">
                        <a href="/auditee/{{ auth()->id() }}/change_password" class="unstyled text-light badge bg-primary">Ganti Password</a>
                        <button type="button" id="edit" class="unstyled text-light badge bg-primary border-0" onClick="edit();">Edit Profil</button>
                        <button type="button" id="batal" class="unstyled text-light badge bg-danger border-0 hide" onClick="batal_edit();">Batal Edit</button>
                        <br>
                    </div>
                    <div class="col">
                        <div class="row g-5 align-items-center">
                            <div class="col-8 mb-3">
                                <form action="/auditee/{{ auth()->id() }}/update/profile" method="post">
                                @csrf
                                <table class="table table-borderless ">
                                    <tr>
                                        <th scope="row" style="width: 50%">Nama :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="name" name="name" readonly class="form-control p-1 @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}">
                                            @error('name')
                                                <div id="name" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 50%">Email :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="email" id="email" name="email" readonly class="form-control p-1 @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}">
                                            @error('email')
                                            <div id="name" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 50%">Fakultas :</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fakultas" readonly class="form-control p-1 @error('fakultas') is-invalid @enderror" value="{{ auth()->user()->fakultas }}">
                                            @error('fakultas')
                                            <div id="name" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 50%">Program Studi :</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="prodi" name="prodi" readonly class="form-control p-1 @error('prodi') is-invalid @enderror" value="{{ auth()->user()->prodi }}">
                                            @error('prodi')
                                            <div id="prodi" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <button type="submit" id="simpan" class=" btn btn-success btn-sm hide">Simpan</button>
                                <a href="{{ route('auditee.dashboard') }}"><button type="button" id="kembali" class="btn btn-secondary btn-sm">Kembali</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->fakultas == null || auth()->user()->prodi == null)
        <div class="alert alert-warning alert-dismissible fade show mt-alerts mt-4" role="alert">
            <strong>Peringatan!</strong> Anda belum mengisi data profil yang diperlukan <a href="{{ route('auditee.profile') }}" class="alert-link">disini</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
    @endif
</div>

@include('layouts.footer')

<script>
    function edit() {
        $("button[id='simpan']").removeClass('hide');
        $("button[id='kembali']").addClass('hide');
        $("button[id='edit']").addClass('hide');
        $("button[id='batal']").removeClass('hide');
        $("input[name='name']").removeAttr("readonly");
        $("input[name='email']").removeAttr("readonly");

        swal.fire(
            'Edit',
            'Anda dalam mode edit',
            'warning'
        )

    };

    function batal_edit() {
        $("button[id='simpan']").addClass('hide');
        $("button[id='kembali']").removeClass('hide');
        $("button[id='edit']").removeClass('hide');
        $("button[id='batal']").addClass('hide');
        $("input[name='name']").prop("readonly", true);
        $("input[name='email']").prop("readonly", true);
        swal.fire(
            'Batal Edit',
            'Keluar Mode Edit',
            'warning'
        )

    }

</script>

@include('layouts.global-script')
</body>

</html>
