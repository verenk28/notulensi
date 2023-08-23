<?php include('koneksi.php'); 
?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>TAMBAH NOTULENSI</h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5  form-group pull-right top_search">
        <div class="input-group">

        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php

      if(isset($_POST['submit'])){
      $tanggal                      = $_POST['tanggal'];
      $time                         = $_POST['time'];
      $agenda                       = $_POST['agenda'];
      $tempat                       = $_POST['tempat'];
      $pimpinan                     = $_POST['pimpinan'];
      $notulis                      = $_POST['notulis'];
      
            $sql = mysqli_query($koneksi, "SELECT * FROM data WHERE id='id'") or die(mysqli_error($koneksi));

      if(mysqli_num_rows($sql) == 0){
        $sql = mysqli_query($koneksi, "INSERT INTO data(tanggal,time,agenda,tempat,pimpinan,notulis) VALUES('$tanggal','$time' ,'$agenda' , '$tempat' , '$pimpinan' , '$notulis')") or die(mysqli_error($koneksi));
        
        if($sql){
          echo '<script>alert("Berhasil menambahkan data."); document.location="template.php?f=notulen";</script>';
        }else{
          echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
      }else{
        echo '<div class="alert alert-warning">Gagal, kode sudah terdaftar.</div>';
      }
    }
    ?>

        <form action="template.php?f=tambahnotulen" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
            </label>
            <div class="col-md-3 col-sm-3 ">
              <input id="birthday" name="tanggal" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" SELECT DAYNAME(NOW()) required>
              <script>
                function timeFunctionLong(input) {
                  setTimeout(function() {
                    input.type = 'text';
                  }, 60000);
                }
              </script>
            </div>
          </div>
          <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu
          </label>
          <div class="col-md-3 col-sm-3">
          <input class="form-control" class="time" type="time" name="time" required='required'>
         </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Agenda
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="agenda" class="form-control" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tempat
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="tempat" class="form-control" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pimpinan
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="pimpinan" class="form-control" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Notulis
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="notulis" class="form-control"  required>
            </div> 
          </div>
          
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-3 col-sm-3 offset-md-3">
              <a href="template.php?f=notulen" class="btn btn-primary">Kembali</a>
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>











