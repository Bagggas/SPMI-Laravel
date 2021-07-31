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
    };
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
                    Edit Pertanyaan
                </h1>
                <hr>
                @foreach($questions as $v)
                    <form action="/questions/{{ $v->id }}/update" method="post">
                        @csrf
                        <div class="card p-3 shadow-sm mb-5">
                            <div class="mb-3">
                                <label for="standart" class="form-label">Pertanyaan : </label>
                                <textarea  name="question" class="mb-1 form-control text-capitalize" id="standart" rows="4">{{ $v->question }}</textarea>
                                @error('question')
                                <div class="alert alert-danger p-1" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <hr>
                            <div class="d d-inline">
                                <button type="submit" class="btn btn-success btn-sm" onclick="updateFunction()">Simpan</button>
                                <a href="/standarts/{{ $v->standart_id }}/edit"><button type="button" class="btn btn-secondary btn-sm" >Batal</button></a>
                            </div>
                        </div>
                    </form>
                @endforeach
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
