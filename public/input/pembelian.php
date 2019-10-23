<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<div class="container-fluid">
				<h3 class="text-center">Input Data</h3>
				<form action="../../src/controller.php" method="POST" class="jp">
				<input type="hidden" name="kdtransaksi">
				<input type="hidden" name="status" value="beli">
					<table>
						<tr>
							<td>Tanggal</td>
							<td class="text-right"><input type="date" name="tanggal"></td>
						</tr>
						<tr>
							<td>Guna Pembelian</td>
							<td class="text-right"><select name="jenis">
								<option selected></option>
								<option value="peralatan" >Peralatan</option>
								<option value="perlengkapan" >Perlengkapan</option>
							</select></td>
						</tr>
						<tr>
							<td></td>
							<td class="radio-inline text-right">
								<input type="radio" name="cashKredit" onclick="beliC()" value="cash"><label> Cash</label>
								<input type="radio" name="cashKredit" onclick="beliK()" value="kredit"><label> Kredit</label>
							</td>
						</tr> 
						<tr>
							<td><label class="beliC">Jumlah</label></td>
							<td class="text-right"><label class="beliC">Rp.</label><input type="number" name="jumlah" value="0" class="text-right beliC" ></td>
						</tr>
						<!-- kredit -->
						<tr>
							<td><label class="beliK">Total Harga</label> </td>
							<td class="text-right"><label class="beliK">Rp.</label><input type="number" name="totalHarga" value="0" class="text-right beliK" ></td>
						</tr>
						<tr>
							<td><label class="beliK">Uang Muka</label></td>
							<td class="text-right"><label class="beliK">Rp.</label><input type="number" name="uangMuka" value="0" class="text-right beliK"></td>
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
