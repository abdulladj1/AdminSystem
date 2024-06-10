
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

    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <ul class="l-main-content main-content">
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner">
                <h1>Hi, I am<br>Abdullah Adji<br>Nugroho</h1>
                <button class="cta"><a class="cta" href=" {{ url('/data-pegawai') }} ">
                  Data Pegawai
                  </a>
                  <span class="btn-background"></span>
                </button>
                <img src="mesin/assets/img/abdull.png" alt="Welcome" width=300>
              </div>
              <div class="intro--options">
                <a href=" {{ url('/data-agama') }} ">
                  <h3>Data Agama</h3>
                </a>
                <a href=" {{ url('/data-jenispegawai') }} ">
                  <h3>Data Jenis Pegawai</h3>
                </a>
                <a href=" {{ url('/data-statuspegawai') }} ">
                  <h3>Data Status Pegawai</h3>
                </a>
                <a href=" {{ url('/data-pendidikan') }} ">
                  <h3>Data Pendidikan</h3>
                </a>
                <a href=" {{ url('/data-jeniskelamin') }} ">
                  <h3>Data Jenis Kelamin</h3>
                </a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @include('template.script3')
</body>
</html>