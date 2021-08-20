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
        <div class="col-10">
            <h2 class="text-center">Penilai Mutu Universitas PGRI Madiun</h2>
            <hr>
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-outline-secondary btn-sm mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    <span>Kembali</span>
                </button>
            </a>
            <div class="card p-3 border-0">
                <figure>
                    <blockquote class="blockquote">
                        @foreach($standartsAuditee as $s)
                            <p class="text-dark text-capitalize pt-3 ">{{ $s->name }}</p>
                        @endforeach
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        @foreach($standartsAuditee as $s)
                            Skala {{ $s->type }}
                        @endforeach
                    </figcaption>
                </figure>
                <div class="card-header mb-0 border-0">
                    <blockquote class="blockquote text-center">
                            <h3 class="pt-3 fw-bold"> Self Assessment </h3>
                    </blockquote>
                </div>
                <table id="table_standart" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center align-text-top">No</th>
                        <th rowspan="2" class="text-center align-text-top">Pertanyaan</th>
                        @foreach($standartsAuditee as $s)
                            @if($s->type == 'Likert')
                                <th colspan="4" class="text-center">Pilihan Jawaban</th>

                            @else
                                <th colspan="2" class="text-center">Pilihan Jawaban</th>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($standartsAuditee as $s)
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
                    @foreach($standartsAuditee as $s)
                        @if($s->type == 'Likert')
                            @foreach($dataAuditee as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->question }}</td>
                                    @if($d->answer == '1')
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @elseif($d->answer == '2')
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    @elseif($d->answer == '3')
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            @foreach($dataAuditee as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->question }}</td>
                                    @if($d->answer == 'Ya')
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    @foreach($standartsAuditee as $s)
                        @if( !$dataAuditee->count() == 0 )
                            @if($s->type == 'Likert')
                                <tr>
                                    <td colspan="6">Catatan : {{ $dataAuditee->first()->description }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4">Catatan : {{ $dataAuditee->first()->description }}</td>
                                </tr>
                            @endif
                        @else
                        @endif
                    @endforeach
                    </tbody>
                </table>
                @if($gradeAuditee->count())
                    <div class="card-footer pt-3 mb-5 border-0">
                        <blockquote class="blockquote text-center">
                            <h4 class="text-dark text-capitalize pt-3 ">Hasil Penilaian Self Assessment</h4>
                            <h2 class="text-capitalize fw-bold
                            @if($gradeAuditee->first() >= 81)text-success @elseif($gradeAuditee->first() >= 61) text-success @elseif($gradeAuditee->first() >= 41)text-warning
                            @elseif($gradeAuditee->first() >= 21)text-danger @else text-danger @endif pt-3 ">{{ $gradeAuditee->first() }}<br>
                                @if($gradeAuditee->first() >= 81)
                                    <span>Sangat Baik</span>
                                @elseif($gradeAuditee->first() >= 61)
                                    <span>Baik</span>
                                @elseif($gradeAuditee->first() >= 41)
                                    <span>Cukup Baik</span>
                                @elseif($gradeAuditee->first() >= 21)
                                    <span>Kurang Baik</span>
                                @else
                                    <span>Buruk</span>
                                @endif
                            </h2>
                        </blockquote>
                    </div>
                @else
                    <div class="card-footer pt-3 mb-5 border-0">
                        <blockquote class="blockquote text-center">
                            <h4 class="text-dark text-capitalize pt-3 ">Hasil Penilaian Self Assessment</h4>
                            <h4 class="text-secondary text-capitalize pt-3 ">Data Kosong</h4>
                        </blockquote>
                    </div>
                @endif

                <hr>

                <div class="card-header mb-0 border-0">
                    <blockquote class="blockquote text-center">
                        <h3 class="pt-3 fw-bold"> Penilaian Auditor </h3>
                            Auditor : <cite title="Source Title">
                                @if( $auditAuditor->isEmpty() )
                                    Data Kosong
                                @else
                                    {{ $auditAuditor->first()->name }}
                                @endif
                            </cite>
                    </blockquote>
                </div>
                <table id="table_grade" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center align-text-top">No</th>
                        <th rowspan="2" class="text-center align-text-top">Pertanyaan</th>
                        @foreach($standartsAuditor as $s)
                            @if($s->type == 'Likert')
                                <th colspan="4" class="text-center">Pilihan Jawaban</th>

                            @else
                                <th colspan="2" class="text-center">Pilihan Jawaban</th>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($standartsAuditor as $s)
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
                    @foreach($standartsAuditor as $s)
                        @if($s->type == 'Likert')
                            @foreach($dataAuditor as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->question }}</td>
                                    @if($d->answer == '1')
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @elseif($d->answer == '2')
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    @elseif($d->answer == '3')
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            @foreach($dataAuditor as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->question }}</td>
                                    @if($d->answer == 'Ya')
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td>
                                            <h4>✓</h4>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    @foreach($standartsAuditor as $s)
                        @if( !$dataAuditor->count() == 0 )
                            @if($s->type == 'Likert')
                                <tr>
                                    <td colspan="6">Catatan : {{ $dataAuditor->first()->description }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4">Catatan : {{ $dataAuditor->first()->description }}</td>
                                </tr>
                            @endif
                        @else
                        @endif
                    @endforeach
                    </tbody>
                </table>
                @if($gradeAuditor->count())
                    <div class="card-footer pt-3 mb-5 border-0">
                        <blockquote class="blockquote text-center">
                            <h4 class="text-dark text-capitalize pt-3 ">Hasil Penilaian Auditor</h4>
                            <h2 class="text-capitalize fw-bold
                            @if($gradeAuditor->first() >= 81)text-success @elseif($gradeAuditor->first() >= 61) text-success @elseif($gradeAuditor->first() >= 41)text-warning
                            @elseif($gradeAuditor->first() >= 21)text-danger @else text-danger @endif pt-3 ">{{ $gradeAuditor->first() }}<br>
                                @if($gradeAuditor->first() >= 81)
                                    <span>Sangat Baik</span>
                                @elseif($gradeAuditor->first() >= 61)
                                    <span>Baik</span>
                                @elseif($gradeAuditor->first() >= 41)
                                    <span>Cukup Baik</span>
                                @elseif($gradeAuditor->first() >= 21)
                                    <span>Kurang Baik</span>
                                @else
                                    <span>Buruk</span>
                                @endif
                            </h2>
                        </blockquote>
                    </div>
                @else
                    <div class="card-footer pt-3 mb-5 border-0">
                        <blockquote class="blockquote text-center">
                            <h4 class="text-dark text-capitalize pt-3 ">Hasil Penilaian Auditor</h4>
                            <h4 class="text-secondary text-capitalize pt-3 ">Data Kosong</h4>
                        </blockquote>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function () {
        $('#table_standart').DataTable({
            searching: false,
            paging: false,
            info: false,
            ordering: false,
        });

    });

    $(document).ready(function () {
        $('#table_grade').DataTable({
            searching: false,
            paging: false,
            info: false,
            ordering: false,
        });
    });
</script>

@include('layouts.global-script')
</body>

</html>
