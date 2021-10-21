
<?php 
$con=mysqli_connect('localhost','root','','perpustakaan');
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as x FROM peminjaman WHERE status='Menunggu Persetujuan'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        
      </li>

      <!-- Messages Dropdown Menu -->
      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(session()->get('Nama')); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php 
          if(session()->get('Level') == "Admin"){
          ?>
          <li class="nav-item">
            <a href="<?php echo e(route('Anggota')); ?>" class="nav-link <?php echo e(Request::is('anggota*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Anggota</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('Buku')); ?>" class="nav-link <?php echo e(Request::is('books*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Buku</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('Pengajuan-Peminjaman')); ?>" class="nav-link <?php echo e(Request::is('pengajuan-peminjaman*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-book-open"></i>
              <p>Pengajuan Pinjaman</p>
              <?php 
              if($dt['x'] != 0){
              ?>
              <span class="badge badge-danger navbar-badge"><?=$dt['x'];?></span>
              <?php
              }
              ?>
            </a>
          </li>
          <?php 
          }elseif(session()->get('Level') == "Anggota"){
          ?>
          <li class="nav-item">
            <a href="<?php echo e(route('Peminjaman')); ?>" class="nav-link <?php echo e(Request::is('peminjaman*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>Peminjaman</p>
            </a>
          </li>
          <?php 
          }
          ?>
          
          <li class="nav-item">
            <a href="<?php echo e(route('Logout')); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php echo $__env->yieldContent('content'); ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(asset('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

<!-- Sweetalert -->
<script src="<?php echo e(asset('dist/js/sweetalert.min.js')); ?>"></script>

</body>
</html>
<!-- data tables -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "searching": false,
      // "ordering": true,
      // "info": true,
      // "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": "./server_side/server_processing.php"
    });
    $('#example3').DataTable({
      "paging": true,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": "./server_side/server_processing_anggota.php"
    });
    $('#example4').DataTable({
      "paging": true,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": "./server_side/server_processing_peminjaman.php"
    });
    $('#example5').DataTable({
      "paging": true,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": "./server_side/server_processing_pengajuan.php"
    });
  });

  // tooltip
  $(document).ready(function(){
    $("[data-toggle='tooltip']").tooltip();
  });
</script>

<?php 
if (session()->has('login') == "Berhasil") {
  ?>
  <script type="text/javascript">
      swal({
          title:"Login Berhasil!",
          text:"Selamat Datang Di Sistem Perpustakaan!",
          icon:"success",
          button:false,
          timer:3000
          });
  </script>
  <?php
  session()->put('login') == "Sudah Login";
}

// Alert
if (Session('cek') == "Berhasil") {
        
  if(Session('edit') == "Berhasil"){
      ?>
     <script type="text/javascript">
          setTimeout(function(){location.href=" <?= Session('href'); ?>"}, 6000);
     </script> 
      <?php
  }
  ?>
  <script type="text/javascript">
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      var alert = document.getElementById("success");
      setTimeout(function() {
          $("#success").slideDown("slow");
      }, 2000);
      alert.innerHTML= "<i class='fas fa-exclamation-triangle'></i> <?= Session('message'); ?>";
      setTimeout(function() {
          $("#success").fadeTo(2000, 500).slideUp(500, function(){
          $("#success").slideUp(500);
           });
      }, 5000);
   </script>
  <?php
}elseif (Session('cek') == "Gagal") {
  ?>
  <script type="text/javascript">
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      var alert = document.getElementById("fail");
      setTimeout(function() {
          $("#fail").slideDown("slow");
      }, 2000);
      alert.innerHTML= "<i class='fas fa-exclamation-triangle'></i> <?= Session('message'); ?>";

      setTimeout(function() {
          $("#fail").fadeTo(2000, 500).slideUp(500, function(){
          $("#fail").slideUp(500);
          });
      }, 5000);
  </script>
  <?php
}
// End Alert
if (empty(session()->has('Level')) ) {
  ?>  
  <script>
    location.href ="/";
  </script>
  <?php
}

?>

<script>
// Ajax Untuk Menghapus Buku
function hapus_buku(x) {
  var del_id= x;
  var token = " <?php echo e(csrf_token()); ?>";
  swal({
    title: "Apakah Anda Yakin?",
    text: "Ketika Menghapus, Anda Tidak Bisa Mengembalikan Data Kembali",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (!willDelete) return;
          $.ajax({
              url: "/book/delete/"+del_id,
              type: "DELETE",
              dataType: "JSON",
              data: {
                  "id": del_id,
                  "_token" : token
              },
              success: function (data) {
              if(data.message =="Berhasil"){
                  swal("Sukses!", "Data Buku Berhasil Dihapus!", "success").then(function(){
                      location.href="/books";
                  });
              }else{
                  swal("Warning!", "Data Buku Gagal Dihapus!", "warning");
              }
              },
              error:function(xhr, status, error){
               
                  swal("Warning!", "Data Buku Gagal Dihapus!"+xhr.responseText, "warning");
              }
          });
    });
}

// ajax untuk menghapus anggota
function hapus_anggota(x) {
  var del_id= x;
  var token = " <?php echo e(csrf_token()); ?>";
  swal({
    title: "Apakah Anda Yakin?",
    text: "Ketika Menghapus, Anda Tidak Bisa Mengembalikan Data Kembali",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (!willDelete) return;
          $.ajax({
              url: "/anggota/delete/"+del_id,
              type: "DELETE",
              dataType: "JSON",
              data: {
                  "id": del_id,
                  "_token" : token
              },
              success: function (data) {
              if(data.message =="Berhasil"){
                  swal("Sukses!", "Data Anggota Berhasil Dihapus!", "success").then(function(){
                      location.href="/anggota";
                  });
              }else{
                  swal("Warning!", "Data Anggota Gagal Dihapus!", "warning");
              }
              },
              error:function(xhr, status, error){
               
                  swal("Warning!", "Data Anggota Gagal Dihapus!"+xhr.responseText, "warning");
              }
          });
    });
}

// ajax untuk memgkonfirmasi status peminjaman
function konfirmasi(x){
  var del_id= x;
  var token = " <?php echo e(csrf_token()); ?>";
  swal({
  title: "Persetujuan Peminjaman!",
  text: "Silahkan pilih untuk melakukan proses persetujuan!",
  icon: "warning",
  buttons: {
    catch: {
      text: "Setujui",
      value: "catch",
    },
    Tidak: true,
  },
  dangerMode: true,
})
.then((value) => {
  switch (value) {
 
    case "Tidak":
      $.ajax({
        url: "/pengajuan/tidak",
        type: "POST",
        dataType: "JSON",
        data: {
            "id": del_id,
            "_token" : token
        },
        success: function (data) {
        if(data.message =="Berhasil"){
            swal("Sukses!", "Peminjaman Tidak Disetujui!", "success").then(function(){
                location.href="/pengajuan-peminjaman";
            });
        }else{
            swal("Warning!", "404:Peminjaman Gagal Disetujui!", "warning");
        }
        },
        error:function(xhr, status, error){
         
            swal("Warning!", "404:Peminjaman Gagal Disetujui!"+xhr.responseText, "warning");
        }
      });
      break;
 
    case "catch":
      $.ajax({
        url: "/pengajuan/setuju",
        type: "POST",
        dataType: "JSON",
        data: {
            "id": del_id,
            "_token" : token
        },
        success: function (data) {
        if(data.message =="Berhasil"){
            swal("Sukses!", "Peminjaman Berhasil Disetujui!", "success").then(function(){
                location.href="/pengajuan-peminjaman";
            });
        }else{
            swal("Warning!", "404:Peminjaman Gagal Disetujui!", "warning");
        }
        },
        error:function(xhr, status, error){
         
            swal("Warning!", "404:Peminjaman Gagal Disetujui!"+xhr.responseText, "warning");
        }
      });
      break;
 
    default:
      
  }
});
}

// ajax untuk memperbaharui status peminjaman
function returned(x) {
  var del_id= x;
  var token = " <?php echo e(csrf_token()); ?>";
  swal({
    title: "Apakah Anda Yakin?",
    text: "Apakah Buku Ini Sudah Di kembalikan?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (!willDelete) return;
          $.ajax({
              url: "/pengajuan/returned",
              type: "POST",
              dataType: "JSON",
              data: {
                  "id": del_id,
                  "_token" : token
              },
              success: function (data) {
              if(data.message =="Berhasil"){
                  swal("Sukses!", "Berhasil Memperbaharui Status Peminjaman!", "success").then(function(){
                      location.href="/anggota";
                  });
              }else{
                  swal("Warning!", "Gagal Memperbaharui Status Peminjaman!", "warning");
              }
              },
              error:function(xhr, status, error){
               
                  swal("Warning!", "Gagal Memperbaharui Status Peminjaman!"+xhr.responseText, "warning");
              }
          });
    });
}
</script><?php /**PATH C:\xampp\htdocs\Perpustakaan\resources\views/Layout/main.blade.php ENDPATH**/ ?>