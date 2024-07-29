<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
  </h1>


    
    <table class="table table-hover col-lg">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">harga</th>
                <th scope="col">Keterangan</th>
                <th scope="col">status</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $I = 1; 
                 foreach ($produk as $p ) : ?>
                <tr>
                <th scope="row"><?= $I++; ?></th>
                <td><?= $p['name']; ?></td>
                <td>Rp-<?= $p['harga']; ?></td>
                <td><?= $p['keterangan']; ?></td>
                <td><?= $p['status']; ?></td>
                <td><?= $p['image']; ?></td>
                <td>
                <div class="card-button">
              <a href="<?= base_url('manager/editproduks'); ?>" class="badge badge-pill badge-warning mb-3 "
                data-toggle="modal" data-target="#NewEditprodukModal<?= $p['id_brg'] ?>">edit produk</a>
              <a href="<?= base_url('manager/deleteproduk/') . $p['id_brg']; ?>"
                class="badge badge-pill badge-danger mb-3">delete</a>
            </div>
                </td>
                </tr>

                
            </tbody>





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
    
    </table>
  
  

 



  </div>
</div>