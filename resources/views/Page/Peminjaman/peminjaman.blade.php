@extends('Layout.main')

@section('content')
<?php 
$con=mysqli_connect('localhost','root','','perpustakaan');
$kode = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as kd FROM peminjaman"));
$kd = $kode['kd'];
$kd++;
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
                <a href="/anggota/add" class="btn btn-success" style="border-radius:24px" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i> Pinjam
                </a><br><br>
                <table id="example4" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
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
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-dark">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="/peminjaman/add/save" method="post">
        <!-- Modal body -->
        <div class="modal-body">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Buku</label>
                        <select name="buku" class="form-control" id="">{{$buku}}
                            <?php 
                                foreach($buku as $val){
                                    echo "<option value='$val->kd_buku'>$val->judul_buku</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tanggal Peminjaman</label>
                        <input name="id" type="hidden" class="form-control" required value="<?=$kd;?>" readonly>
                        <input name="id_anggota" type="hidden" class="form-control" required value="{{ session()->get('Id') }}" readonly>
                        <input name="peminjaman" type="date" class="form-control" required value="<?=date('Y-m-d');?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tanggal Pengembalian</label>
                        <input name="pengembalian" type="date" class="form-control" min="<?=date('Y-m-d', strtotime('+1 day',strtotime(date('Y-m-d')) ));?>" >
                    </div>
                </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>

@endsection