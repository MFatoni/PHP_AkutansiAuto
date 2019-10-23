<?php include('../includes/templateAkutansi.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Laporan</i></strong></h5>
			<hr>
			<div class="container-fluid">
				<div class="row">
					<div class="col-6">
						<h4>Laporan Laba Rugi</h4><br>
						<table class="table table-sm">
							<tr>
								<td colspan="3">Pendapatan</td>
								<td>
									<?php
										$pD=0;
										$pK=0;
										$con = mysqli_connect("localhost","root","","akutansiAuto");
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where golAkun='Pendapatan'");
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
											$query = mysqli_query($con,"select distinct ketref from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where ketref.noRef like '5%' order by ketref.noRef");
											foreach ($query as $key) {
												echo nl2br($key['ketref']."\n"); 
											}
										}
									?>
								</td>
								<td>
									<?php
										
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select rugiLabaD from neracalajur where noRef like '5%' order by noRef");
											foreach ($query as $key) {
												echo nl2br($key['rugiLabaD']."\n");
											}
											
										}
									?>
								</td>
								<td>0</td>
							</tr>
							<tr>
								<td colspan="3">Total</td>
								<td>
									<?php
										$totalfix=0;
										$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where golAkun='Pendapatan' or golAkun='Beban'");
											foreach ($query as $key) {
												$total=$key['rugiLabaK']-$key['rugiLabaD'];
												$totalfix=$totalfix+$total;
											}echo $totalfix;
									?>
								</td>
							</tr>
						</table>
					</div>
					<div class="col-6">
						<h4>Perubahan Modal</h4><br>
						<table class="table table-sm">
							<tr>
								<td>Modal</td>
								<td class="text-right">
									<?php
										
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select neracaK from neracalajur where noRef like '31'");
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
								<td>Modal</td>
								<td class="text-right">
									<?php
										$modalakhir=0;
										
										if (mysqli_connect_errno()){
											echo "Koneksi database gagal : " . mysqli_connect_error();
										} else {
											$query = mysqli_query($con,"select neracaK from neracalajur where noRef like '31'");
											foreach ($query as $key) {
												$modalakhir= $key['neracaK']+$totalfix;
												echo $modalakhir;
											}
											
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
						<div class="col-6 ">
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar'");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar'");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar'");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap'");
												foreach ($query1 as $key) {
													echo nl2br($key['ketref']."\n");
												}
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											
											$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap' and ketref.noRef='15'");
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {

												$query2=mysqli_query($con,"select * from transaksi where noRef=19");
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
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap'");
												foreach ($query1 as $key) {
													echo nl2br($key['neracaK']."\n");
												}
											}
										?>
									</td>
								</tr>
								<tr class="text-right">
									<td></td>
									<td></td>
									<td>
										<?php 
											
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$saldo=0;
												$query1 = mysqli_query($con,"select sum(neracaK), sum(neracaD) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Tetap'");
												$query2 = mysqli_query($con,"select sum(neracaK), sum(neracaD) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Aktiva_Lancar'");

												foreach ($query1 as $key) {
													$saldo=$key['sum(neracaD)']-$key['sum(neracaK)'];
												} 
												foreach ($query2 as $key) {
													$saldo=($key['sum(neracaD)']-$key['sum(neracaK)'])+$saldo;
												}
												echo $saldo;
											}
										?>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-6">
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban' ");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban'");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Modal' ");
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
												$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Modal'");
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
												$query1 = mysqli_query($con,"select sum(neracaK) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban' or golAkun='modal'");
												foreach ($query1 as $key) {
													echo nl2br($key['sum(neracaK)']."\n");
												}
											}
										?>
									</td>
									<td>
										<?php 
											if (mysqli_connect_errno()){
												echo "Koneksi database gagal : " . mysqli_connect_error();
											} else {
												$query1 = mysqli_query($con,"select sum(neracaD) from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban' or golAkun='modal'");
												foreach ($query1 as $key) {
													echo nl2br($key['sum(neracaD)']."\n");
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