
<div class="container rounded" style="background-color:#B22222;">
        <!-- Outer Row -->
       
        <div class="row justify-content-center">

            <div class="col-lg-7" style="margin-top:5rem;">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                    
                                        <h1 class="h4 text-gray-900 mb-4"><img src="<?= base_url('assets/img/component/WCD.jpg'); ?>" 
                                        style="margin: 1rem; width:3rem;" class="border border-warning rounded-circle "> Create your account</h1>
                                    </div>


                                    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                                placeholder="full name" value="<?= set_value('name'); ?>">

                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="email"
                                                placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password1" name="password1" placeholder="Password">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password2" placeholder="Repeat Password" name="password2">
                                        </div>
</div>
                                      
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register 
                                        </button>
                                       
                                    </form>
                                    <hr>
                                   <div class="info ">
                                    <center><p>Create and login to <b><i>Wekidi</i> ☜(ˆ▿ˆc)</b></p></center>
                                   </div>
                                   <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Login now!</a>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

  