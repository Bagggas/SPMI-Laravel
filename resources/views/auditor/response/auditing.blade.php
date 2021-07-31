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
                window.location = '{{ route('auditor.profile') }}';
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
                window.location = '{{route('auditor.dashboard')}}';
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
                window.location = '{{ url()->previous() }}';
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
                                <li class="fw-bold"><a onclick="dataFunction()" href="{{route('auditor.dashboard')}}" class="link-dark rounded">Beranda</a>
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
                                <li><a onclick="profilFunction()" href="{{ route('auditor.profile') }}" class="link-dark rounded">Profile</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col">
            <h2 class="text-center">Penilai Mutu Universitas PGRI Madiun</h2>
            <hr>
            <div class="container">
            @foreach($standarts as $s)
                @foreach($s->questions as $q)
                    <form action="/standart/{{ $q->standart_id }}/{{ $userId->first()->id }}/auditor/grade/post" method="post">
                @endforeach
            @endforeach
                    @csrf
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
                                        <input type="hidden" id="question" name="auditor_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" id="question" name="user_id" value="{{ $userId->first()->id }}">
                                        <input type="hidden" id="question" name="typegrade" value="Auditor">
                                        {{$q->question}}
                                    </td>

                                    @if($s->type == 'Likert')
                                        @foreach($likert as $l)
                                            <td style="width: 10%;" class="text-center">
                                                <input class="form-check-input @error('question.' . $key . '.answer') is-invalid @enderror"
                                                       type="radio" name="question[{{$key}}][answer]" id="question{{$q->id}}" value="{{ $l }}">
                                            </td>
                                        @endforeach
                                    @else
                                        @foreach($yatidak as $y)
                                            <td style="width: 10%;" class="text-center" >
                                                <input class="form-check-input @error('question.' . $key . '.answer') is-invalid @enderror"
                                                       type="radio" name="question[{{$key}}][answer]" id="question{{$q->id}}" value="{{ $y }}">
                                            </td>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row pt-3 mb-4">
                        <div class="col-auto">Keterangan :</div>
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
                            <button onclick="simpanFunction()" type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-auto">
                            <a type="button" onclick="batalFunction()" href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
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
        $('#table_standart').DataTable({
            ordering: false,
        });
    });

    $("td").click(function () {
        $(this).find('input:radio').attr('checked', true);
    });
</script>

@include('layouts.global-script')
</body>

</html>
