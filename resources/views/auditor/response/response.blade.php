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
                            <span>Home</span>
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="fw-bold"><a href="{{route('auditor.dashboard')}}" class="link-dark rounded">Beranda</a>
                                </li>
                            </ul>
                        </div>
                    </li>

{{--                    <li class="mb-1">--}}
{{--                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"--}}
{{--                                data-bs-target="#account-collapse" aria-expanded="false">--}}
{{--                            <span>Penilaian</span>--}}
{{--                        </button>--}}
{{--                        <div class="collapse" id="account-collapse">--}}
{{--                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">--}}
{{--                                <li><a href="#" class="link-dark rounded">Penilaian</a></li>--}}
{{--                                <li><a href="#" class="link-dark rounded">Penilaian</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#profile-collapse" aria-expanded="false">
                            <span>User</span>
                        </button>
                        <div class="collapse" id="profile-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('auditor.profile') }}" class="link-dark rounded">Profile</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col">
            <h2 class="text-center">Penilai Mutu Universitas PGRI Madiun</h2>
            <hr>
            <div class="card p-3 mb-3">
                <div class="row pt-3 mb-3">
                    <div class="col-2">Fakultas </div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $user->first()->fakultas }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Prodi</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $user->first()->prodi }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Kepala prodi </div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->kepala_prodi }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Nama Pengisi Data </div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->name }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Dosen Aktif</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->dosen_aktif }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Mahasiswa Aktif</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->mahasiswa_aktif }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Total Penelitian</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->total_penelitian }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Total Pengabdian</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->total_pengabdian }}</span>
                    </div>
                </div>
                <div class="row pt-3 mb-3">
                    <div class="col-2">Jumlah Kerjasama</div>
                    <div class="col-auto">:</div>
                    <div class="col-7 bg-light pt-1">
                        <span type="text" id="copy" class="text-secondary">{{ $data->first()->jumlah_kerjasama }}</span>
                    </div>
                </div>
                <div class="card p-3 mt-5">
                    <h4 class="text-center">Data Standart</h4>
                    <hr>
                    <table id="table_standart" class="table table-striped text-center table-bordered">
                        <thead>
                        <tr>
                            <th>Standart</th>
                            <th>Jenis Standart</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!$respon->count())
                            @else
                                @foreach($standart as $s)
                                    <tr>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->type}}</td>
                                        <td>
                                            @if(!$s->grades->count())
                                                <span class="badge bg-danger">Belum teraudit</span>
                                            @else
                                                <span class="badge bg-success">Teraudit</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$s->grades->count())
                                                <a href="/auditor/{{ $s->id }}/{{ $user->first()->id }}/{{$data->first()->created_at->format('Y')}}/view"><button class="btn btn-sm btn-warning">Lihat Nilai</button></a>
                                                <a href="/auditor/{{ $s->id }}/{{ $user->first()->id }}/{{$data->first()->created_at->format('Y')}}/auditing"><button class="btn btn-sm btn-success">Audit</button></a>
                                            @else
                                                <a href="/auditor/{{ $s->id }}/{{ $user->first()->id }}/{{$data->first()->created_at->format('Y')}}/view"><button class="btn btn-sm btn-warning">Lihat Nilai</button></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('auditor.dashboard') }}">
                <button type="button" class="btn btn-secondary mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square mb-sm-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    <span>Kembali</span>
                </button>
            </a>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function () {
        $('#table_standart').DataTable({
            ordering: false,
        });
    });
</script>

@include('layouts.global-script')
</body>

</html>
