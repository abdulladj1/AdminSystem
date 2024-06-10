
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
 <h2>Edit Data Agama</h2>
 <form action="{{ route('agama.update', $agama->id) }}" method="post">
 @csrf
 @method('PUT')
 <div class="form-group">
 <label for="nama_agama">Nama Agama:</label>
 <input type="text" class="form-control" id="nama_agama" name="nama_agama" 
value="{{ $agama->nama_agama }}" required>
 </div>
 <button type="submit" class="btn btn-primary">Update</button>
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
