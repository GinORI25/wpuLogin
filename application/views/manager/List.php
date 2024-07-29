<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
  </h1>

  <?= $this->session->flashdata('message'); ?>

  <a href="<?= base_url('manager/DetailList');?>" class="btn btn-primary mb-3" >Detail produk</a>
    

  <div class="row ">
    <?php foreach ($produk as $p): ?>
      <div class="col-md-4 mb-2">
        <div class="card border border-dark ">
          <center>
            <img src="<?= base_url('assets/img/produk/') . $p['image']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><b>
                  <?= $p['name']; ?>
                </b></h5>
              <h5 class="card-title">Rp.
                <?= $p['harga']; ?> 
              </h5>
              <p class="card-text">
                <?= $p['keterangan']; ?>
              </p>

            </div>
            <div class="card-button">
              <a href="<?= base_url('manager/editproduks'); ?>" class="badge badge-pill badge-warning mb-3 "
                data-toggle="modal" data-target="#NewEditprodukModal<?= $p['id_brg'] ?>">edit produk</a>
              <a href="<?= base_url('manager/deleteproduk/') . $p['id_brg']; ?>"
                class="badge badge-pill badge-danger mb-3">delete</a>

            </div>
          </center>
        </div>
      </div>




      <!-- MODAL -->
      <div class="modal fade " id="NewEditprodukModal<?= $p['id_brg'] ?>" tabindex="1"
        aria-labelledby="NewEditprodukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content col-lg-12 ">
            <div class="modal-header">
              <h5 class="modal-title" id="NewEditprodukModalLabel">Edit Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <?= form_open_multipart('manager/editproduks'); ?>
            <div class="modal-body ">
              <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_brg" id="id_brg" value="<?= $p['id_brg']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name" value="<?= $p['name']; ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="harga" id="harga" value="<?= $p['harga']; ?>">
                  <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Ket : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="keterangan" id="keterangan"
                    value="<?= $p['keterangan']; ?>">
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="status" id="status" value="<?= $p['status']; ?>">
                  <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2">Picture : </div>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="<?= base_url('assets/img/produk/') . $p['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">edit produk</button>
            </div>
          </div>

          </form>
        </div>
      </div>
    <?php endforeach ?>
  </div>

 






















</div>
</div>

<!-- End of Main Content -->