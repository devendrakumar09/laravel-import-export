<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">USER & ROLE</a>
        <button type="button" class="btn btn-dark btn-sm text-white mt-1" data-bs-toggle="modal" data-bs-target="#role">
            Import Role With Users
        </button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('users')}}">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('roles') }}">Roles</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="modal fade" id="role" tabindex="-1" aria-labelledby="roleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roleLabel">Import Role With Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('import-role-with-users') }}" method="post" enctype="multipart/form-data">
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
