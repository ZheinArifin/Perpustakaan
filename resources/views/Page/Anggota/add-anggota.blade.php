@extends('Layout.main')

@section('content')
<?php 
$con=mysqli_connect('localhost','root','','perpustakaan');
$kode = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as kd FROM anggota"));
$kd = $kode['kd'];
$kd++;
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
            <h1 class="m-0">Anggota</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
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
                <h3 class="card-title"><b>Tambah Anggota</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="box-shadow: 3px 8px 16px rgba(0,0,0,0.6)">
                <form action="/anggota/add/save" method="post" class="p-3">
                {{ csrf_field() }}
                        
                        <input name='id' hidden value="{{$kd}}" type="text" required class="col-sm-12 form-control" style="text-transform:uppercase" onkeypress="return /[0-9A-Z]/i.test(event.key)">
                        <div class="row pb-2">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="">Nama</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <input name='nama' type="text" required class="col-sm-12 col-md-6 form-control" minlength="4" style="text-transform:capitalize" >
                                </div>
                            </div>
                        </div>

                        <div class="row pb-2">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input name='email' minlength="8" type="email" required class="col-sm-12 col-md-6 form-control">
                                </div>
                            </div>
                        </div>
                
                        <div class="row pb-2">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input name='password'  type="password" required class="col-sm-12 col-md-6 form-control" minlength="4" style="text-transform:capitalize" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row pb-2">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <button type="submit" class="btn btn-success col-sm-3">Simpan</button>
                                <a href="/anggota" class="btn btn-danger col-sm-3">Kembali</a>
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