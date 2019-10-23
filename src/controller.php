<?php
	class Controller{
		public function inputBayar(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisBayar=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$periodeBayar=$_POST['periodeBayar'];
			$perbulan=$jumlah / $periodeBayar;
			$kd=$periodeBayar.'-bln-pK'.$perbulan;
			if($periodeBayar>0 and $periodeBayar<10){
				$kd='0'.$periodeBayar.'-bln-pK-'.$perbulan;
			}
			$keterangan=$_POST['keterangan'];
			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				if($jenisBayar=='bayarSewa'){
		            if(empty($tanggal) or empty($jumlah) or empty($periodeBayar)){
		                echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
		            else{
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$kd','$tanggal','14','$jumlah','0','$keterangan')");
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
	                echo "<script>alert('Berhasil');history.go(-2);</script>";}
		        } elseif ($jenisBayar=='bayarHutang') {
		            if(empty($tanggal) or empty($jumlah) or empty($periodeBayar)){
		                echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
		            else{
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','21','$jumlah','0','$keterangan')");
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
		                echo "<script>alert('Berhasil');history.go(-2);</script>";}
			    } elseif ($jenisBayar=='bayarGaji') {
					if(empty($tanggal) or empty($jumlah) or empty($periodeBayar)){
		                echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
		            else{
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','52','$jumlah','0','$keterangan')");
		                mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
		                echo "<script>alert('Berhasil');history.go(-2);</script>";}
				} elseif ($jenisBayar=='bayarBeban') {
					if (empty($_POST['subBeban']) or empty($tanggal) or empty($jumlah) or empty($periodeBayar)) {
		                echo "<script>alert('Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
					} 
					else{
						$subBeban=$_POST['subBeban'];
						foreach ($subBeban as $key ) {
							if ($key==0) {
								$listrik=$_POST['b0'];
								mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','54','$listrik','0','$keterangan')");
							} else if ($key==1) {
								$telepon=$_POST['b1'];
								mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','55','$telepon','0','$keterangan')");
							} else if ($key==2) {
								$sewa=$_POST['b2'];
								mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','53','$sewa','0','$keterangan')");
							} else if ($key==3) {
								$air=$_POST['b3'];
								mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','56','$air','0','$keterangan')");
							} else if ($key==4) {
								$rupa=$_POST['b4'];
								mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','58','$rupa','0','$keterangan')");
							}
						}
						mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$periodeBayar','$tanggal','11','0','$jumlah','$keterangan')");
		                echo "<script>alert('Berhasil');history.go(-2);</script>";
					}
				} else {
					 echo "<script>alert('Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
				}
		    }
		}
		public function inputBeli(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisBeli=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];
			$cashKredit=$_POST['cashKredit'];
			$totalHarga=$_POST['totalHarga'];
			$uangMuka=$_POST['uangMuka'];
			$hutang=$totalHarga-$uangMuka;

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if(empty($tanggal) or empty($jenisBeli) or empty($cashKredit)){   
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		if ($jenisBeli=="peralatan") {
	        			if ($cashKredit=='cash') {
	        				if(empty($jumlah)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','15','$jumlah','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
	        			} elseif ($cashKredit=='kredit') {
	        				if(empty($totalHarga)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				if ($uangMuka==0) {
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$uangMuka','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','21','0','$hutang','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        				}
		        				else {
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','15','$totalHarga','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$uangMuka','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','21','0','$hutang','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
		        			}
	        			}
	        		} else if ($jenisBeli=="perlengkapan") {
	        			if ($cashKredit=='cash') {
	        				if(empty($jumlah)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','13','$jumlah','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
	        			} elseif ($cashKredit=='kredit') {
	        				if(empty($totalHarga)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				if ($uangMuka==0) {
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$uangMuka','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','21','0','$hutang','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        				}
		        				else{
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','13','$totalHarga','0','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$uangMuka','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','21','0','$hutang','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        				}
		        			}
	        			}
	        		}
	        	}

        	}
		}
		public function inputTambah(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisTambah=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if (empty($tanggal) or empty($jenisTambah) or empty($jumlah)) {
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		if($jenisTambah=='modal'){
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','31','0','$jumlah','$keterangan')");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
	        		} else if ($jenisTambah=='hutang') {
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','21','0','$jumlah','$keterangan')");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
	        		}
	        	}
	        }
		}
		public function inputTerima(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisTerima=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if (empty($tanggal) or empty($jenisTerima) or empty($jumlah)) {
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		if($jenisTerima=='pendapatan'){
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','41','0','$jumlah','$keterangan')");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        	}
		        }
			}
		}
		public function inputAmbil(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisAmbil=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if (empty($tanggal) or empty($jenisAmbil) or empty($jumlah)) {
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		if($jenisAmbil=='modal'){
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','32','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','0','$jumlah','$keterangan')");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        	}
		        }
			}
		}
		public function inputJual(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisJual=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];
			$cashKredit=$_POST['cashKredit'];
			$totalHarga=$_POST['totalHarga'];
			$uangMuka=$_POST['uangMuka'];
			$piutang=$totalHarga-$uangMuka;

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if(empty($tanggal) or empty($jenisJual) or empty($cashKredit)){   
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		if ($jenisJual=="peralatan") {
	        			if ($cashKredit=='cash') {
	        				if(empty($jumlah)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$jumlah','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','15','0','$jumlah','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
	        			} elseif ($cashKredit=='kredit') {
	        				if(empty($totalHarga)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				if ($uangMuka==0) {
	        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','12','$piutang','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','15','0','$totalHarga','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
		        				else {
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$uangMuka','0','$keterangan')");
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','12','$piutang','0','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','15','0','$totalHarga','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";

		        				}
	        				}
		        						        				
	        			}
	        		} else if ($jenisJual=="perlengkapan") {
	        			if ($cashKredit=='cash') {
	        				if(empty($jumlah)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$jumlah','0','$keterangan')");
		        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','13','0','$jumlah','$keterangan')");
		        				echo "<script>alert('Berhasil');history.go(-2);</script>";}
	        			} elseif ($cashKredit=='kredit') {
	        				if(empty($totalHarga)){
	        				echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		        			}else {
		        				if ($uangMuka==0) {
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','12','$piutang','0','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','13','0','$totalHarga','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        				} else{
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','11','$uangMuka','0','$keterangan')");
		        					mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','12','$piutang','0','$keterangan')");
			        				mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','13','0','$totalHarga','$keterangan')");
			        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        				}
	        				}
	        			}
	        		}
	        	}

        	}
		}
		public function inputSusut(){
			$date=$_POST['tanggal'];
			$tanggal=date("Y-m-d",strtotime($date));
			$jenisSusut=$_POST['jenis'];
			$jumlah=$_POST['jumlah'];
			$keterangan=$_POST['keterangan'];
			$kdBeban='00-bln-pD-'.$jumlah;

			$con = mysqli_connect("localhost","root","","akutansiAuto");
			$query=mysqli_query($con,"select max(kdTransaksi) from transaksi");
        	foreach ($query as $key) {
                if (empty($key['max(kdTransaksi)'])) {
                    $kdTransaksi=1;
                } else {
                    $kdTransaksi=$key['max(kdTransaksi)'];
                    $kdTransaksi++;
                }
            }
            if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
	        	if (empty($tanggal) or empty($jenisSusut) or empty($jumlah)) {
	        		echo "<script>alert('Gagal di tambahkan! Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";}
	        	else{
	        		$query1=mysqli_query($con,"select distinct(kdKhusus) from transaksi where noRef=15");
	        		foreach ($query1 as $key) {
	        			$update=substr($key['kdKhusus'], 10);
	        		}
	        		if ($update=='') {
	        			$fixkd='00-bln-pK-'.$jumlah;
	        		} else{
	        			$sum=$update+$jumlah;
		        		$fixkd='00-bln-pK-'.$sum;
	        		}
	        		
	        		if($jenisSusut=='perlengkapan'){
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$kdBeban','$tanggal','57','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','19','0','$jumlah','$keterangan')");
	        			mysqli_query($con,"update transaksi set kdKhusus='$fixkd' where noRef=13");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        	} else if($jenisSusut=='peralatan'){
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','$kdBeban','$tanggal','57','$jumlah','0','$keterangan')");
	        			mysqli_query($con,"insert into transaksi values ('','$kdTransaksi','','$tanggal','19','0','$jumlah','$keterangan')");
	        			mysqli_query($con,"update transaksi set kdKhusus='$fixkd' where noRef=15");
        				echo "<script>alert('Berhasil');history.go(-2);</script>";
		        	}
		        }
			}
		}
		public function inputNeracaLajur(){
	        $con = mysqli_connect("localhost","root","","akutansiAuto");
	        if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				$periodeNL=$_POST['periodeNL'];
				$counter=0;
				$query1 =mysqli_query($con,"select *from transaksi inner join ketref on ketref.noRef = transaksi.noRef where tanggal like '$periodeNL%' group by ketref order by transaksi.noRef "); 
				$query2=mysqli_query($con,"select distinct(idnl) from neracalajur");
				foreach($query2 as $key){
					if($periodeNL==$key['idnl']){
						$counter++;
					}
				}
				if($counter<1){
					if(mysqli_num_rows($query1)>0){
						foreach ($query1 as $data1) {
							$noRef=$_POST["no".$data1["noRef"]];
							$neracaSD=$_POST["neracaSD".$data1["noRef"]];
							$neracaSK=$_POST["neracaSK".$data1["noRef"]];
							$penyesuaianD=$_POST["penyesuaianD".$data1["noRef"]];
							$penyesuaianK=$_POST["penyesuaianK".$data1["noRef"]];
							$neracaSPD=$_POST["neracaSPD".$data1["noRef"]];
							$neracaSPK=$_POST["neracaSPK".$data1["noRef"]];
							$rugiLabaD=$_POST["rugiLabaD".$data1["noRef"]];
							$rugiLabaK=$_POST["rugiLabaK".$data1["noRef"]];
							$neracaD=$_POST["neracaD".$data1["noRef"]];
							$neracaK=$_POST["neracaK".$data1["noRef"]];
							
							// echo nl2br(" ".$noRef." ".$neracaSD." ".$neracaSK." ".$penyesuaianD." ".$penyesuaianK." ".$neracaSPD." ".$neracaSPK." ".$rugiLabaD." ".$rugiLabaD." ".$neracaD." ".$neracaK."\n");
							mysqli_query($con,"insert into neracalajur values ('$periodeNL',$noRef,$neracaSD,$neracaSK,$penyesuaianD,$penyesuaianK,$neracaSPD,$neracaSPK,$rugiLabaD,$rugiLabaK,$neracaD,$neracaK)");
						}
					}
					$tambah=$_POST['tambah'];
					if(!empty($tambah)){
						mysqli_query($con,"insert into neracalajur values ('$periodeNL',$tambah[0],$tambah[1],$tambah[2],$tambah[3],$tambah[4],$tambah[5],$tambah[6],$tambah[7],$tambah[8],$tambah[9],$tambah[10])");
					}
					echo "<script>alert('Berhasil');history.go(-2);</script>";
				} else {
					echo "<script>alert('Neraca Lajur Pada Bulan Tersebut Telah Ada Di Database, Hapus Terlebih Dahulu Neraca Lajur Sebelumnya Untuk Input Data Pada Bulan Yang Sama');history.go(-2);</script>";
				}
	        }
	    }
	}
	class Action{
		public function aksiHapus($x){
			$con = mysqli_connect("localhost","root","","akutansiAuto");
	        if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				mysqli_query($con,"delete from transaksi where no='$x'");
				header('Location:../public/jurnalUmum.php');
			}
		}
		public function aksiHapusNL($x){
			$con = mysqli_connect("localhost","root","","akutansiAuto");
	        if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				mysqli_query($con,"delete from neracalajur where idnl like '$x';");
				header('Location:../public/filter/generateNeracaLajur.php');
			}
		}
		public function resetJU(){
			$con = mysqli_connect("localhost","root","","akutansiAuto");
	        if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				mysqli_query($con,"delete from transaksi");
				header('Location:../');
			}
		}
		public function resetNL(){
			$con = mysqli_connect("localhost","root","","akutansiAuto");
	        if (mysqli_connect_errno()){
	            echo "Koneksi database gagal : " . mysqli_connect_error();
	        } else {
				mysqli_query($con,"delete from neracalajur");
				header('Location:../');
			}
		}
	}

$user= new Controller;
$aksi= new Action;
if(isset($_POST['status'])){
    if ($_POST['status']=='bayar'){
        $user->inputBayar();}
    else if ($_POST['status']=='beli'){
        $user->inputBeli();}
    else if ($_POST['status']=='tambah'){
        $user->inputTambah();}
    else if ($_POST['status']=='terima'){
        $user->inputTerima();}
    else if ($_POST['status']=='ambil'){
        $user->inputAmbil();}
    else if ($_POST['status']=='jual'){
        $user->inputjual();}
    else if ($_POST['status']=='susut'){
        $user->inputsusut();}
    else if ($_POST['status']=='inputNeracaLajur'){
        $user->inputNeracaLajur();}
    else{
        $user->index();}
} else if(isset($_GET['aksi'])){
	if($_GET['aksi']=='hapus'){
		$aksi->aksiHapus($_GET['kd']);
	} else if($_GET['aksi']=='hapusNL'){
		$aksi->aksiHapusNL($_GET['kd']);
	} else if($_GET['aksi']=='resetJU'){
		$aksi->resetJU();
	} else if($_GET['aksi']=='resetNL'){
		$aksi->resetNL();
	}
}
else {
    echo 'Forbidden Access';}
?>