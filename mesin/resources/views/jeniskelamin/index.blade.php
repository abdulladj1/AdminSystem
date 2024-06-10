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
      <h2>Daftar Jenis Kelamin</h2>
      <a href="{{ route('jeniskelamin.create') }}" class="btn btn-primary mb-3">Tambah Jenis Kelamin</a>
      <table class="table table-bordered">
        <thead>
          <?php $no = 1; ?>
          <tr>
            <th>No</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jeniskelamin as $jeniskelamin)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $jeniskelamin->jenisKelamin }}</td>
            <td>
              <a href="{{ route('jeniskelamin.edit', $jeniskelamin->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('jeniskelamin.destroy', $jeniskelamin->id) }}" method="post" style="display:inline;">
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
