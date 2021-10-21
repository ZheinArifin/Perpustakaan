@extends('Layout.main')

@section('content')
<?php 
$con=mysqli_connect('localhost','root','','perpustakaan');
$kode = mysqli_fetch_array(mysqli_query($con, "SELECT max(kd_buku) as kd FROM buku"));
$kd_buku = (int) substr($kode['kd'], 3, 3);
 
$kd_buku++;
$huruf = "BK";
$kodeBuku = $huruf . sprintf("%03s", $kd_buku);

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
            <!-- Alert -->
                <div class="alert alert-info " id="success" style="display: none; border-radius:24px">
                </div>
                <div class="alert alert-warning " id="fail" style="display: none; border-radius:24px">
                </div>
            <!--End Alert  -->
            <div class="card">
              <div class="card-header bg-dark">
                <h3 class="card-title"><b>Tambah Buku</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="box-shadow: 3px 8px 16px rgba(0,0,0,0.6)">
                <form action="/book/add/save" method="post" class="p-3">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="">Kode Buku</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                        </div>
                                        <input name='kd_buku' readonly value="{{$kodeBuku}}" type="text" required class="col-sm-12 form-control" minlength="4" style="text-transform:uppercase" onkeypress="return /[0-9A-Z]/i.test(event.key)">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="">Judul Buku</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        </div>
                                        <input name='judul_buku' type="text" required class="col-sm-12 form-control" minlength="4" style="text-transform:capitalize" >
                                    </div>
                                </div>
                            </div>
    
                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="">Tahun Terbit</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input name='tahun_terbit' max="<?= date('Y-m-d'); ?>" type="date" required class="col-sm-12 form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="">Penulis</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input name='penulis'  type="text" required class="col-sm-12 form-control" minlength="4" style="text-transform:capitalize" onkeypress="return /[., A-Z]/i.test(event.key)">
                                    </div>
                                </div>
                            </div>
        
                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="">Stok</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <input name='stok' type="number" required class="col-sm-12 form-control" min="1" max="999" onkeypress="return /[0-9]/i.test(event.key)">
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-2">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <button type="submit" class="btn btn-success col-sm-3">Simpan</button>
                                    <a href="/books" class="btn btn-danger col-sm-3">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </form>
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
@endsection