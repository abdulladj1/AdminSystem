
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
 <div class="container">
 <h2>Edit Data Pegawai</h2>
              <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pegawai->nama }}">
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $pegawai->nik }}">
                  </div>
                  <div class="form-group">
                      <label for="jenispegawai">Jenis Pegawai</label>
                      <select class="form-control" id="jenis_pegawai_id" name="jenis_pegawai_id">
                          @foreach ($jenispegawai as $jp)
                              <option value="{{ $jp->id }}" {{ $jp->id == $pegawai->jenis_pegawai_id ? 'selected' : '' }}>
                                  {{ $jp->nama_jenisPegawai }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="statuspegawai">Status Pegawai</label>
                      <select class="form-control" id="status_pegawai_id" name="status_pegawai_id">
                          @foreach ($statuspegawai as $sp)
                              <option value="{{ $sp->id }}" {{ $sp->id == $pegawai->status_pegawai_id ? 'selected' : '' }}>
                                  {{ $sp->statusPegawai }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" value="{{$pegawai->unit}}">
                  </div>
                  <div class="form-group">
                    <label for="subUnit">Sub. Unit</label>
                    <input type="text" class="form-control" id="subUnit" name="subUnit" value="{{$pegawai->subUnit}}">
                  </div>
                  <div class="form-group">
                      <label for="pendidikan">Pendidikan</label>
                      <select class="form-control" id="pendidikan_id" name="pendidikan_id">
                          @foreach ($pendidikan as $pd)
                              <option value="{{ $pd->id }}" {{ $pd->id == $pegawai->pendidikan_id ? 'selected' : '' }}>
                                  {{ $pd->pendidikan }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="{{$pegawai->tanggallahir}}">
                  </div>                  
                  <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="{{$pegawai->tempatlahir}}">
                  </div>
                  <div class="form-group">
                      <label for="jeniskelamin">Jenis Kelamin</label>
                      <select class="form-control" id="jenis_kelamin_id" name="jenis_kelamin_id">
                          @foreach ($jeniskelamin as $jk)
                              <option value="{{ $jk->id }}" {{ $jk->id == $pegawai->jenis_kelamin_id ? 'selected' : '' }}>
                                  {{ $jk->jenisKelamin }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="agama_id">Agama</label>
                      <select class="form-control" id="agama_id" name="agama_id">
                          @foreach ($agamas as $agama)
                              <option value="{{ $agama->id }}" {{ $agama->id == $pegawai->agama_id ? 'selected' : '' }}>
                                  {{ $agama->nama_agama }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="gambar">Gambar Pegawai</label>
                      <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                  </div>

                  @if ($pegawai->gambar)
                      <div class="form-group">
                          <label for="current_gambar">Gambar Saat Ini : </label>
                          <img src="{{ asset('mesin/public/storage/' . $pegawai->gambar) }}" alt="{{ $pegawai->nama }}" style="max-width: 100px;">
                      </div>
                  @endif
                  <?php $imagePath = 'public/' . $pegawai->gambar; ?>
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
