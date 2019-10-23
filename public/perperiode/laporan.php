<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Laporan</i></strong></h5>
			<hr>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 table-responsive">
						<h4>Laporan Laba Rugi</h4><br>
						<table class="table table-sm">
							<tr>
								<td colspan="3">Pendapatan</td>
								<td class="text-right">
									<?php
										$pD=0;
                                        $pK=0;
                                        $periode=$_POST['periode'];
										$con = mysqli_connect("localhost","root","","akutansiAuto");
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where golAkun='Pendapatan' and idnl like '$periode%'");
											foreach ($query as $key) {
												$pT=$key['rugiLabaK'];
												echo $pT;
											}
										}
									?>
								</td>
							</tr>
							<tr>
								<td class="align-center">Beban</td>
								<td>
									<?php
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select distinct ketref from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where ketref.noRef like '5%' and idnl like '$periode%' order by ketref.noRef");
											foreach ($query as $key) {
												echo nl2br($key['ketref']."\n"); 
											}
										}
									?>
								</td>
								<td class="text-right">
									<?php
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select rugiLabaD from neracalajur where noRef like '5%' and idnl like '$periode%' order by noRef");
											foreach ($query as $key) {
												echo nl2br($key['rugiLabaD']."\n");
											}
											
										}
									?>
								</td>
								<td class="text-right">
									<?php
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select rugiLabaK from neracalajur where noRef like '5%' and idnl like '$periode%' order by noRef");
											foreach ($query as $key) {
												echo nl2br($key['rugiLabaK']."\n");
											}
											
										}
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">Total</td>
								<td>
									<?php
										$totalfix=0;
										$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where (golAkun='Pendapatan' or golAkun='Beban') and idnl like '$periode%'");
											foreach ($query as $key) {
												$total=$key['rugiLabaK']-$key['rugiLabaD'];
												$totalfix=$totalfix+$total;
											}
										if($totalfix<0){
											echo substr($totalfix,1);
										}
									?>
								</td>
								<td class="text-right">
									<?php
										if($totalfix>0){
											echo $totalfix;
										}
									?>
								</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6 table-responsive">
						<h4>Perubahan Modal</h4><br>
						<table class="table table-sm">
							<tr>
								<td>Modal</td>
								<td class="text-right">
									<?php
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select neracaK from neracalajur where noRef like '31' and idnl like '$periode%'");
											foreach ($query as $key) {
												echo nl2br($key['neracaK']."\n");
											}
											
										}
									?>
								</td>
							</tr>
							<tr>
								<td>Laba</td>
								<td class="text-right">
									<?php echo $totalfix; ?>
								</td>
							</tr>
							<tr>
								<td>Prive</td>
								<td class="text-right">
									<?php
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select neracaD from neracalajur where noRef like '32' and idnl like '$periode%'");
											if(mysqli_num_rows($query)>0){
												foreach ($query as $key) {
													$prive=$key['neracaD'];
													echo nl2br("(".$prive.")"."\n");
												}
											} else{
												$prive=0;
												echo $prive;
											}
										}
									?>
								</td>
							</tr>
							<tr>
								<td>Modal</td>
								<td class="text-right">
									<?php
										$modalakhir=0;			
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select neracaK from neracalajur where noRef like '31' and idnl like '$periode%'");
											foreach ($query as $key) {
												$modalakhir= $key['neracaK']+$totalfix;
											}
											$modalakhirfix=$modalakhir-$prive;
											echo $modalakhirfix;
											
										}
									?>
								</td>
							</tr>
						</table><br>
					</div>
				</div>
				<h4>Neraca</h4>
				<br>
				<div class="neraca">
					<div class="row">
						<div class="col-sm-6 table-responsive">
							<table class="table table-sm">
								<thead class="table-active">
									<tr>
										<th colspan="3">Aktiva</th>
									</tr>
								</thead>
									<tr>
										<th colspan="3">Aktiva Lancar</th>
									</tr>
								<tr>
									<td>
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['ketref']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaK']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaD']."\n");
												}
											}
										?>
									</td>
								</tr>
								<tr>
									<th colspan="3">Aktiva Tetap</th>
								</tr>
								<tr>
									<td>
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['ketref']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where (ketref.golAkun='Aktiva_Tetap' and ketref.noRef='15') and idnl like '$periode%'");
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {

												$query2=mysqli_query($con,"select * from transaksi where noRef=19 and tanggal like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaSaldoD']."\n");
												}
												foreach ($query2 as $key) {
													echo nl2br($key['kredit']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where (ketref.golAkun='Aktiva_Tetap' and ketref.noRef='15') and idnl like '$periode%'");
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query2=mysqli_query($con,"select * from transaksi where noRef=19 and tanggal like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaSaldoK']."\n");
												}
												foreach ($query2 as $key) {
													echo nl2br($key['debet']."\n");
												}
											}
										?>
									</td>
								</tr>
								<tr class="text-right">
									<td></td>
									<td>
										<?php
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$saldo=0;
												$query1 = mysqli_query($con,"select sum(neracaK), sum(neracaD) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap' and idnl like '$periode%'");
												$query2 = mysqli_query($con,"select sum(neracaK), sum(neracaD) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar' and idnl like '$periode%'");

												foreach ($query1 as $key) {
													$saldo=$key['sum(neracaD)']-$key['sum(neracaK)'];
												} 
												foreach ($query2 as $key) {
													$saldo=($key['sum(neracaD)']-$key['sum(neracaK)'])+$saldo;
												}
											}
											if($saldo<0){
												echo substr($saldo,1);
											}
										?>
									</td>
									<td>
										<?php 
											if($saldo>0){
												echo $saldo;
											}
										?>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-sm-6 table-responsive">
							<table class="table table-sm">
								<thead class="table-active">
									<tr>
										<th colspan="3">Pasiva</th>
									</tr>
								</thead>
								<tr>
									<th colspan="3">Hutang</th>
								</tr>
								<tr>
									<td>
										Hutang
									</td>
									<td class="text-right">
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaK']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaD']."\n");
												}
											}
										?>
									</td>
								</tr>
								<tr>
									<th colspan="3">Modal</th>
								</tr>
								<tr>
									<td>
										Modal
									</td>
									<td class="text-right">
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Modal' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaK']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Modal' and idnl like '$periode%'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaD']."\n");
												}
											}
										?>
									</td>
								</tr>

								<tr class="text-right">
									<td></td>
									<td>
										<?php 
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select sum(neracaK) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where (ketref.golAkun='Kewajiban' or golAkun='modal') and idnl like '$periode%'");
												foreach ($query1 as $key) {
													if($key['sum(neracaK)']>0){
														echo $key['sum(neracaK)'];
													}
												}
											}
										?>
									</td>
									<td>
										<?php
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select sum(neracaK) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where (ketref.golAkun='Kewajiban' or golAkun='modal') and idnl like '$periode%'");
												foreach ($query1 as $key) {
													if($key['sum(neracaK)']<0){
														echo substr($key['sum(neracaK)'],1);
													}
												}
											}
										?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>