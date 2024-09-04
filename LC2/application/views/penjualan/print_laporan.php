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

    <div style="text-align: center">
        <h3>Laporan Per Tanggal</h3>
        <address><?= date("d M Y", strtotime($tgl1)); ?> sd <?= date("d M Y", strtotime($tgl2)); ?> </address>
    </div>
    <br />
    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td>No</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Telp</td>
                <td>Jumlah</td>
                <td>Pembayaran</td>
                <td>Tanggal</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <?php $no = 1;

            foreach ($laporan_per as $b) : ?>
                <?php if($b['sts'] != 0) { ?>
                <tr>
                    <td ><?= $no++; ?></td>
                    <td><?= $b['kode_penjualan']; ?></td>
                    <td><?= $b['nama']; ?></td>
                    <td><?= $b['alamat']; ?></td>
                    <td><?= $b['telp']; ?></td>
                    <td>Rp. <?= $b['jumlah']; ?>,-</td>

                    <?php $bayar = $b['bayar'];
                    if ($bayar == 0) { ?>
                        <td class="text-danger font-weight-bold">KREDIT</td>
                    <?php ;
                    } else { ?>
                        <td class="text-success font-weight-bold">CASH</td>
                    <?php ;
                    }; ?>
                    <td><?= date("d M Y", strtotime($b['tanggal'])); ?></td>
                    <?php $sts = $b['sts'];
                    if ($sts == 2) { ?>
                        <td class="text-primary font-weight-bold">PENDING</td>
                    <?php ;
                    } else if ($sts == 1) { ?>
                        <td class="text-success font-weight-bold">DONE</td>

                    <?php ;
                    } else if ($sts == 3) { ?>
                        <td class="text-warning font-weight-bold">INCOMPLETE</td>
                    <?php ;
                    } else { ?>
                        <td class="text-danger font-weight-bold">CANCEL</td>
                    <?php } ?>
                </tr>
            <?php } endforeach; ?>
            <!-- END ITEMS HERE -->
            <tr>
                <td class="blanktotal" colspan="4" ></td>
                <td class="totals"><b>TOTAL :</b></td>
                <td class="totals cost"><b>Rp.<?= (int)$sum['SUM(penjualan2.jumlah)'] ?>,-</b></td>
                <td class="blanktotal" colspan="3" ></td>
            </tr>
            

        </tbody>
    </table>
</body>

</html>