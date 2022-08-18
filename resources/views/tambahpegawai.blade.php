@extends('layout.admin')

@section('content')
<body>
<br>
<br>
<br>
  <h1 class="text-center mb-5">Tambah Data Pegawai</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
      <div class="card">
        <div class="card-body">
          <form action="/insertpegawai" method="POST" enctype="multipart/form-data">
            {{-- untuk input data --}}
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
              <label for="usernane" class="form-label">Username</label>
              <input type="username" name="username" class="form-control">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Pilih Status</option>
                <option value="admin">admin</option>
                <option value="manager">manager</option>
                <option value="staff">staff</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
@endsection