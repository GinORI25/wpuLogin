  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



<div class="row">
    <div class="col-lg-4">
    <?= form_error('menu','<div class="alert alert-danger" role="alert">','
      </div>'); ?>

        <?= $this->session->flashdata('message'); ?>


    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewRoleModal">Add Role</a>
    
    <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
             
                </tr>
            </thead>
            <tbody>
                <?php $I = 1; ?>
                <?php foreach ($role as $r ) : ?>
                <tr>
                <th scope="row"><?= $I; ?></th>
                <td><?= $r['role']; ?></td>
              
                
                </tr>
                <?php $I++; ?>
                <?php endforeach; ?>
            </tbody>

            </table>

    </div>
</div>








</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- MODAL -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="NewRoleModal" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="NewRoleModalLabel">Add Menu</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<form action="<?= base_url('menu/role'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
<input type="text" class="form-control" name="role" id="role" placeholder="input role name">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
</div>
</div>

