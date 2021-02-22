<?php
  $page_title = 'Add Kontrak';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_mitra = view_mitra('mitra');
  $all_photo = find_all('media');

  

?>
<?php
 if(isset($_POST['add_kontrak'])){
   $req_fields = array('nm_mitra','tgl_awal','tgl_akhir');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name   = remove_junk($db->escape($_POST['nm_mitra']));
     $p_awal   = remove_junk($db->escape($_POST['tgl_awal']));
     $p_akhir  = remove_junk($db->escape($_POST['tgl_akhir']));

     $query  = "INSERT INTO kontrak (";
     $query .=" id_mitra,tgl_awal,tgl_akhir";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_awal}', '{$p_akhir}'";
     $query .=")";
     //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Kontrak added ");
       redirect('add_kontrak.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('kontrak.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_kontrak.php',false);
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
            <span>Add New Kontrak</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_kontrak.php" class="clearfix">
  
              <div class="form-group">
              <label  class="control-label">Nama Mitra</label>
                <select class="form-control" name="nm_mitra">
                  <option value=""></option>
                <?php  foreach ($all_mitra as $cat): ?>
                  <option value="<?php echo $cat['id_mitra'] ?>">
                    <?php echo ($cat['nm_mitra'] ),(', '), ($cat['jns_instansi'] )  ?>
                    </option>
                <?php endforeach; ?>
                </select>
              </div>
              
              <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                <label  class="control-label">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_awal">
                </div>

                <div class="col-md-6">
                <label  class="control-label">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tgl_akhir">
                </div>
              </div>
              </div>

              <button type="submit" name="add_kontrak" class="btn btn-danger">Add Kontrak</button>
              <a href="kontrak.php" class="btn btn-primary">Back</a>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
