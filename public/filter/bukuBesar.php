<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Buku Besar</i></strong></h5>
            <hr>
            <?php
            $con = mysqli_connect("localhost","root","","akutansiauto");
            if (mysqli_connect_errno()){
                echo "Koneksi database gagal : " . mysqli_connect_error();
            } else {
            $param='';
            $keep=array();
            $query = mysqli_query($con,"select distinct(tanggal) from transaksi ");
                foreach($query as $key){
                    if(substr($key['tanggal'],0,7)!=$param){
                        $param=substr($key['tanggal'],0,7);
                        array_push($keep,$param);
                    }
                }
            }

            ?>
			<div class="container-fluid">
				<form action="../perperiode/bukuBesar.php" method="POST">
                <table class="table">
                    <tr>
                        <td>Pilih Periode</td>
                        <td >
                            <select name="periode" class="form-control">
                            <option value="" selected></option>
                            <?php
                                foreach($keep as $key){ ?>
                                    <option value="<?php echo $key; ?>" ><?php 
                                            if(substr($key,5,2)=='01'){
                                                echo "Januari - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='02'){
                                                echo "Februari - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='03'){
                                                echo "Maret - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='04'){
                                                echo "April - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='05'){
                                                echo "Mei - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='06'){
                                                echo "Juni - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='07'){
                                                echo "Juli - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='08'){
                                                echo "Agustus - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='09'){
                                                echo "September - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='10'){
                                                echo "Oktober - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='11'){
                                                echo "November - ".substr($key,0,4);
                                            } else if(substr($key,5,2)=='12'){
                                                echo "Desember - ".substr($key,0,4);
                                            } else{
                                                echo "Input Transaksi Terlebih Dahulu";
                                            }
                                        ?></option>
                                <?php } 
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><input type="submit" value="Tampilkan" class="btn"> </td>
                    </tr>
                </table>
                </form>
                <i>*Apabila Buku Besar Kosong, Isilah Telebih Dahulu Data Jurnal Umum Melalui Menu Input Transaksi</i>
			</div>
		</div>
	</div>
</body>
</html>