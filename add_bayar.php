<?php
  $page_title = 'Add Pembayaran';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_mitra = view_kontrak();
  $all_photo = find_all('media');

  

?>
<?php
 if(isset($_POST['add_bayar'])){
   $req_fields = array('nm_mitra','jumlah','tgl_bayar','melalui');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name   = remove_junk($db->escape($_POST['nm_mitra']));
     $p_jumlah   = remove_junk($db->escape($_POST['jumlah']));
     $p_bayar   = remove_junk($db->escape($_POST['tgl_bayar']));
     $p_melalui  = remove_junk($db->escape($_POST['melalui']));

     $query  = "INSERT INTO bayar (";
     $query .=" id_kontrak,jumlah,tgl_bayar,melalui,ket";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_jumlah}', '{$p_bayar}', '{$p_melalui}', 'Lunas'";
     $query .=")";
     //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Pembayaran added ");
       redirect('add_bayar.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('pembayaran.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_bayar.php',false);
   }
 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Pembayaran</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_bayar.php" class="clearfix">
  
              <div class="form-group">
              <label  class="control-label">Mitra Kontrak</label>
                <select class="form-control" name="nm_mitra">
                  <option value=""></option>
                <?php  foreach ($all_mitra as $cat): ?>
                    <option value="<?php echo $cat['id_kontrak'] ?>">
                    <?php echo ($cat['nm_mitra'] ),(', '), ($cat['jns_instansi'] )  ?>
                    </option>
                <?php endforeach; ?>
                </select>
              </div>


              <div class="form-group ">
              <div class="row">
              <div class="col-md-6 ">
                <label  class="control-label">Jumlah Pembayaran</label>
                <input type="number" class="form-control" name="jumlah">
              </div>
              
              <div class="col-md-6 "> 
                <label  class="control-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" name="tgl_bayar">
              </div>
              </div>
              </div>

                <div class="form-group">
                <label  class="control-label">Melalui</label>
                <input type="text" class="form-control" name="melalui">
              </div>

              <div class="pull-right">
              <button type="submit" name="add_bayar" class="btn btn-danger ">Add Pembayaran</button>
              <a href="bayar.php" class="btn btn-primary">Back</a>
              </div>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
