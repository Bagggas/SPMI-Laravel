<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

    <style>
        <?php include(public_path().'/css/print.css');?>

        hr {
            display: block;
            height: 1px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 1px #aaa;
        }

        footer{
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }
    </style>

</head>
<body>
    <div class="container">
        <table class="table table-borderless">
            <tr>
                <th class="text-center">
                    <img width="95" height="95" role="img" src="data:image/png;base64,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" />
                </th>
                <th class="text-left"><h1 class="pb-0">UNIVERSITAS PGRI MADIUN (UNIPMA)</h1>
                    <h1 class="pb-0">PENJAMINAN MUTU INTERNAL</h1></th>
            </tr>
        </table>
    </div>
    <hr>

    <table class="table table-borderless">
        <tr>
            <td>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: #{{ $year }}{{ $data->first()->id }}{{ \Carbon\Carbon::now()->format('d') }}</td>
        </tr>
        <tr>
            <td>Tanggal&nbsp;&nbsp;: {{ \Carbon\Carbon::now()->toDateString() }}</td>
        </tr>
        <tr>
            <td>Waktu &nbsp;&nbsp;&nbsp;: {{ \Carbon\Carbon::now()->toTimeString() }}</td>
        </tr>
    </table>

    <h3 class="pt-2 pb-2 mb-3 text-muted bg-light">Data Program Studi</h3>
    <table class="table table-bordered">
        <tr>
            <td>
                @if( $dataAuditor->first()->gradeStorings->isEmpty() )
                    Nama Auditor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Data Kosong (Auditor Belum Mengaudit Data Anda)
                @else
                    Nama Auditor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataAuditor->first()->gradeStorings->first()->UserViewAuditor->name }}
                @endif
            </td>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Dosen Aktif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Dosen Aktif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->first()->dataPendahuluans->first()->dosen_aktif }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Nama Auditee &nbsp;&nbsp;&nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Nama Auditee &nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataAuditor->first()->dataPendahuluans->first()->name }}
                @endif
            </td>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Mahasiswa Aktif &nbsp;&nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Mahasiswa Aktif &nbsp;&nbsp;&nbsp;: {{ $data->first()->dataPendahuluans->first()->mahasiswa_aktif }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                Fakultas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->first()->fakultas }}
            </td>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Total Penelitian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Total Penelitian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->first()->dataPendahuluans->first()->total_penelitian }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                Program Studi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->first()->prodi }}
            </td>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Total Pengabdian &nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Total Pengabdian &nbsp;&nbsp;: {{ $data->first()->dataPendahuluans->first()->total_pengabdian }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Kepala Prodi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Kepala Prodi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->first()->dataPendahuluans->first()->kepala_prodi }}
                @endif
            </td>
            <td>
                @if( $data->first()->dataPendahuluans->isEmpty() )
                    Jumlah Kerjasama &nbsp;: Data Kosong (Anda Belum Mengisi Data)
                @else
                    Jumlah Kerjasama &nbsp;: {{ $data->first()->dataPendahuluans->first()->jumlah_kerjasama }}
                @endif
            </td>
        </tr>
    </table>

    <h3 class="mt-5 pt-2 pb-2 text-muted bg-light">Hasil Penilaian</h3>
    <table class="table mt-3 table-bordered">
        <tr>
            <th colspan="4" class="text-center fs-3 bg-light">Penilaian Self-Assessment</th>
        </tr>
        <tr class="text-center bg-light">
            <th>No</th>
            <th>Standart</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>
        @foreach($tableAuditee as $a)
            <tr class="text-center text-capitalize">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $a->name }}</td>
                <td>{{ $a->grade }}</td>
                <td class="fw-bold @if($a->grade >= 81)text-success @elseif($a->grade >= 61) text-success @elseif($a->grade >= 41)text-warning
                            @elseif($a->grade >= 21)text-danger @else text-danger @endif">
                    @if($a->grade >= 81)
                        Sangat Baik
                    @elseif($a->grade >= 61)
                        Baik
                    @elseif($a->grade >= 41)
                        Cukup Baik
                    @elseif($a->grade >= 21)
                        Kurang Baik
                    @else
                        Buruk
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-center ">Rata-Rata : {{ $avgauditee }}</th>
        </tr>
    </table>

    <table class="table table-bordered mt-5 ">
        <tr>
            <th colspan="4" class="text-center fs-3 bg-light">Penilaian Self-Assessment</th>
        </tr>
        <tr class="text-center bg-light">
            <th>No</th>
            <th>Standart</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>
        @foreach($tableAuditor as $a)
            <tr class="text-center text-capitalize">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $a->name }}</td>
                <td>{{ $a->grade }}</td>
                <td class="fw-bold @if($a->grade >= 81)text-success @elseif($a->grade >= 61) text-success @elseif($a->grade >= 41)text-warning
                            @elseif($a->grade >= 21)text-danger @else text-danger @endif">
                    @if($a->grade >= 81)
                        Sangat Baik
                    @elseif($a->grade >= 61)
                        Baik
                    @elseif($a->grade >= 41)
                        Cukup Baik
                    @elseif($a->grade >= 21)
                        Kurang Baik
                    @else
                        Buruk
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-center ">Rata-Rata : {{ $avgauditor }}</th>
        </tr>
    </table>

    <div class="d-flex align-items-end flex-column">
        <div class="p-2 bd-highlight">Madiun, {{ \Carbon\Carbon::now()->format('d M Y') }}</div>
        <br><br>
        <div class="p-2 bd-highlight">(________________________________)</div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small d-none d-print-block">
        <p class="mb-1">&copy; 2021–2024 Universitas PGRI Madiun</p>
    </footer>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
