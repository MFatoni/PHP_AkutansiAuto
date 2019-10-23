<?php include('includes/template.php'); ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-home"></span> Beranda</i></strong></h5>
			<hr>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<?php
							$con = mysqli_connect("localhost","root","","akutansiAuto");
							$rL=array();
							$periodeRL=array();
							$totalfix=0;
							$query = mysqli_query($con,"select*from neracalajur inner join ketref on ketref.noRef = neracalajur.noRef where (golAkun='Pendapatan' or golAkun='Beban') order by idnl");
							$query1 = mysqli_query($con,"select distinct(idnl) from neracalajur order by idnl");
								foreach ($query1 as $key1) {
									foreach($query as $key){
										if($key['idnl']=$key1['idnl']){
											$total=$key['rugiLabaK']-$key['rugiLabaD'];
											$totalfix=$totalfix+$total;
										}
									}
									array_push($rL,$totalfix);
									array_push($periodeRL,$key1['idnl']);
								}
						?>
			            <h4 class="text-center">Laba Rugi</h4><br>
			            <div class="row">
			            <canvas id="myChart"></canvas>
			            <script>
			            var ctx = document.getElementById("myChart").getContext('2d');
			            var myChart = new Chart(ctx, {
			                type: 'bar',
			                data: {
			                    labels: ["Start", 
								<?php 
									foreach($periodeRL as $key){ ?>
										" <?php echo $key; ?> ",
									<?php } 
								?>
								],
			                    datasets: [
			                        {data: [0,<?php foreach($rL as $key1){ echo "$key1".',';} ?>],
			                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
			                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
			                        borderWidth: 1}]
			                },
			                options: {
			                	scales: {yAxes: [{ticks: {beginAtZero:true}}]},
			                	legend: {
						            display: false
						        },
			                }
			            });
			            </script>
			            </div>
					</div>

					<div class="col-lg-6">
						<?php 
							$con = mysqli_connect("localhost","root","","akutansiAuto");
							$a=0;
							$b=0;
							if (mysqli_connect_errno()){
								echo "Koneksi database gagal : " . mysqli_connect_error();
							} else {
								$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Kewajiban'");
								foreach ($query1 as $key) {
									$a=$key['neracaK']-$key['neracaD'];
								}
							}
								if (mysqli_connect_errno()){
									echo "Koneksi database gagal : " . mysqli_connect_error();
								} else {
									$query1 = mysqli_query($con,"select * from neracalajur inner join ketref on neracalajur.noRef=ketref.noRef where ketref.golAkun='Modal'");
									foreach ($query1 as $key) {
										$b=$key['neracaK']-$key['neracaD'];
									}
							}
						?>
						<h4 class="text-center">Harta</h4><br>
			            <div class="row">
			            <canvas id="myChart1"></canvas>
			            <script>
			            var ctx = document.getElementById("myChart1").getContext('2d');
			            var myChart = new Chart(ctx, {
			                type: 'pie',
			                data: {
			                    labels: ["Hutang", "Modal"],
			                    datasets: [
			                        {data: [<?php echo $a; ?>,<?php echo $b; ?>],
			                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'],
			                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)'],
			                        }]
			                },
			                options: {
			                	legend: {
						            onClick: false
						        },
			                }
			            });
			            </script>
				        </div>
					</div>
				</div><br>
			</div>
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-refresh"></span> Akses Cepat</i></strong></h5>
			<hr>
			<div class="container-fluid" >
				<i>* Website ini telah memiliki data yang telah dimasukkan untuk melihat semua tampilan website. 
				Untuk masukkan data dari awal tekan lah tombol reset Jurnal Umum &amp Neraca Lajur untuk menghapus data tersebut.</i><br><br>
				<a href="src/controller.php?aksi=resetJU" class="ml-2"><button class="btn btn-danger btn-sm">RESET JURNAL UMUM</button></a>
				<a href="src/controller.php?aksi=resetNL" class="ml-2"><button class="btn btn-danger btn-sm">RESET NERACALAJUR</button></a>
			</div><br>
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-check-square-o"></span> Anggota Kelompok</i></strong></h5>
			<hr>
			<div class="container-fluid">
    			<i> * Mohammad Fatoni</i><br>
    			<i> * Fauzia Rahma Cahyarini</i><br>
    			<i> * Braike Rema Alfian</i><br>
    			<i> * Arya Pasha Gunawan</i><br>
			</div>
		</div>
	</div>
</body>
</html>