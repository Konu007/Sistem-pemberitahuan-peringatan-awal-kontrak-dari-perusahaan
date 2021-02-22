<?php
  $page_title = 'Rekapan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = view_rekap();
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

        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 3px;"> No </th>
                <th class="text-center" style="width: 50%;"> Nama Mitra </th>
                <th class="text-center" style="width: 30%;"> Instansi </th>
                <th class="text-center" style="width: 18%;"> Ket </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($product['nm_mitra']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['jns_instansi']); ?></td>
                <td class="text-center">
                  <?php if($product['ket'] === 'Lunas'): ?>
                    <span class="label label-success"><?php echo remove_junk($product['ket']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk('Hutang'); ?></span>
                  <?php endif;?>
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
