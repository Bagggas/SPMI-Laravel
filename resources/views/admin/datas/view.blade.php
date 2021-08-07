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

        var counter = 2;

        $("#addButton").click(function () {

            // if(counter>10){
            //     Swal.fire({
            //         icon: 'info',
            //         title: 'Peringatan!',
            //         text:'Anda telah menambahkan 10 kolom, Lanjutkan?',
            //     })
            //     return false;
            // }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<label id="questionHelp" class="form-label mt-3" for="question' + counter + '">Pertanyaan ' + counter + ' : </label>' +
                '<input id="question' + counter + '" name="questions[][question]" class="form-control" type="textbox" aria-describedby="questionHelp" required>');

            newTextBoxDiv.appendTo("#TextBoxesGroup");


            counter++;
        });

        $("#removeButton").click(function () {
            if (counter == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kolom tidak tersedia',
                    timer: 1500,
                })
                return false;
            }

            counter--;

            $("#TextBoxDiv" + counter).remove();

        });

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
    };
    function updateFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form

        swal.fire({
            icon: "warning",
            title: "Edit data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Edit data",
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
                    'Edit data dibatalkan',
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
    <div class="row pt-3">
        <div class="col">
            <div id="side-bar" class="ps-3 pt-3 bg-white overflow-auto" style="width: 180px;">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#home-collapse" aria-expanded="true">
                            Standart
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboard')}}" class="link-dark rounded">Data</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Auditee
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboardAuditee')}}" class="link-dark rounded">Data</a>
                                </li>
                                <li><a href="{{route('pageTambahAuditee')}}" class="link-dark rounded">Tambah
                                        Auditee</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#orders-collapse" aria-expanded="false">
                            Auditor
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('admin.dashboardAuditor')}}" class="link-dark rounded">Data</a>
                                </li>
                                <li><a href="{{route('pageTambahAuditor')}}" class="link-dark rounded">Tambah
                                        Auditor</a></li>
                            </ul>
                        </div>
                    </li>
{{--                    <li class="border-top my-3"></li>--}}
{{--                    <li class="mb-1">--}}
{{--                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"--}}
{{--                                data-bs-target="#account-collapse" aria-expanded="false">--}}
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
        <div class="col-10 border-start pb-5">
            <div class="container-fluid">

                    <h1 class="fw-bold mt-3 text-capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                             class="bi bi-archive-fill" viewBox="0 1 16 16">
                            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                        </svg>
                        Edit Standar
                    </h1>
                <hr>
                @foreach($standart as $v)
                    <form action="/standarts/{{ $v->id }}/updates" method="post">
                        @csrf
                        <div class="card p-3 shadow-sm mb-5">
                            <div class="mb-3">
                                <label for="standar" class="form-label">Nama Standar</label>
                                <input type="text" name="name" class=" mb-1 form-control text-capitalize" id="standar" placeholder="{{ $v->name }}">
                            @error('name')
                            <div class="alert alert-danger p-1" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="standar" class="form-label">Jenis Standar</label>
                                <select class="form-select" name="type" aria-label="Default select example">
                                    <option value="{{ $v->type }}" selected>{{ $v->type }}</option>
                                    @if($v->type == 'Likert')
                                        <option value="Ya/Tidak">Sesuai </option>
                                    @else
                                        <option value="Likert">Likert</option>
                                    @endif
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <hr>
                            <div class="d d-inline">
                                    <button type="submit" class="btn btn-success btn-sm" onclick="updateFunction()">Simpan</button>
                                    <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-secondary btn-sm" >Batal</button></a>
                            </div>
                        </div>
                    </form>
                @endforeach
                <h1 class="fw-bold mt-3 text-capitalize">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                         class="bi bi-question-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                    </svg>
                    Pertanyaan
                </h1>
                <hr>
                <a href="/standarts/{{ $v->id }}">
                    <button type="button" class="btn btn-outline-secondary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" class="bi bi-plus-lg pb-1" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <span>Tambah Pertanyaan Baru</span>
                    </button>
                </a>
                <div class="card p-3 shadow-sm mt-3">
                    <table id="table_standart" class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $question as $v)
                            <tr>
                                <td style="width: 5%">{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{$v->question}}</td>
                                <td style="width:30%" class="text-center">
                                    <form id="form" class="delete-form" action="/questions/{{ $v->id }}/delete"
                                          method="POST">
                                        @csrf
                                        <a href="/questions/{{ $v->id }}/edit"><button type="button" class="btn btn-outline-warning btn-sm">Edit</button></a>
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteFunction()">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')

<script>

    $(document).ready(function () {
        $('#table_standart').DataTable();
    });
</script>


@include('layouts.global-script')
</body>

</html>
