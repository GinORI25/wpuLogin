  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



<div class="row">
    <div class="col-lg">
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
       <?= validation_errors()  ?>
        </div>
            <?php endif; ?>
   

        <?= $this->session->flashdata('message'); ?>


    <a href="" class="btn btn-primary mb-3" data-toggle="modal" 
    data-target="#NewsubMenuModal">Add subMenu</a>
    
    <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">Menu</th>
                <th scope="col">url</th>
                <th scope="col">icon</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $I = 1; 
                 foreach ($subMenu as $sm ) : ?>
                <tr>
                <th scope="row"><?= $I++; ?></th>
                <td><?= $sm['title']; ?></td>
                <td><?= $sm['menu']; ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['icon']; ?></td>
                <td><?= $sm['is_active']; ?></td>
                <td>
                    <a href="<?= base_url('menu/editsubmenu'); ?>" class="badge badge-pill badge-success" data-toggle="modal"  data-target="#NewEditSubMenuModal<?= $sm['id']?>">edit</a>
                    <a href="<?= base_url('menu/deletesubmenu/') . $sm['id'];  ?>" class="badge badge-pill badge-danger">delete</a>
                </td>
                </tr>
                
               
            </tbody>

            

<!-- Modal -->
<div class="modal fade" id="NewEditSubMenuModal<?= $sm['id']?>" tabindex="-1" aria-labelledby="NewEditSubMenuModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="NewEditSubMenuModalLabel">Edit Submenu</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
<input type="text" class="form-control mb-2" name="id" id="id" value="<?= $sm['id'];?>"  readonly>
<input type="text" class="form-control mb-3" name="menu_id" id="menu_id" value="<?= $sm['menu_id'];?>" >
</div>
<div class="form-group">
    <input type="text" class="form-control mb-2" name="title" id="title" value="<?= $sm['title'];?>" >
<input type="text" class="form-control mb-3" name="url" id="url" value="<?= $sm['url'];?>" >
</div>
<input type="text" class="form-control mb-2" name="icon" id="icon" value="<?= $sm['icon'];?>" >
<input type="text" class="form-control mb-2" name="is_active" id="is_active" value="<?= $sm['is_active'];?>" >

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
 <?php endforeach ?>
</table>

<div class="modal fade" id="NewsubMenuModal" tabindex="-1" aria-labelledby="NewsubMenuModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="NewsubMenuModalLabel">Add Submenu</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<form action="<?= base_url('menu/subMenu'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
<input type="text" class="form-control" name="title" id="title" placeholder="Submenu Title">
</div>
<div class="form-group">
    <select name="menu_id" id="menu_id" class="form-control">
        <?php foreach ($menu as $m) : ?>
           <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
<input type="text" class="form-control" name="url" id="url" placeholder="Submenu url">
</div>
<input type="text" class="form-control mb-2" name="icon" id="icon" placeholder="Submenu icon">
<input type="text" class="form-control mb-2" name="is_active" id="is_active" placeholder="1 = yes, 0 = no">






</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
</div>
</div>


    </div>
</div>








</div>
<!-- /.container-fluid -->

</div>