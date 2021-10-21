

<?php $__env->startSection('content'); ?>
<?php 
$con=mysqli_connect('localhost','root','','perpustakaan');
$kode = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as kd FROM peminjaman"));
$kd = $kode['kd'];
$kd++;

// cek Level login
if (session()->get('Level') != "Admin" ) {
    ?>  
    <script>
      location.href ="/dashboard";
    </script>
    <?php
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peminjaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Peminjaman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-dark">
                <h3 class="card-title"><b>Tabel Peminjaman</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example5" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- The Modal -->
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Perpustakaan\resources\views/Page/Peminjaman/pengajuan-pinjaman.blade.php ENDPATH**/ ?>