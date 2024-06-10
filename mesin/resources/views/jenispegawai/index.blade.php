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
      <h2>Daftar Jenis Pegawai</h2>
      <a href="{{ route('jenispegawai.create') }}" class="btn btn-primary mb-3">Tambah Jenis Pegawai</a>
      <table class="table table-bordered">
        <thead>
          <?php $no=1; ?>
          <tr>
            <th>No</th>
            <th>Nama Jenis Pegawai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jenispegawai as $pegawai)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $pegawai->nama_jenisPegawai }}</td>
            <td>
              <a href="{{ route('jenispegawai.edit', $pegawai->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('jenispegawai.destroy', $pegawai->id) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
          <?php $no++; ?>
          @endforeach
        </tbody>
      </table>
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
