<?php

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

    <section class="konten">
        <div class="container">
            <h2>Nota Pembelian</h2>
            <hr>
            <?php

            $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            $totalpembelian = $detail['total_pembelian'];
            
            ?>
            <table>
                <tr>
                    <td width="200">Nama Pembeli</td>
                    <td width="10">:</td>
                    <td><strong><?php echo $detail['nama_pelanggan'] ?></strong></td>
                </tr>
                <tr>
                    <td width="200">Tanggal Pembelian</td>
                    <td>:</td>
                    <td><strong><?php echo $detail['tanggal_pembelian'] ?></strong></td>
                </tr>
                <tr>
                    <td width="200">Total Pembelian</td>
                    <td>:</td>
                    <td><strong>Rp. <?php echo number_format($detail['total_pembelian']) ?></strong></td>
                </tr>
                <tr>
                    <th><h3>Detail pembelian</h3></th>
                </tr>
            </table>

            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php $totalharga = 0; ?>
                <?php $no = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM pembelian_menu JOIN menu ON pembelian_menu.id_menu=menu.id_menu WHERE pembelian_menu.id_pembelian='$_GET[id]'"); ?>
                <?php while($d = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d['nama_menu'] ?></td>
                        <td>Rp. <?php echo number_format($d['harga_menu']) ?></td>
                        <td><?php echo $d['jumlah'] ?></td>
                        <td>Rp. <?php echo number_format($d['harga_menu']*$d['jumlah']) ?></td>
                    </tr>
                <?php $no++; ?>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>Rp. <?php echo number_format($totalpembelian) ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <script>
                window.print();
            </script>
        </div>
    </section>

</body>
</html>