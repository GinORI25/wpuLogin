<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
  </h1>

  <?= $this->session->flashdata('message'); ?>

  <div class="row">
    <div class="col-sm-3 btn btn-warning text-dark m-3 ">
      <?php
      $keranjang = 'keranjang belanja : ' . $this->cart->total_items() .
        ' items'
        ?>
      <?php echo anchor('user/detail_keranjang', $keranjang )  ?>
    </div>
  </div>

  <div class="row mt-4">
    <?php foreach ($produk as $p): ?>
      <div class="col-md-4 mb-2">
        <div class="card border border-dark ">
          <center>
            <img src="<?= base_url('assets/img/produk/') . $p['image']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" hidden><b>
                  <?= $p['id_brg']; ?>
                </b></h5>
              <h5 class="card-title"><b>
                  <?= $p['name']; ?>
                </b></h5>
              <h5 class="card-title">Rp.
                <?= number_format($p['harga'], 0,',','.') ; ?>
              </h5>
              <p class="card-text">
                <?= $p['keterangan']; ?>
              </p>
              <?php echo anchor('user/tambah_keranjang/' . $p['id_brg'], '<div class="btn btn-sm btn-primary"> Tambah ke keranjang</div>') ?>
            </div>

          </center>
        </div>
      </div>
    <?php endforeach; ?>


  </div>
</div>

<!-- End of Main Content -->