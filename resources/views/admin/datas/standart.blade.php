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
                '<textarea id="question' + counter + '" name="questions[][question]" class="form-control" type="textbox" aria-describedby="questionHelp" rows="2" required></textarea>');

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
                        <div class="collapse" id="home-collapse">
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
                <h1 class="text-capitalize fw-bold mt-3">Standart {{$standart->id}}</h1>
                <div class="card p-3 bg-light bg-gradient border-0">
                    <p class="text-capitalize text-secondary lead">Nama Standart : {{$standart->name}}</p>
                    <p class="text-capitalize text-secondary lead">Tipe Pertanyaan : {{$standart->type}}</p>
                    <p class="text-capitalize text-secondary lead">Dibuat pada : {{$standart->created_at}}</p>
                </div>
                <form action="/standarts/{{$standart->id}}/questions" method="post">
                    @csrf
                    <div class="card border-top-0 p-3">
                        <h5 class="text-center mt-3">Masukkan Pertanyaan</h5>
                        <hr>
                        <div class="card-body">
                            <div class="mb-3" id='TextBoxesGroup'>
                                <div id="TextBoxDiv1">
                                    <label id="questionHelp" class="form-label" for="question1">Pertanyaan 1 : </label>
                                    <textarea id="question1" name="questions[][question]" class="form-control" type="textbox" aria-describedby="questionHelp" required rows="2"></textarea>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button value='Add Button' id='addButton' type="button"
                                        class="btn me-3 btn-outline-secondary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                         class="bi bi-plus" viewBox="0 1 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span>Tambah Kolom Pertanyaan</span>
                                </button>
                                <button value='Remove Button' id='removeButton' type="button"
                                        class="btn btn-outline-secondary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                         class="bi bi-trash" viewBox="0 1 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd"
                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    <span>Hapus Kolom Pertanyaan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 me-1">Simpan</button>
                    <a href="{{route('admin.dashboard')}}">
                        <button type="button" class="btn btn-secondary mt-3">Batal</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')

<script>

    $(document).ready(function () {
        $('#table_standart').DataTable();
        $('#table_auditee').DataTable();
        $('#table_auditor').DataTable();
        $('#table_news').DataTable();
    });
</script>


@include('layouts.global-script')
</body>

</html>
