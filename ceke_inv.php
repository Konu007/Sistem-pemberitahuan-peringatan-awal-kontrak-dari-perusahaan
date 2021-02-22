<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $req_fields = array('id' );
  validate_fields($req_fields);
  $id = remove_junk($_POST['id']);

  $product = find_by_id('inv',$id);
  if(!$product){
    $session->msg("d","Missing Product id.");
    redirect('inv.php');
  }
?>





<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
         <label  class="control-label">Cek Inventais</label>


         <form method="post" action="ceke_inv.php" class="clearfix">
              <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="Code">
              </div>
              <div class="form-group">
                      <button type="submit" class="btn btn-info  pull-right">Cari</button>
              </div>
          </form>


         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th class="text-center" style="width: 10%;"> Nama Peralatan </th>
                <th class="text-center" style="width: 10%;"> Lokasi </th>
                <th class="text-center" style="width: 10%;"> Merek </th>
                <th class="text-center" style="width: 10%;"> Tipe </th>
                <th class="text-center" style="width: 10%;"> Kondisi </th>
                <th class="text-center" style="width: 10%;"> Buatan </th>
                <th class="text-center" style="width: 10%;"> Tanggal</th>
                <th class="text-center" style="width: 10%;"> Ket </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php  ?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo ($product['nm_inv']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['lokasi']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['merek']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['tipe']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['kondisi']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buatan']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['ket']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_inv.php?id=<?php echo $product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_inv.php?id=<?php echo $product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
