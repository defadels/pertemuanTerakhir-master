<h2>Pembelian</h2>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Nama Pelanggan</th>
 			<th>Tanggal</th>
 			<th>Total</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor =1; ?>
 		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
 		<?php while($p = $ambil->fetch_assoc()) {?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $p['nama_pelanggan']; ?></td>
 			<td><?php echo $p['tanggal_pembelian']; ?></td>
 			<td>Rp. <?php echo number_format($p['total_pembelian']); ?></td>
 		</tr>
 	<?php } ?>
 	</tbody>
 </table>