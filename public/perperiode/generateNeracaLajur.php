<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
            <h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Generate Jurnal Umum</i></strong></h5>
			<hr>
			<div class="container-fluid ">
				<?php
                    $periode=$_POST['periode'];
					$save=array();
					$saveRL=array();
					$saveN=array();
					$con = mysqli_connect("localhost","root","","akutansiAuto");
			        if (mysqli_connect_errno()){
			            echo "Koneksi database gagal : " . mysqli_connect_error();
			        } else {
			        $query = mysqli_query($con,"select *from transaksi inner join ketref on ketref.noRef = transaksi.noRef  where tanggal like '$periode%' order by transaksi.noRef");
			        $query1 =mysqli_query($con,"select *from transaksi inner join ketref on ketref.noRef = transaksi.noRef where tanggal like '$periode%' group by ketref order by transaksi.noRef");
					if(mysqli_num_rows($query1)>0){
						while ($data2=mysqli_fetch_array($query1)) {
							$saldo=0;
				            $saldoRL=0;
				            $saldoN=0;
							foreach ($query as $data) { 
								if ($data['noRef']==$data2['noRef']) { 
									$d=$data["debet"];
									$k=$data["kredit"];
									if ($data['noRef']!=19) {
										if ($d!=0) {
											// echo "noRef".$data2['noRef'];
											// echo "sebelum".$saldo;
											$saldo=$saldo+$d;
											// echo "setelah".$saldo;
											// echo nl2br("\n");
											if (substr($data['noRef'], 0,1)==4 or substr($data['noRef'], 0,1)==5) {
					                            $saldoRL=$saldoRL+$d;
					                        } else {
					                            $saldoN=$saldoN+$d;
					                        }
										} else {
											// echo "noRef".$data2['noRef'];
											// echo "sebelum".$saldo;
											$saldo=$saldo-$k;
											// echo "setelah".$saldo;
											// echo nl2br("\n");
											if (substr($data['noRef'], 0,1)==4 or substr($data['noRef'], 0,1)==5) {
					                            $saldoRL=$saldoRL-$k;
					                        } else {
					                            $saldoN=$saldoN-$k;
					                        }
										}
									}
									else {
										$saldo=0;
							            $saldoRL=0;
							            $saldoN=0;
									}	
								}
                            }
                            if ($data2['noRef']==57){
                                array_push($save, 0);
                                array_push($saveRL, 0);
                            } else {
                                array_push($save, $saldo);
                                array_push($saveRL, $saldoRL);
                            }
				            array_push($saveN, $saldoN);
						}
					}
					$no=0;
                    $tambah=array();

					$no=0;
					if(mysqli_num_rows($query1)>0){?>
                        <form action="../../src/controller.php" method="POST">
                            <?php
                            foreach ($query1 as $data1) { 
                            	if($data1["noRef"]==14){
									if(substr($data1['kdKhusus'],0,2)>1){
										$jum=$save[$no] / substr($data1['kdKhusus'],0,2);
										array_push($tambah, '53','0','0',$jum,'0',$jum,'0',$jum,'0','0','0');
									}
								}
                            	?>
                                <input type="hidden" name="<?php echo "no".$data1["noRef"];
                                ?>" value="<?php echo $data1["noRef"]; ?>">
                                <input type="hidden" name="<?php echo "neracaSD".$data1["noRef"]; ?>" value="<?php
                                    if ($save[$no]>0) {
                                        echo $save[$no];
                                    } else {
                                        echo '0';
                                    }
                                ?>">
                                <input type="hidden" name="<?php echo "neracaSK".$data1["noRef"]; ?>" value="<?php
                                    if ($save[$no]<0) {
                                        echo substr($save[$no],1);
                                    } else {
                                        echo '0';
                                    }
                                ?>">
                                <input type="hidden" name="<?php echo "penyesuaianD".$data1["noRef"]; ?>" value="<?php
										if(substr($data1['kdKhusus'],7,2)=='pD'){
											$dPenyesuaian= substr($data1['kdKhusus'],10);
											echo $dPenyesuaian;
										} else{
										$dPenyesuaian=0;
										echo $dPenyesuaian;} 
									?>">
                                <input type="hidden" name="<?php echo "penyesuaianK".$data1["noRef"]; ?>" value="<?php
										if(substr($data1['kdKhusus'],7,2)=='pK'){
											$kPenyesuaian= substr($data1['kdKhusus'],10);
											echo $kPenyesuaian;
										} else {
										$kPenyesuaian=0;
										echo $kPenyesuaian; }
									?>">
                                <input type="hidden" name="<?php echo "neracaSPD".$data1["noRef"]; ?>" value="<?php
                                    $dNSetelah=$save[$no]+$dPenyesuaian-$kPenyesuaian;
                                    if ($dNSetelah>0) {
                                        echo $dNSetelah;
                                    } else {
                                        echo '0';
                                    }  
                                ?>">
                                <input type="hidden" name="<?php echo "neracaSPK".$data1["noRef"]; ?>" value="<?php
                                    $dNSetelah=$save[$no]+$dPenyesuaian-$kPenyesuaian;
                                    if ($dNSetelah<0) {
                                        echo substr($dNSetelah, 1);
                                    } else {
                                        echo '0';
                                    }  
                                ?>">
                                <input type="hidden" name="<?php echo "rugiLabaD".$data1["noRef"]; ?>" value="<?php
                                        $dRL=$saveRL[$no]+$dPenyesuaian-$kPenyesuaian;
                                        if(substr($data1["noRef"],0,1)==4 or substr($data1["noRef"],0,1)==5){
                                            if ($dRL>0) {
                                                echo $dRL;
                                            } else {
                                                echo '0';
                                            }
                                        }  else {
                                            echo 0;
                                        }
                                    ?>">
                                <input type="hidden" name="<?php echo "rugiLabaK".$data1["noRef"]; ?>" value="<?php
                                        $kRL=$saveRL[$no]+$dPenyesuaian-$kPenyesuaian;
                                        if(substr($data1["noRef"],0,1)==4 or substr($data1["noRef"],0,1)==5){
                                            if ($kRL<0) {
                                                echo substr($kRL, 1);
                                            } else {
                                                echo '0';
                                            }  
                                        } else {
                                            echo 0;
                                        }
                                    ?>">
                                <input type="hidden" name="<?php echo "neracaD".$data1["noRef"]; ?>" value="<?php
                                        $dNeraca=$saveN[$no]+$dPenyesuaian-$kPenyesuaian;
                                        if(substr($data1["noRef"],0,1)==4 or substr($data1["noRef"],0,1)==5){
                                                echo 0;
                                        } else {
                                            if ($dNeraca>0) {
                                                echo $dNeraca;
                                            } else {
                                                echo '0';
                                        }
                                    }
                                    ?>">
                                <input type="hidden" name="<?php echo "neracaK".$data1["noRef"]; ?>" value="<?php
                                        $kNeraca=$saveN[$no]+$dPenyesuaian-$kPenyesuaian;
                                        if(substr($data1["noRef"],0,1)==4 or substr($data1["noRef"],0,1)==5){
                                                echo 0;
                                        } else {
                                            if ($kNeraca<0) {
                                                echo substr($kNeraca, 1);
                                            } else {
                                                echo '0';
                                        }  
                                    }
                                    ?>">
                            <?php
                            $no++;
                            } 
                        	foreach($tambah as $key){ ?>
                        		<input type="hidden" name="tambah[]" value="<?php echo $key ?>">
                        	<?php }
                            ?>
                            <input type="hidden" name="periodeNL" value="<?php echo $periode; ?>">
                            <input type="hidden" name="status" value="inputNeracaLajur">
                            <label>Pastikan data yang telah diinput didalam jurnal umum benar</label><br>
                            <input type="submit" value="GENERATE">
                        </form>
                        <?php
                    }
			    }
				?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>