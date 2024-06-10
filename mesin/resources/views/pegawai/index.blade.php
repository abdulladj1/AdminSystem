
<!DOCTYPE html>
<html lang="en">
<head>
  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@method('POST')
  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.mainSidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

 <div class="container">
 <h2>Data Pegawai</h2>
 <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
 <table class="table table-bordered">
 <thead>
 <tr>
  <?php $no=1; ?>
 <th>No</th>
 <th>Nama</th>
 <th>NIK</th>
 <th>Jenis Pegawai</th>
 <th>Status Pegawai</th>
 <th>Unit</th>
 <th>Sub Unit</th>
 <th>Pendidikan</th>
 <th>Tanggal Lahir</th>
 <th>Tempat Lahir</th>
 <th>Jenis Kelamin</th>
 <th>Agama</th>
 <th>Gambar</th>
 <th>Tools</th>
 </tr>
 </thead>
 <tbody>
 @foreach($pegawai as $pegawai)
 <tr>
 <td>{{ $no }}</td>
 <td>{{ $pegawai->nama }}</td>
 <td>{{ $pegawai->nik }}</td>
 <td>{{ $pegawai->jenisPegawai->nama_jenisPegawai }}</td> <!-- Menggunakan relasi jenisPegawai -->
 <td>{{ $pegawai->statusPegawai->statusPegawai }}</td> <!-- Menggunakan relasi statusPegawai -->
 <td>{{ $pegawai->unit }}</td>
 <td>{{ $pegawai->subUnit }}</td>
 <td>{{ $pegawai->pendidikan->pendidikan }}</td> <!-- Menggunakan relasi pendidikan -->
 <td>{{ $pegawai->tanggallahir }}</td>
 <td>{{ $pegawai->tempatlahir }}</td>
 <td>{{ $pegawai->jenisKelamin->jenisKelamin }}</td> <!-- Menggunakan relasi jenisKelamin -->
 <td>{{ $pegawai->agama->nama_agama }}</td>
 <td><img src="{{ asset('mesin/public/storage/' . $pegawai->gambar) }}" alt="{{ $pegawai->nama }}" style="max-width: 100px;"></td>
 <td>
 <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning">Edit</a>
 <form onsubmit="return confirm('Apakah Anda Yakin')"
 action="{{ route('pegawai.destroy', $pegawai->id) }}" method="post" 
style="display:inline;">
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
 `
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