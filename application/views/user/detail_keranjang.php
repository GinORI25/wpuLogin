      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


<div class="container-fluid">
    <h4>keranjang Belanja</h4>
    <table class="table table-bordered table-striped table-hover">

      <tr>
        <th>#</th>
        <th>Nama produk </th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>sub-total</th>
      </tr>

      <?php 
      $no=1;
      foreach ($this->cart->contents () as $items) : ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $items['name'] ?></td>
              <td><?php echo $items['qty'] ?></td>
              <td align="right">Rp. <?php echo number_format ($items['price'],0,',','.')?></td>
              <td align="right">Rp. <?php echo number_format($items['subtotal'],0,',','.')?></td>
          </tr>
          
      <?php endforeach; ?>

      <tr>
     <td colspan="4"></td>
     <td align="right">Rp. <?php echo number_format($this->cart->
        total(), 0,',','.') ?></td>
      </tr>

    </table>


    <a href="<?php echo base_url('user/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
    <div align="right">
    <a href="<?php echo base_url('user/ListProduk') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
    <a href="<?php echo base_url('user/pemesanan') ?>"><div class=" btn btn-sm btn-success">Checkout</div></a>
    </div>


</div>
















    </div>
    </div>