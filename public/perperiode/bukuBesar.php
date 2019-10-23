<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Buku Besar</i></strong></h5>
			<hr>
			<div class="container-fluid table-responsive">
                <?php
                    $periode=$_POST['periode'];
					$con = mysqli_connect("localhost","root","","akutansiAuto");
			        if (mysqli_connect_errno()){
			            echo "Koneksi database gagal : " . mysqli_connect_error();
			        } else {
			        $query = mysqli_query($con,"select*from transaksi inner join ketref on ketref.noRef = transaksi.noRef where tanggal like '$periode%' order by ketref.noRef, transaksi.tanggal");
			        $query1 = mysqli_query($con,"select*from transaksi inner join ketref on ketref.noRef = transaksi.noRef where (ketref.noRef <> 19 and ketref.noRef <> 57) and tanggal like '$periode%' group by ketref order by transaksi.noRef");
					if(mysqli_num_rows($query1)>0){
							
						while ($data1=mysqli_fetch_array($query1)) {
							$saldo=0;
							$param=0;
							echo nl2br("<table class='table table-bordered'><tr><td><h5>Nama Perkiraan ".$data1['ketref']."</h5></td><td><h5 class='text-right'>No Perkiraan ".$data1['noRef']."</h5></td></tr></table>\n");
							?>
							<table border="1" class="table table-sm">
							<thead class="thead-dark text-center ">
								<tr >
									<th colspan="2" rowspan="2" class="align-middle">Tanggal</th>
									<th rowspan="2" class="align-middle">Uraian</th>
									<th rowspan="2" class="align-middle">Ref</th>
									<th rowspan="2" class="align-middle">Debet</th>
									<th rowspan="2" class="align-middle">Kredit</th>
									<th colspan="2">Saldo</th>
								</tr>
								<tr>
									<th >Debet</th>
									<th >Kredit </th>
								</tr>
							</thead>
							<?php
							$totD=0;
							$totK=0;
							$totS=0;
							foreach ($query as $data) { 
								if ($data['noRef']==$data1['noRef']) {
								?>
									<tr>
										<td>
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
										<td>
											<?php  
												$tanggal=substr($tanggal1,8,2);
												echo $tanggal;
											?>	
										</td>
										<td><?php echo $data["ketref"]; ?></td>
										<td><?php echo $data["noRef"]; ?></td>
										<td class="text-right"><?php echo $data["debet"]; $totD=$totD+$data["debet"]; ?></td>
										<td class="text-right"><?php echo $data["kredit"];$totK=$totK+$data["kredit"]; ?></td>
										<td class="text-right">
											<?php 
												$d=$data["debet"];
												$k=$data["kredit"];
												if ($d!=0) {
													$saldo=$saldo+$d;
													$totS=$saldo;
												} else {
													$saldo=$saldo-$k;
													$totS=$saldo;
												}
												if ($saldo>0) {
													echo $saldo;
												} else {
													echo '0';
												}

											?>
										</td>
										<td class="text-right">
											<?php 
												if ($saldo<0) {
													echo substr($saldo, 1);
												} else {
													echo '0';
												}
											?>											
										</td>
									</tr>
								<?php
								}
							}
							?>
								<tr class="text-right">
									<td colspan="4"></td>
									<td>
										<?php
											echo $totD;
										?>
									</td>
									<td><?php
											echo $totK;
										?>	
									</td>
									<td>
										<?php
										if ($totS>0) {
											echo $totS;
										} 
										?>
									</td>
									<td>
										<?php
										if ($totS<0) {
											echo substr($totS,1);
										} 
										?>
									</td>
								</tr>
							</table><br><br>
							<?php
						}
					}
			    }
				?>
				
			</div>
		</div>
	</div>
</body>
</html>