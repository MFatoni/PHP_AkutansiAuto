<?php include('../../includes/templateinput.php') ?>
		<div class="col-lg-10">
			<div class="container-fluid">
				<h3 class="text-center">Input Data</h3>
				<form action="../../src/controller.php" method="POST" class="jp">
				<input type="hidden" name="kdtransaksi">
				<input type="hidden" name="status" value="tambah">
					<table>
						<tr>
							<td>Tanggal</td>
							<td class="text-right"><input type="date" name="tanggal"></td>
						</tr>
						<tr>
							<td>Guna Penambahan</td>
							<td class="text-right"><select name="jenis">
								<option selected>Pilih</option>
								<option value="modal">Modal</option>
								<option value="hutang">Hutang</option>
							</select></td>
						</tr>
						<tr>
							<td><label>Jumlah</label> </td>
							<td class="text-right"><label>Rp.</label><input type="number" name="jumlah" value="0" class="text-right"></td>
						</tr>
						<tr>
							<td><label >Keterangan</label></td>
							<td class="text-right"><input type="text" name="keterangan" ></td>
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
