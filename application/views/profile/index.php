<!-- Begin Page Content -->
<div class="container-fluid ">

  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">
    <?= $title; ?>
  </h1>

  <div class="row">
    <div class="col-sm-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card mt-3  mb-5  border border-dark rounded">
    <div class="row g-4">
      <div class=" col-md-4 ">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
          class="img-fluid rounded-circle border border-dark  rounded " style="margin:3rem 0 2rem 2rem">
      </div>

      <div class="col-md-6 " style="margin: 7rem 0 0 3rem">
        <div class="card-body">
          <h4 class="card-title"><label for=""><b>Name : </label></b>
            <?= $user['name']; ?>
          </h4>
          <h4 class="card-text" style="margin-bottom:3.5rem;"><label for=""><b>Email : </label></b>
            <?= $user['email']; ?>
          </h4>
          <p class="card-text "> <label for=""><i>User since </label></i>
            <?= date('d F Y', $user['date_created']); ?>
          </p>
          <a href="<?= base_url('profile'); ?>" class="badge badge-pill badge-warning " data-toggle="modal"
            data-target="#NewEditProfileModal">Edit profile</a>
          <a href="<?= base_url('profile/ChangePassword'); ?>" class="badge badge-pill badge-danger">Change Password</a>

        </div>

      </div>
    </div>
  </div>





















  <!--Modal editDATA-->
  <div class="modal fade" id="NewEditProfileModal" tabindex="-1" aria-labelledby="NewEditProfileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NewEditProfileModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <?= form_open_multipart('profile'); ?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
              <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Pictures </div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
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
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->