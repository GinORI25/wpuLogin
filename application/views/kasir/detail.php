<div class="container-fluid">
    <h4> detail pesanan <div class="btn btn-sm btn-success">No. Invoice : <?= $invoice['id']; ?></div> </h4>
    <table class="table table-bordered table-hover tab;e-striped">
        <tr>
            <th>Id produk</th>
            <th>Nama produk</th>
            <th>Harga satuan</th>
            <th>sub total</th>
        </tr>
<?php 
$total = 0;
foreach ($pesanan as $psn ) :
    $subtotal = $psn['jumlah'] * $psn['harga'];
    $total += $subtotal;
?>

<tr>
    <td><?= $psn['id_brg']; ?></td>
    <td><?= $psn['name']; ?></td>
    <td><?= $psn['jumlah']; ?></td>
    <td><?= number_format($psn['harga']);  ?></td>
    <td><?= number_format($subtotal,0,',','.' ) ?></td>
    <td><?= $psn['id_brg']; ?></td>
</tr>




<?php endforeach; ?>
    <tr>
        <td colspan="4" align="right">Grand total</td>
        <td align="right">Rp. <?= number_format($total,0,',','.')  ?></td>
    </tr>    
</table>
<a href="<?= base_url('kasir')?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
</div>