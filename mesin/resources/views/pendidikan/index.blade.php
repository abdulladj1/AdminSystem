<!DOCTYPE html>
<html lang="en">
<head>
  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class "wrapper">
  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.mainSidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
      <h2>Daftar Pendidikan</h2>
      <a href="{{ route('pendidikan.create') }}" class="btn btn-primary mb-3">Tambah Pendidikan</a>
      <table class="table table-bordered">
        <thead>
          <?php $no = 1; ?>
          <tr>
            <th>No</th>
            <th>Nama Pendidikan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pendidikan as $pendidikan)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $pendidikan->pendidikan }}</td>
            <td>
              <a href="{{ route('pendidikan.edit', $pendidikan->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="post" style="display:inline;">
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
