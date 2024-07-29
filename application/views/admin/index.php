
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    
    <div class="container">

<div class="  my-5 col-lg-8 mx-auto">
    <div class="card-body ">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add new Account</h1>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>

                    
                    <form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
                       
                        <div class="form-group">
                        <label for="name" class=" col-form-label"><b>Name User :</b> </label>
                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="full name" value="<?= set_value('name'); ?>">

                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                        <label for="name" class=" col-form-label"><b>email User :</b> </label>
                            <input type="text" class="form-control form-control-user" id="email" name="email"
                                placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="name" class=" col-form-label"><b>password :</b> </label>
                                <input type="password" class="form-control form-control-user"
                                    id="password1" placeholder="Password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            
                            </div>
                            
                            <div class="col-sm-6">
                            <label for="name" class=" col-form-label"><b>verivry password :</b> </label>
                                <input type="password" class="form-control form-control-user"
                                    id="password2" placeholder="Repeat Password" name="password2">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="name" class=" col-form-label"><b>role User : </b> </label>
                            <input type="text" class="form-control form-control-user mb-3"
                                id="role_id" placeholder="role_id" name="role_id">
                                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        
                        </div>
                        <hr>
                        <center>
                        <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add Account
                        </button>
                    </center>
</div>
                    </div>
                    </div>
                    </div>
                    
                    
                </form>
                 
                  
                    
                </div>
            </div>
        </div>
 


                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         