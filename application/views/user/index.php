

     


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

        <div class="row"  >
<div class="col-lg-6 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Good job, </h4>
                <p>Lupakan mimpimu dan <b>Matilah</b></p>               
                <div class="table-responsive">
                    




                </div></div>
                </div>
                <!-- /.container-fluid -->

            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- End of Main Content -->

         