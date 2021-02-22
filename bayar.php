<?php
  $page_title = 'All Pembayaran';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = view_bayar();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <!-- <form method="post" action="ceke_inv.php" class="clearfix">
              <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="Code">
              </div>
              <div class="form-group">
                      <button type="submit" class="btn btn-info  pull-right">Cari</button>
              </div>
          </form> -->

         <div class="pull-right">
           <a href="add_bayar.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 3px;"> No </th>
                <th class="text-center" style="width: 20%;"> Nama Mitra </th>
                <th class="text-center" style="width: 13%;"> Instansi </th>
                <th class="text-center" style="width: 10%;"> Awal Kontrak </th>
                <th class="text-center" style="width: 10%;"> Akhir Kontrak</th>
                <th class="text-center" style="width: 10%;">Jumlah Pembayaran</th>
                <th class="text-center" style="width: 10%;"> Tanggal Pembayaran</th>
                <th class="text-center" style="width: 10%;"> Melalui</th>
                <th class="text-center" style="width: 5%;"> Ket</th>
                <th class="text-center" style="width: 5px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($product['nm_mitra']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['jns_instansi']); ?></td>
                <td class="text-center"> <?php echo date('d F Y', strtotime ($product['tgl_awal'])); ?></td>
                <td class="text-center"> <?php echo date('d F Y', strtotime ($product['tgl_akhir'])); ?></td>
                <td class="text-center"> <?php echo number_format(($product['jumlah']), 0,  ".", "."); ?></td>
                <td class="text-center"> <?php echo date('d F Y', strtotime ($product['tgl_bayar'])); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['melalui']); ?></td>
                <td class="text-center">
                  <span class="label label-success"><?php echo remove_junk($product['ket']);  ?></span>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_bayar.php?id_bayar=<?php echo $product['id_bayar'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_bayar.php?id_bayar=<?php echo $product['id_bayar'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
