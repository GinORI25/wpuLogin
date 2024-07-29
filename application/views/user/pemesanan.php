<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
  </h1>

  <div class= "container-fluid">
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
             <div class="btn btn-sm btn-success" >
                 <?php
                 $grand_total = 0;
                 if ($keranjang = $this->cart->contents())
                 {
                     foreach ($keranjang as $item)
                     {
                         $grand_total = $grand_total + $item['subtotal'];
                     }
                 echo "<h5>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
                  ?>
             </div>
         </div>
                 <h3 class="mt-5">INPUT ALAMAT PENGIRIM</h3>
            <form method="post" action="<?= base_url('user/proses_pesan') ?>">
                 <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="name" id="name" placeholder="Input your name" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">no Meja</label>
                    <input type="text" name="no_meja" id="no_meja" placeholder="meja anda?" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="">Media pembayaran</label>
                        <select  class="form-control">
                            <option value="">cash</option>
                            <option value="">BCA - XXXXXXX</option>
                            <option value="">BNI - XXXXXXX</option>
                            <option value="">BRI - XXXXXXX</option>
                            <option value="">MANDIRI - XXXXXXX</option>
                          
                        </select>
                 </div>
                    <button type="submit" class="btn  btn-primary">
                    pesan
                    </button>
                </form>
                <?php
                }else{
                    echo'<h5>keranjang belanjaan anda masih kosong';
                }
                ?>
                </div>
         <div class="col-md-2"></div>
     </div>
</div>
                </div>


</div>
</div>