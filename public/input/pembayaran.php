<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<h5 class="ml-2 mt-2"><strong><i>&nbsp<span class="fa fa-pencil-square-o"></span> Input Transaksi Pembayaran</i></strong></h5>
			<hr>
			<div class="container-fluid">
				<form action="../../src/controller.php" method="POST" class="jp">
				<input type="hidden" name="kdtransaksi">
				<input type="hidden" name="status" value="bayar">
					<table>
						<tr>
							<td>Tanggal</td>
							<td class="text-right"><input type="date" name="tanggal"></td>
						</tr>
						<tr>
							<td>Guna Pembayaran</td>
							<td class="text-right">
								<select name="jenis" onchange="pilihBayar(this);">
									<option selected>Pilih</option>
									<option value="bayarSewa">Sewa</option>
									<option value="bayarHutang">Hutang/Angsuran</option>
									<option value="bayarGaji">Gaji</option>
									<option value="bayarBeban">Beban</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td> 
								<div class="row">
									<input type="checkbox" style="width: 10px" class="beban" onclick="subBeban(0)" name="subBeban[]" value="0">
									<label class="beban">Listrik</label>
									<input type="number" name="b0" class="beban1">
								</div>
								<div class="row ">
									<input type="checkbox" style="width: 10px" class="beban" onclick="subBeban(1)" name="subBeban[]" value="1">
									<label class="beban">Telepon</label>
									<input type="number" name="b1" class="beban1">
								</div>
								<div class="row ">
									<input type="checkbox" style="width: 10px" class="beban" onclick="subBeban(2)" name="subBeban[]" value="2">
									<label class="beban">Sewa</label>
									<input type="number" name="b2" class="beban1">
								</div>
								<div class="row ">
									<input type="checkbox" style="width: 10px" class="beban" onclick="subBeban(3)" name="subBeban[]" value="3">
									<label class="beban">Air</label>
									<input type="number" name="b3" class="beban1">
								</div>
								<div class="row ">
									<input type="checkbox" style="width: 10px" class="beban" onclick="subBeban(4)" name="subBeban[]" value="4">
									<label class="beban">Rupa-Rupa</label>
									<input type="number" name="b4" class="beban1">
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Jumlah</label> </td>
							<td class="text-right"><label>Rp.</label><input type="number" name="jumlah" value="0" class="text-right"></td>
						</tr>
						<tr>
							<td><label>Untuk pembayaran selama</label></td>
							<td class="text-right"><input type="number" name="periodeBayar" value="1" class="text-right"> </td>
							<td><label >&nbsp Bulan</label></td>
						</tr>
						<tr>
							<td><label >Keterangan</label></td>
							<td class="text-right"><input type="text" name="keterangan" colspan="2"></td>
						</tr>
						<tr>
							<td></td>
							<td class="text-right"><input type="submit" value="Input"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
