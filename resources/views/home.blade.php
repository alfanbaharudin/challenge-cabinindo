<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/fav.ico')}}">
    <title>@if(auth()->user()->username) {{auth()->user()->username}} ({{auth()->user()->role}}) @endif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            background-image: url('{{ asset('img/background.png')}}');
            background-repeat: no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            height:100vh;
        }
        .bg-custom {
            background-color: white;
            border-radius: 20px;
        }
        img {
            width: 30%;
            padding: 20px 0 20px 0;
        }
        .pagination {
            justify-content: center;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .point-status:hover {
            cursor: context-menu;
        }
        @media only screen and (max-width: 767px) {
            .img-mobile {
                width: 80%;
            }
        }
        .size-icon {
            font-size: 300%;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-light point-status">
                    <i class="bi bi-person-fill size-icon"></i>
                    <h6>Hi @if(auth()->user()->username) {{auth()->user()->username}} @endif</h6>
                </button>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="/logout" class="btn btn-lg btn-danger mb-2">Logout</a>
                </div>
            </div>
        </div>
        <div class="text-center">
            <img class="img-mobile" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="bg-custom p-4">
            <div class="row">
                <div class="col">
                    <form action="/employee" method="GET">
                        <input type="search" name="search" class="form-control" placeholder="Search">
                    </form>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        @if(auth()->user()->role === 'Admin')
                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">No. Handphone</th>
                            <th scope="col" class="text-center">Address</th>
                            <th scope="col" class="text-center">Position</th>
                            @if(auth()->user()->role === 'Admin')
                            <th scope="col" class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $index = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <th scope="row" class="text-center">{{ $index++ }}</th>
                            <td>{{ $row->name }}</td>
                            <td>0{{ $row->telp }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->position }}</td>
                            @if(auth()->user()->role === 'Admin')
                            <td class="text-center">
                                <a class="btn btn-info" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->id }}">Edit</a>
                                <a class="btn btn-danger sweet-delete" role="button" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <!-- Add Data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/created" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No. Handphone</label>
                            <input type="number" name="telp" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" id="exampleInputEmail1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Add Data -->

    <!-- Edit Data -->
    @if(auth()->user()->role === 'Admin')
    @foreach ($data as $row)
    <div class="modal fade" id="exampleModal-{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/updated/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" value="{{ $row->name }}" name="name" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No. Handphone</label>
                            <input type="number" value="{{ $row->telp }}" name="telp" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required>{{ $row->address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Position</label>
                            <input type="text" value="{{ $row->position }}" name="position" class="form-control" id="exampleInputEmail1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <!-- end Edit Data -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif

        @error('telp')
        toastr.error("{{ $message }}")
        @enderror

        $('.sweet-delete').click(function() {
            var emid = $(this).attr('data-id')
            var emname = $(this).attr('data-name')
            swal({
                    title: "Are you sure?",
                    text: "Delete Data on Behalf of " + emname,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleted/" + emid
                    }
                });
        })
    </script>
</body>

</html>