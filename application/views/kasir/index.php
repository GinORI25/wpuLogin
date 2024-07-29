<div class="container-fluid">
    <h4> detail pesanan </h4>
    <table class="table table-bordered table-hover tab;e-striped">
        <tr>
            <th>Id invoice</th>
            <th>Nama pemesan</th>
            <th>No meja</th>
            <th>tanggal pesan</th>
            <th>batas bayar</th>
            <th>action</th>
        </tr>
    <?php foreach ($invoice as $inv): ?>
        <tr>
            <td><?= $inv['id']; ?></td>
            <td><?= $inv['name']; ?></td>
            <td><?= $inv['no_meja']; ?></td>
            <td><?= $inv['tanggal_pesan']; ?></td>
            <td><?= $inv['batas_bayar']; ?></td>
            <td><?= anchor('kasir/detail/' . $inv['id'], '<div class="btn btn-sm btn-success">Detail</div>')?></td>
        </tr>
<?php  endforeach ?>
    </table>
</div>
</div>