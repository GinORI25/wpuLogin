
<div class="container-fluid">
    
    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 
                    <div class="container rounded" >
                        <!-- Outer Row -->
                        
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-8" style="margin-top:rem;">
                                
                            <div class=" o-hidden border-0  my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    
                                                    <h1 class="h4 text-gray-900 mb-4">Add produk<img src="<?= base_url('assets/img/component/WCD.jpg'); ?>" 
                                                    style="margin: 1rem; width:2.5rem;" class="border border-warning rounded-circle "></h1>
                                                </div>
                                                
                                                <?= $this->session->flashdata('message'); ?>
                                                
                                                <form class="user" method="post" action="<?= base_url('manager/produk'); ?>">
                                                    <div class="form-group">
                                                         <label for="name" class="col col-form-label"><b>Name produk :</b> </label>
                                                         <input type="text" class="form-control form-control-user"
                                                        id="name" name="name"  placeholder="Enter name the produk" >
                                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="harga" class="col col-form-label"><b>Harga produk / item :</b> </label>
                                                        <input type="text" class="form-control form-control-user"
                                                id="harga" name="harga" placeholder="harga /pcs">
                                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                   <label for="keterangan" class="col col-form-label"><b>keterangan produk :</b> </label>
                                                <input type="text" class="form-control form-control-user"
                                                id="keterangan" name="keterangan" placeholder="keterangan produk">
                                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <center>
                                            <div class="col-lg-8 ">
                                                <div class="form-group">
                                                       <label for="status" class="col col-form-label"><b>status produk 1 : tersedia, 0: habis</b> </label>
                                                <input type="status" class="form-control form-control-user"
                                                id="status" name="status" placeholder="status produk ">
                                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Add Produk
                                        </button>
                                        </div>
                                    </center>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>

  



</div>
</div>














</div>
</div>
                    
              
                
                 
                 
                
                


















