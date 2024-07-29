  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 
                  

                    <div class="row">
                        <div class="col-lg-6">
                        <?= form_error('menu','<div class="alert alert-danger" role="alert">','
                          </div>'); ?>

                            <?= $this->session->flashdata('message'); ?>


                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewMenuModal">Add Menu</a>
                        
                        <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $I = 1; 
                                    foreach ($menu as $m ) : ?>
                                    <tr>
                                    <th scope="row"><?= $I++ ; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td>
                                        <a href="<?= base_url('menu/editmenu'); ?>" class="badge badge-pill badge-success" data-toggle="modal" data-target="#NewEditMenuModal<?= $m['id']?>" >edit</a>
                                        <a href="<?= base_url('menu/deletemenu/') . $m['id'];  ?>" class="badge badge-pill badge-danger">delete</a>
                                    </td>
                                    
                                    </tr>
                                    
                                    
                                </tbody>
                                  
                             


            <!-- MODAL -->

<div class="modal fade" id="NewEditMenuModal<?= $m['id']?>" tabindex="-1" aria-labelledby="NewEditMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewEditMenuModalLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?= base_url('menu/editmenu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control mb-2" name="id" id="id"   value="<?= $m['id'];?>"readonly>
          <input type="text" class="form-control" name="menu" id="menu"   value="<?= $m['menu'];?>">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
      </form>
    </div>

      <?php endforeach; ?>            <!-- Button trigger modal -->

                          </table>

<!-- Modal -->
<div class="modal fade" id="NewMenuModal" tabindex="-1" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewMenuModalLabel">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?= base_url('menu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="menu" id="menu" placeholder="input menu name">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>











                                    </div></div>
                                    </div></div>
                                    </div></div>
                                    </div></div>