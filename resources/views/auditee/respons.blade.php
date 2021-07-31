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
    }
    function simpanFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form

        swal.fire({
            icon: "warning",
            title: "Simpan Data?",
            text: "Sebelum menyimpan, pastikan data yang terisi sudah benar dan valid karena data yang tersimpan tidak dapat dirubah kembali.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Simpan data",
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
                    'Batal Simpan Data.',
                    'error'
                )
            }
        })
    }
    function dataFunction() {
        event.preventDefault(); // prevent form submit

        swal.fire({
            icon: "warning",
            title: "Tinggalkan Halaman?",
            text: "Apakah anda yakin untuk meninggalkan halaman ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Tinggalkan Halaman",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '{{route('auditee.dashboard')}}';
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Dibatalkan',
                    'Batal Meninggalkan Halaman.',
                    'error'
                )
            }
        })
    }
    function hasilFunction() {
        event.preventDefault(); // prevent form submit

        swal.fire({
            icon: "warning",
            title: "Tinggalkan Halaman?",
            text: "Apakah anda yakin untuk meninggalkan halaman ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Tinggalkan Halaman",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '{{route('auditee.grade')}}';
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Dibatalkan',
                    'Batal Meninggalkan Halaman.',
                    'error'
                )
            }
        })
    }
    function profilFunction() {
        event.preventDefault(); // prevent form submit

        swal.fire({
            icon: "warning",
            title: "Tinggalkan Halaman?",
            text: "Apakah anda yakin untuk meninggalkan halaman ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Tinggalkan Halaman",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '{{ route('auditee.profile') }}';
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Dibatalkan',
                    'Batal Meninggalkan Halaman.',
                    'error'
                )
            }
        })
    }
    function batalFunction() {
        event.preventDefault(); // prevent form submit

        swal.fire({
            icon: "warning",
            title: "Tinggalkan Halaman?",
            text: "Apakah anda yakin untuk meninggalkan halaman ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Tinggalkan Halaman",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '{{route('auditee.dashboard')}}';
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Dibatalkan',
                    'Batal Meninggalkan Halaman.',
                    'error'
                )
            }
        })
    }
</script>

@if($errors->any())
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'error',
                title: 'Seluruh kolom wajib diisi',
                timer: 3500,
            })
        });
    </script>
@endif



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
                                <li class="fw-bold"><a onclick="dataFunction()" href="{{route('auditee.dashboard')}}" class="link-dark rounded">Data</a>
                                </li>
                                <li><a onclick="hasilFunction()" href="{{route('auditee.dashboard')}}" class="link-dark rounded">Lihat hasil</a>
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
                                <li><a onclick="profilFunction()" href="{{ route('auditee.profile') }}" class="link-dark rounded">Profil</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col mb-2">
            <h2 class="text-center fw-semibold mb-3 mt-3">Penilai Mutu Universitas PGRI Madiun</h2>
            <hr>
            <div class="container">
                @foreach($standarts as $s)
                    @foreach($s->questions as $q)
                <form action="/standart/{{ $q->standart_id }}/answer/post" method="post">
                    @endforeach
                @endforeach
                    @csrf
                    <div class="row pt-3 mb-3">
                        <div class="col-auto">Dokumen Pendukung :</div>
                        <div class="col-7">
                            <input class="form-control form-control-sm @error('files_link') is-invalid @enderror" name="files_link" type="text"
                                   placeholder="Link google drive" aria-describedby="files_link" value="{{ old('files_link') }}">
                            @error('files_link')
                            <div id="files_link" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <h3 class="text-center">Penilaian</h3>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-text-top">No</th>
                            <th rowspan="2" class="text-center align-text-top">Pertanyaan</th>
                            @foreach($standarts as $s)
                                @if($s->type == 'Likert')
                                    <th colspan="4" class="text-center">Pilihan Jawaban</th>

                                @else
                                    <th colspan="2" class="text-center">Pilihan Jawaban</th>
                                @endif
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($standarts as $s)
                                @if($s->type == 'Likert')
                                    <td class="text-center">1</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">4</td>
                                @else
                                    <th scope="col" class="text-center">Ya</th>
                                    <th scope="col" class="text-center">Tidak</th>
                                @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($standarts as $s)
                            @foreach($s->questions as $key=>$q)
                                <tr>
                                    <td style="width: 7%;" class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="hidden" id="question" name="question[{{$key}}][question]" value="{{$q->question}}">
                                        <input type="hidden" id="question" name="question[{{$key}}][question_id]" value="{{$q->id}}">
                                        <input type="hidden" id="question" name="standart_id" value="{{$s->id}}">
                                        <input type="hidden" id="question" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" id="question" name="typegrade" value="Auditee">
                                        {{$q->question}}
                                    </td>

                                    @if($s->type == 'Likert')
                                        @foreach($likert as $l)
                                            <td style="width: 10%;" class="text-center" id="question{{$q->id}}">
                                                <label for="question{{$q->id}}">
                                                    <input class="form-check-input @error('question.' . $key . '.answer') is-invalid @enderror"
                                                           type="radio" name="question[{{$key}}][answer]" id="question{{$q->id}}" value="{{ $l }}">
                                                </label>
                                            </td>
                                        @endforeach
                                    @else
                                        @foreach($yatidak as $y)
                                            <td style="width: 10%;" class="text-center" id="question{{$q->id}}">
                                                <label for="question{{$q->id}}" class="radio-inline">
                                                    <input class="form-check-input @error('question.' . $key . '.answer') is-invalid @enderror"
                                                           type="radio" name="question[{{$key}}][answer]" id="question{{$q->id}}" value="{{ $y }}">
                                                </label>
                                            </td>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row pt-3 mb-4">
                        <div class="col-auto">Catatan :</div>
                        <div class="col-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" aria-describedby="description" id="description" rows="3" >{{ old('description') }}</textarea>
                            @error('description')
                                <div id="description" class="invalid-feedback">
                                    Deskripsi wajib diisi
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row pt-3 mb-4">
                        <div class="col-auto pe-0">
                            <button type="submit" class="btn btn-success" onclick="simpanFunction()">Simpan</button>
                        </div>
                        <div class="col-auto">
                            <a type="button" onclick="batalFunction()" href="{{route('auditee.dashboard')}}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    // $(window).bind('beforeunload', function(){
    //     return 'Are you sure you want to leave?';
    // });

    $(document).ready(function () {
        $('#table_standart').DataTable();
    });

    $("td").click(function () {
        $(this).find('input:radio').attr('checked', true);
    });
</script>

@include('layouts.global-script')
</body>

</html>
