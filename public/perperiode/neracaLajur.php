<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Neraca Lajur</i></strong></h5>
			<hr>
			<div class="container-fluid table-responsive">
				<table border="1" class="table table-sm">
					<thead class="thead-dark text-center">
					<tr>
						<th rowspan="2" class="align-middle">No Prak</th>
						<th rowspan="2" class="align-middle">Perkiraan</th>
						<th colspan="2">Neraca Saldo</th>
						<th colspan="2">Penyesuaian</th>
						<th colspan="2">Neraca Saldo Setelah Penyesuaian</th>
						<th colspan="2">Rugi Laba</th>
						<th colspan="2">Neraca</th>
					</tr>
					<tr>
						<?php 
							for($i=0;$i<5;$i++){
								echo "<th>Debet</th><th>Kredit</th>";
							} 
						?>
					</tr>
					</thead>
                    <?php 
                    $periode=$_POST['periode'];
					$con = mysqli_connect("localhost","root","","akutansiAuto");
			        if (mysqli_connect_errno()){
			            echo "Koneksi database gagal : " . mysqli_connect_error();
			        } else {
			        $query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where idnl like '$periode%' order by neracalajur.noRef ");
					if(mysqli_num_rows($query)>0){
						while ($data=mysqli_fetch_array($query)) { ?>
							<tr>
								<td class="text-center"><?php echo $data['noRef']; ?></td>
								<td><?php echo $data['ketref']; ?></td>
								<td class="text-right"><?php echo $data['neracaSaldoD']; ?></td>
								<td class="text-right"><?php echo $data["neracaSaldoK"]; ?></td>
								<td class="text-right"><?php echo $data["penyesuaianD"]; ?></td>
								<td class="text-right"><?php echo $data["penyesuaianK"]; ?></td>
								<td class="text-right"><?php echo $data["neracaSaldoSetelahD"]; ?></td>
								<td class="text-right"><?php echo $data["neracaSaldoSetelahK"]; ?></td>
								<td class="text-right"><?php echo $data["rugiLabaD"]; ?></td>
								<td class="text-right"><?php echo $data["rugiLabaK"]; ?></td>
								<td class="text-right"><?php echo $data["neracaD"]; ?></td>
								<td class="text-right"><?php echo $data["neracaK"]; ?></td>
							</tr>
							<?php
							}
						} 
					}
					?>
					<?php 
				        if (mysqli_connect_errno()){
				            echo "Koneksi database gagal : " . mysqli_connect_error();
				        } else {
				            $query1 =mysqli_query($con,"select sum(rugiLabaD), sum(rugiLabaK), sum(neracaD), sum(neracaK) from neracalajur where idnl like '$periode%'"); 
				            if(mysqli_num_rows($query1)>0){
				                foreach ($query1 as $data1) { ?>
								<tr>
									<td colspan="8"></td>
									<td class="text-right"><?php echo $data1['sum(rugiLabaD)']?></td>
									<td class="text-right"><?php echo $data1['sum(rugiLabaK)']?></td>
									<td class="text-right"><?php echo $data1['sum(neracaD)']?></td>
									<td class="text-right"><?php echo $data1['sum(neracaK)']?></td>
								</tr>
								<?php 
									$untungRugi=$data1['sum(rugiLabaD)']-$data1['sum(rugiLabaK)'];
									$untungRugi1=$data1['sum(neracaD)']-$data1['sum(neracaK)'];
								?>
								<tr>
									<td colspan="8"></td>
									<td class="text-right">
										<?php 
											if($untungRugi<0){
												echo substr($untungRugi, 1);
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi>0){
												echo $untungRugi;
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi1<0){
												echo $untungRugi1;
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi1>0){
												echo substr($untungRugi, 1);
											}
										?>
									</td>
								</tr>
								<?php 
									$untungRugi=$data1['sum(rugiLabaD)']-$data1['sum(rugiLabaK)'];
									$untungRugi1=$data1['sum(neracaD)']-$data1['sum(neracaK)'];
								?>
								<tr>
									<td colspan="8"></td>
									<td class="text-right">
										<?php 
											if($untungRugi<0){
												echo $data1['sum(rugiLabaD)']+substr($untungRugi,1);
											} else{
												echo $data1['sum(rugiLabaD)'];
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi>0){
												echo $data1['sum(rugiLabaK)']+$untungRugi;
											} else{
												echo $data1['sum(rugiLabaK)'];
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi1<0){
												echo $data1['sum(neracaD)']-substr($untungRugi1, 1);
											} else{
												echo $data1['sum(neracaD)'];
											}
										?>
									</td>
									<td class="text-right">
										<?php 
											if($untungRugi1>0){
												echo $data1['sum(neracaK)']+$untungRugi1;
											} else{
												echo $data1['sum(neracaK)'];
											}
										?>
									</td>
								</tr>


				              <?php }
				          }
				      }
					?>
                </table>
				<i>*Apabila Neraca Lajur Kosong, Generatelah Telebih Dahulu Data Yang Dimasukkan Di Sub Menu Neraca Lajur</i>
				<a href="../../src/controller.php?aksi=hapusNL&kd=<?php echo $periode ?>"> <button type="button" class="btn btn-danger float-right">HAPUS NERACA LAJUR INI</button></a>
			</div>
		</div>
	</div>
</body>
</html>