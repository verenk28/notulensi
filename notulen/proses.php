<?php
					
				$sql = mysqli_query($koneksi, "SELECT * FROM master_karyawan ORDER BY id DESC") or die(mysqli_error($koneksi));

				if(mysqli_num_rows($sql) > 0){
				
					$no = 1;
					
					while($data = mysqli_fetch_assoc($sql)){
					
						echo '
						<tr>
							<td>'.$NO.'</td>
							<td>'.$NIK['nik'].'</td>
							<td>'.$NAMA['nama'].'</td>
							<td>'.$TANGGAL_MASUK['tgl_msk'].'</td>
							<td>'.$TANGGAL_LAHIR['tgl_lahir'].'</td>
							<td>'.$DEPARTEMEN['departemen'].'</td>
							<td>'.$BAGIAN['bagian'].'</td>
							<td>'.$ALAMAT['alamat'].'</td>
							<td>'.$KTP['ktp'].'</td>
							<td>'.$NO_TELP['no_telp'].'</td>
							<td>'.$PLAFON['plafon'].'</td>
							<td>'.$SISA_PLAFON['sisa_plafon'].'</td>
							<td>
								<a href="edit.php?id='.$master_karyawan['id'].'" class="badge badge-warning">Edit</a>
								<a href="delete.php?id='.$master_karyawan['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
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