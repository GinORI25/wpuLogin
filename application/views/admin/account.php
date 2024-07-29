<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-5 text-gray-800">
    <?= $title; ?>
  </h1>

  <!-- Page Heading -->
  <div class="row">
    <?php foreach ($account as $u): ?>
      <div class="card border border-dark mb-3 m-2" style="max-width: 555px;">

        <div class="row g-4">
          <div class="col-md">
            <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>"
              class="img-fluid rounded-start border border-warning  rounded" style="margin:1.5rem 1.5rem 1rem 1rem ">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Nama :
                <?= $u['name']; ?>
              </h5>
              <p class="card-text">Email :
                <?= $u['email']; ?>
              </p>
              <p class="card-text">Posisi :
                <?= $u['role']; ?>
              </p>
              <p class="card-text">Status :
                <?= $u['is_active']; ?>
              </p>
              <p class="card-text">User Since : <small class="text-muted">
                  <?= date('d F Y', $u['date_created']); ?>

                </small></p>
                
            </div>
          </div>
        </div>


      </div>
    

  
  
  <?php endforeach; ?>
</div>
</div>