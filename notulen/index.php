<?php
include('koneksi.php');
?>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>NOTULENSI RS AWAL BROS PEKANBARU</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a href="?f=tambahnotulen" class="btn btn-primary black text-dark"><i class="fa fa-plus"></i> Tambah Notulen</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <p class="text-muted font-13 m-b-30">
                List Notulensi Rapat
              </p>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>WAKTU</th>
                    <th>AGENDA</th>
                    <th>TEMPAT</th>
                    <th>PIMPINAN</th>
                    <th>NOTULIS</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>

        <?php
				$sql = mysqli_query($koneksi, "SELECT * FROM data ORDER BY id") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
							<tr>
              <td>'.$no.'</td>
							<td>'.$data['tanggal'].'</td>
              <td>'.$data['time'].'</td>
							<td>'.$data['agenda'].'</td>
							<td>'.$data['tempat'].'</td>
							<td>'.$data['pimpinan'].'</td>
							<td>'.$data['notulis'].'</td>
              ';?>
              <td>
                      <a href="notulen/cetak.php?id=<?php echo $data['id']?>" target="_blank" id="topdf"  class="btn btn-info"><i class="fa fa-eye"></i> PDF</a>
                      <a href="template.php?f=editnotulen&id=<?php echo $data['id']?>" class="btn btn-info"><i class="fa fa-pencil"></i> EDIT </a>
                      <a href="template.php?f=deletenotulen&id=<?php echo $data['id']?>" class="btn btn-danger" onclick="return confirm(' Yakin mau dihapus?')"><i class="fa fa-trash"></i> HAPUS </a>
                    </td>
							
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
                  
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

