<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		body {
			font-family: sans-serif;
			font-size: 10pt;
			
		}

		p {
			margin: 0pt;
		}

		table.items {
			border: 0.1mm solid #000000;
		}

		td {
			vertical-align: top;
		}

		.items td {
			border-left: 0.1mm solid #000000;
			border-right: 0.1mm solid #000000;
		}

		table thead td {
			background-color: #EEEEEE;
			text-align: center;
			border: 0.1mm solid #000000;
			font-variant: small-caps;
		}

		.items td.blanktotal {
			background-color: #EEEEEE;
			border: 0.1mm solid #000000;
			background-color: #FFFFFF;
			border: 0mm none #000000;
			border-top: 0.1mm solid #000000;
			border-right: 0.1mm solid #000000;
		}

		.items td.totals {
			text-align: right;
			border: 0.1mm solid #000000;
		}

		.items td.cost {
			text-align: "."center;
		}
	</style>
</head>

<body>

	<div style="text-align: right">
		<h4>Tanggal : <?= date("j F Y", strtotime($penjualan['tanggal'])); ?></h4>
	</div>
	<table width="100%" style="font-family: serif;" cellpadding="5">
		<tr>
			<td width="%"><img src="<?= base_url('assets/img/cvlogo.jpg'); ?>" width="13%" /></td>
			<td width="45%">
				<address>
					<strong>CV. Lima Cahaya</strong><br>
					Jl. Jembatan Kuning, No.01A<br>
					Sampit, Kalteng 74122<br>
					Telp. 0531 (2614020)<br>
					Email: cv.limacahaya.cvlc@gmail.com
				</address>
			</td>

			<td>
				<address>
					<strong>Kepada :</strong><br>
					No. : <?= $penjualan['kode_penjualan'] ?> <br>
					<?= $penjualan['nama'] ?><br>
					<?= $penjualan['alamat'] ?><br>
					Telp. <?= $penjualan['telp'] ?>
				</address>
			</td>
		</tr>
	</table>
	<br />
	<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
		<thead>
			<tr>
				<td width="5%">Kode</td>
				<td width="10%">Ukuran</td>
				<td width="50%">Nama</td>
				<td width="15%">Harga Jual</td>
				<td width="15%">Qty</td>
				<td width="15%">Total</td>
			</tr>
		</thead>
		<tbody>
			<!-- ITEMS HERE -->
			<?php foreach ($detail as $d) : ?>
				<tr>
					<td align="center"><?= $d['kode_brg'] ?></td>
					<td align="center"><?= $d['ukuran'] ?></td>
					<td><?= $d['nama_brg'] ?></td>
					<td class="cost">Rp <?= number_format($d['hrgjual'], 0, ',', '.'); ?></td>
					<td class="cost"><?= $d['qty'] ?></td>
					<td class="cost">Rp <?= number_format($d['total'], 0, ',', '.'); ?></td>

				</tr>
			<?php endforeach; ?>
			<!-- END ITEMS HERE -->
			<tr>
				<td class="blanktotal" colspan="4" rowspan="3"></td>
				<td class="totals" ><b>Total :</b></td>
				<td class="totals cost" align="center"><b>Rp <?= number_format($penjualan['jumlah'], 0, ',', '.'); ?></b></td>
			</tr>

		</tbody>
	</table>
	<?php if ($penjualan['bayar'] == 0) {
		$date1 = $penjualan['tanggal'];
		$date2 = $penjualan['tempo']; ?>
		<br>
		<div style="text-align: center; font-style: italic;">Status Pembayaran : KREDIT, Tenggat :
			<?php $sekarang = new DateTime("$date1");
			$penambahan = new DateInterval("$date2");
			$sekarang->add($penambahan); ?> <?= $sekarang->format('j F Y'); ?> </div>
	<?php } ?>
	<?php if ($penjualan['bayar'] == 1) { ?>
		<table width="50%" cellpadding ="8" style="text-align: center">
			
			<tr>
				<td>Admin</td>
				<td> </td>
				<td>Pembeli</td>
			</tr>
			<tr>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr >
				<td>. . . . . . . . </td>
				<td> </td>
				<td>. . . . . . . . </td>
			</tr>
		</table>
		<br>
		<div style="text-align: center; font-style: italic;">Status Pembayaran : CASH</div>
	<?php } ?>
</body>

</html>