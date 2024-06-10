<!DOCTYPE html>
<html lang="en">
<head>
  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.mainSidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formulir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                  </div>
                  <div class="form-group">
                      <label for="jenispegawai">Jenis Pegawai</label>
                      <select class="form-control" id="jenis_pegawai_id" name="jenis_pegawai_id">
                          @foreach ($jenispegawai as $jenispegawai)
                              <option value="{{ $jenispegawai->id }}">{{ $jenispegawai->nama_jenisPegawai }}</option>
                          @endforeach
                      </select>
                  </div>                 
                  <div class="form-group">
                    <label for="statuspegawai">Status Pegawai</label>
                      <select class="form-control" id="status_pegawai_id" name="status_pegawai_id">
                          @foreach ($statuspegawai as $statuspegawai)
                              <option value="{{ $statuspegawai->id }}">{{ $statuspegawai->statusPegawai }}</option>
                          @endforeach
                      </select>
                  </div>                
                  <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Masukkan Unit" required>
                  </div>
                  <div class="form-group">
                    <label for="subUnit">Sub. Unit</label>
                    <input type="text" class="form-control" id="subUnit" name="subUnit" placeholder="Masukkan Sub. Unit" required>
                  </div>
                  <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                      <select class="form-control" id="pendidikan_id" name="pendidikan_id">
                          @foreach ($pendidikan as $pendidikan)
                              <option value="{{ $pendidikan->id }}">{{ $pendidikan->pendidikan }}</option>
                          @endforeach
                      </select>
                  </div>
 
                  <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
                  </div>                  
                  <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan Tempat Lahir" required>
                  </div>
                  <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin</label>
                      <select class="form-control" id="jenis_kelamin_id" name="jenis_kelamin_id">
                          @foreach ($jeniskelamin as $jeniskelamin)
                              <option value="{{ $jeniskelamin->id }}">{{ $jeniskelamin->jenisKelamin }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="agama_id">Agama:</label>
                      <select class="form-control" id="agama_id" name="agama_id">
                          @foreach($agamas as $agama)
                          <option value="{{ $agama->id }}">{{ $agama->nama_agama }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="gambar">Gambar Pegawai</label>
                      <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                  </div>
               @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                 </div>
                @endif
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('template.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  @include('template.script')
</body>
</html>
