<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Jurnal Umum</i></strong></h5>
			<hr>
			<div class="container-fluid table-responsive">
				<table border="1" class="table table-sm">
					<thead class="thead-dark text-center">
						<tr>
							<th colspan="2">Tanggal</th>
							<th>Uraian</th>
							<th>Ref</th>
							<th>Debet</th>
							<th>Kredit</th>
							<th>Aksi</th>
						</tr>
					</thead>
                <?php
                    $periode=$_POST['periode'];
					$con = mysqli_connect("localhost","root","","akutansiauto");
			        if (mysqli_connect_errno()){
			            echo "Koneksi database gagal : " . mysqli_connect_error();
			        } else {
			        $query = mysqli_query($con,"select*from transaksi inner join ketref on ketref.noRef = transaksi.noRef where tanggal like '$periode%' order by tanggal,no, kdTransaksi");
			        $no=1;
			        $param=0;
					if(mysqli_num_rows($query)>0){
						while ($data=mysqli_fetch_array($query)) { ?>
							<tr>
								<td class="text-center">
									<?php 
										$tanggal1=$data["Tanggal"];
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
										$tanggal=substr($tanggal1,8,2);
										echo $tanggal;
									?>	
								</td>
								<td><?php echo $data["ketref"]; ?></td>
								<td class="text-center"><?php echo $data["noRef"]; ?></td>
								<td class="text-right"><?php echo $data["debet"]; ?></td>
								<td class="text-right"><?php echo $data["kredit"]; ?></td>
								<td class="text-center"><a href="../../src/controller.php?aksi=hapus&kd=<?php echo $data['no'];?>"><button type="button" class="btn btn-outline-danger">HAPUS</button></a></td>
							</tr>
							<?php
						}
					}
			    }
				?>
				<tr>
					<td colspan="4">TOTAL</td>
					<?php 
							if (mysqli_connect_errno()){
								echo "Koneksi database gagal : " . mysqli_connect_error();
							} else {
							$query = mysqli_query($con,"select sum(debet), sum(kredit) from transaksi where tanggal like '$periode%'");
							foreach($query as $key){ ?>
							<td class="text-right"><?php echo $key['sum(debet)']; ?></td>
							<td class="text-right"><?php echo $key['sum(kredit)']; ?></td>
							<td></td>
							<?php }
							}
						?>
				</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>