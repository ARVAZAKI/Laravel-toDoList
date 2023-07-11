<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
    ">

</head>
<body>
    <style>
        body{
            background-color: rgb(74, 93, 94);
        }
    </style>
    <div class="text-center m-4">
            <h3 class="text-light">To Do List</h3>
    </div>
    <div class="container">
       <div class="row d-flex justify-content-center">
        <div class="col-lg-7">
            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalcreate">
                Add new activity
            </button>
            <div class="modal fade" id="modalcreate" tabindex="-1" aria-labelledby="modalcreate" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalcreates">Create new activity</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('todo.store') }}" method="POST" class="form">
                        @csrf
                        <label for="" class="form-label">Activity</label>
                        <input type="text" name="activity" class="form-control" id="">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Activity</button>
                </form>
                    </div>
                </div>
                </div>
            </div>
                <div class="card rounded shadow-sm">
                <div class="card-header text-center text-bold">To Do List</div>
                <div class="card-body">
                    <table class="table table-responsive table-responsive-xl">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Activities</th>
                            <th scope="col">Option</th>
                        </thead>
                        @forelse ($activity as $item)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->activity }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit">Edit</a>
                                    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modaledits">Edit activity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('todo.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <label for="" class="form-label">Activity</label>
                                                <input type="text" name="activity" class="form-control" value="{{ old($item->activity) }}">
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Edit Activity</button>
                                        </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete">Delete</a>
                                    <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="modaldelete" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modaledits">Delete activity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('delete', $item->id) }}" method="GET">
                                                @csrf
                                                @method('DELETE')
                                                apakah ingin menghapus activity?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete Activity</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Maaf data belum tersedia...
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $activity->links() }}
                </div>
            </div>
        </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
@include('sweetalert::alert')


</html>
