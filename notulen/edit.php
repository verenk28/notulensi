<?php include('koneksi.php'); 
?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>EDIT NOTULENSI</h3>
    </div>

    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
      </div>
      <div class="x_content">
        <br />
		
		<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$select = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
		
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}
				?>
		
		<?php
		 if(isset($_POST['submit'])){
	    $id 					             = $_GET['id'];
      $tanggal                   = $_POST['tanggal'];
      $time                      = $_POST['time'];
      $agenda                    = $_POST['agenda'];
      $tempat                    = $_POST['tempat'];
      $pimpinan                  = $_POST['pimpinan'];
      $notulis                   = $_POST['notulis'];
			
			$sql = mysqli_query($koneksi, "UPDATE data SET tanggal='$tanggal', time='$time' , agenda='$agenda' , tempat='$tempat' , pimpinan='$pimpinan' , notulis='$notulis' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="template.php?f=notulen";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
            </label>
            <div class="col-md-3 col-sm-3 ">
              <input id="birthday" name="tanggal" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?php echo $data['tanggal']; ?>" required>
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
          <input class="form-control" class='time' type="time" name="time" value="<?php echo $data['time']; ?>" required>
         </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Agenda
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="agenda" class="form-control" value="<?php echo $data['agenda']; ?>" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tempat
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="tempat" class="form-control" value="<?php echo $data['tempat']; ?>" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pimpinan
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="pimpinan" class="form-control" value="<?php echo $data['pimpinan']; ?>" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Notulis
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="notulis" class="form-control" value="<?php echo $data['notulis']; ?>"  required>
            </div> 
          </div>

          
          <div class="item form-group">
            <div class="col-md-3 col-sm-3 offset-md-3">
              <button type="submit" name="submit" class="btn btn-success" value="simpan">Update</button>
              <a href="template.php?f=notulen" class="btn btn-primary black">Kembali</a>
            </div>
          </div>
        </form>
          <ul class="nav navbar-right panel_toolbox">
          <li><div id="contact"><a href="notulen/cetak.php?id=<?php echo $_GET['id']?>" target="_blank" class="btn btn-primary black ">Print PDF</a><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Tambah Pembahasan</button></div></li>
          <?php

      if(isset($_POST['simpan_pembahasan'])){
      $id_data                           = $_POST['id_data'];
      $pembahasan                        = $_POST['pembahasan'];
      $pic                               = $_POST['pic'];
      $duedate                           = $_POST['duedate'];



      $folderUpload = "./gambar";

      # periksa apakah folder sudah ada
      if (!is_dir($folderUpload)) {
          # jika tidak maka folder harus dibuat terlebih dahulu
          mkdir($folderUpload, 0777, $rekursif = true);
      }

      $fileFoto = (object) @$_FILES['gambar_upload'];
      $uploadFotoSukses = move_uploaded_file(
          $fileFoto->tmp_name, "{$folderUpload}/{$fileFoto->name}"
      );

      
      $simpan_pembahasan = mysqli_query($koneksi, "INSERT INTO pembahasan(id_data,pembahasan,pic,duedate,gambar) VALUES('$id_data' ,'$pembahasan','$pic' ,'$duedate' , '$fileFoto->name')") or die(mysqli_error($koneksi));
        
       
      }
    ?>
          <form action="" method="post" enctype="multipart/form-data">
          <div id="contact-modal" class="modal fade" data-backdrop="static" role="dialog">
          <div class="modal-dialog modal-xl">
          <div class="modal-content">
          <div class="modal-header">
          <div class="col-md-12 col-sm-12 ">
          <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id_data" class="form-control" required>
                <h2>Pembahasan : </h2>

                <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
               </head>
        
                <textarea class="ckeditor" name="pembahasan" id="pembahasan">
               </textarea>
                <script>
                        CKEDITOR.replace( 'ckeditor' );
                </script>

              <h2>PIC : </h2>
              <div class="col-md-12 col-sm-12  form-group">
                  <input type="text" name="pic" class="form-control" required>
                </div>

              <h2>DUE DATE</h2>
            <div class="col-md-4 col-sm-4 ">
              <input id="birthday" name="duedate" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" required>
              <script>
                function timeFunctionLong(input) {
                  setTimeout(function() {
                    input.type = 'text';
                  }, 60000);
                }
              </script>

              <h2>Gambar</h2>
              <input type="file" name="gambar_upload" id="gambar_upload" required>
              <hr>
              <input type="submit" name="simpan_pembahasan" class="btn btn-success" value="SIMPAN">
              <a href="template.php?f=editnotulen&id=<?php echo $_GET['id'] ?>" class="btn btn-primary black">Kembali</a></form>
            </div>
             

        </ul>
       <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Pembahasan</th>
                          <th>PIC</th>
                          <th>Due Date</th>
                          <th>Gambar</th>

                        </tr>
                      </thead>
                      <tbody>
        <?php
        $id_data=$_GET['id'];
        $ambildata = mysqli_query($koneksi, "SELECT * FROM pembahasan WHERE id_data='$id_data'") or die(mysqli_error($koneksi));
        if(mysqli_num_rows($ambildata) > 0){
          $no = 1;
          while($pembahasan = mysqli_fetch_assoc($ambildata)){
            echo '
              <tr>
              <td>'.$no.'</td>
              <td>'.$pembahasan['pembahasan'].'</td>
              <td>'.$pembahasan['pic'].'</td>
              <td>'.$pembahasan['duedate'].'</td>
              <td>
              <img src=gambar/'.$pembahasan['gambar']?> width="70"></td>
                 
            </tr>
        <?php
          
            $no++;
          }
        }else{
          echo '
          <tr>
            <td colspan="6">Tidak ada data.</td>
          </tr>
          ';
        }
        ?>
          

        </form>
      </div>
    </div>
  </div>
</div>



 