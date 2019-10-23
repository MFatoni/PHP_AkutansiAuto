<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<div class="container-fluid">
				<h3 class="text-center">Input Data</h3>
				<form action="../../src/controller.php" method="POST" class="jp">
				<input type="hidden" name="kdtransaksi">
				<input type="hidden" name="status" value="jual">
					<table>
						<tr>
							<td>Tanggal</td>
							<td class="text-right"><input type="date" name="tanggal"></td>
						</tr>
						<tr>
							<td>Penjualan berupa</td>
							<td class="text-right"><select name="jenis">
								<option selected ></option>
								<option value="peralatan" >Peralatan</option>
								<option value="perlengkapan" >Perlengkapan</option>
							</select></td>
						</tr>
						<tr>
							<td></td>
							<td class="radio-inline text-right">
								<input type="radio" name="cashKredit" onclick="jualC()" value="cash"><label > Cash</label>
								<input type="radio" name="cashKredit" onclick="jualK()" value="kredit"><label > Kredit</label>
							</td>
						</tr> 
						<tr>
							<td><label class="jualC">Jumlah</label></td>
							<td class="text-right"><label class="jualC">Rp.</label><input type="number" name="jumlah" value="0" class="text-right jualC" ></td>
						</tr>
						<!-- kredit -->
						<tr>
							<td><label class="jualK">Total Harga</label> </td>
							<td class="text-right"><label class="jualK">Rp.</label><input type="number" name="totalHarga" value="0" class="text-right jualK" ></td>
						</tr>
						<tr>
							<td><label class="jualK">Uang Muka</label></td>
							<td class="text-right"><label class="jualK">Rp.</label><input type="number" name="uangMuka" value="0" class="text-right jualK"></td>
						</tr>
						<!--  -->
						<tr>
							<td><label>Keterangan</label></td>
							<td class="text-right"><input type="text" name="keterangan"></td>
						</tr>
						<tr>
							<td></td>
							<td class="text-right"><input type="submit" value="INPUT"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
