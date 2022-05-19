<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased">
      @include('navbar')
        <div class="container mt-4">
            <div class="row">

                {{-- Role Data --}}
                <div class="col-sm-10 mx-auto">
                    <div class="card bg-white mb-5">
                        <div class="card-header">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h4 class="h4 fw-bolder">Role</h4>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Import
                                    </button>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <a href="{{ route('role-export') }}" class="btn btn-outline-dark btn-sm">Export</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table class="table w-100">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">User</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if (isset($roles) && $roles->count() > 0)
                                        @foreach ($roles as $item)
                                         <tr>
                                            <th scope="row">{{++$loop->index}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{@$item->user->name}}</td>
                                          </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-end">
                            @if (isset($roles))
                                {{$roles->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('role-import') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-body">
            <div class="mb-2">
                <label for="">Import File</label>
                <input type="file" name="file" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    <script src="{{asset('js/app.js')}}"></script>
</html>
