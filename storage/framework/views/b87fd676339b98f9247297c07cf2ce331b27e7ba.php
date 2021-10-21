

<?php $__env->startSection('content'); ?>
<?php 
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
            <h1 class="m-0">Buku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buku</li>
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
                <h3 class="card-title"><b>Tabel Buku</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/book/add" class="btn btn-success" style="border-radius:24px">
                    <i class="fas fa-plus"></i> Tambah
                </a><br><br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Penulis</th>
                    <th>Stok</th>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Perpustakaan\resources\views/Page/Buku/buku.blade.php ENDPATH**/ ?>