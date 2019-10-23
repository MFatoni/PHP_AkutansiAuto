<?php include('../includes/templateAkutansi.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Jurnal Penyesuaian</i></strong></h5>
			<hr>
			<div class="container-fluid">
				<table border="1" class="table table-sm">
					<thead class="thead-dark text-center">
						<tr>
							<th colspan="2">Tanggal</th>
							<th>Uraian</th>
							<th>Ref</th>
							<th>Debet</th>
							<th>Kredit</th>
						</tr>
					</thead>
					<?php
						$con = mysqli_connect("localhost","root","","akutansiAuto");
					    if (mysqli_connect_errno()){
					        echo "Koneksi database gagal : " . mysqli_connect_error();
					    } else {
							$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef  where (penyesuaianD <> 0 or penyesuaianK <> 0) order by kdUnik");
							$param=0;
					        foreach ($query as $key) { ?>
								</tr>
									<td class="text-center">
										<?php 
											$tanggal1=$key["idnl"];
											$bln=substr($tanggal1,5,2);
											if ($bln=='01' or $bln=='1' ) {
												$bulan='Januari';
											} elseif ($bln=='02' or $bln=='2' ) {
												$bulan='Februari';
											} elseif ($bln=='03' or $bln=='3' ) {
												$bulan='Maret';
											} elseif ($bln=='04' or $bln=='4' ) {
												$bulan='April';
											} elseif ($bln=='05' or $bln=='5' ) {
												$bulan='Mei';
											} elseif ($bln=='06' or $bln=='6' ) {
												$bulan='Juni';
											} elseif ($bln=='07' or $bln=='7' ) {
												$bulan='Juli';
											} elseif ($bln=='08' or $bln=='8' ) {
												$bulan='Agustus';
											} elseif ($bln=='09' or $bln=='9' ) {
												$bulan='September';
											} elseif ($bln=='10' or $bln=='10' ) {
												$bulan='Oktober';
											} elseif ($bln=='11' or $bln=='11' ) {
												$bulan='November';
											} elseif ($bln=='12' or $bln=='12' ) {
												$bulan='Desember';
											} 
											if ($param!=$bln) {
												echo $bulan;
											}
											$param=$bln;
										?>
									</td>
									<td class="text-center">
										<?php  
											$hari_ini = date($tanggal1.'-01'); 
											$tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
											echo substr($tgl_terakhir,8,2);
										?>	
									</td>
					        		<td class="text-center"><?php echo $key['noRef'] ?></td>
					        		<td ><?php echo $key['ketref'] ?></td>
						        	<td class="text-right"><?php echo $key['penyesuaianD'] ?></td>
						        	<td class="text-right"><?php echo $key['penyesuaianK'] ?></td>
					        	<tr>
					        <?php }
					    }
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>