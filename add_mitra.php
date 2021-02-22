<?php
  $page_title = 'Add Mitra';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_mitra'])){
   $req_fields = array('nm_mitra','jns_instansi');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name      = remove_junk($db->escape($_POST['nm_mitra']));
     $p_isntansi  = remove_junk($db->escape($_POST['jns_instansi']));

     $query  = "INSERT INTO mitra (";
     $query .=" nm_mitra,jns_instansi";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_isntansi}'";
     $query .=")";
     //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Mitra added ");
       redirect('add_mitra.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('mitra.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_mitra.php',false);
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
            <span>Add New Mitra</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_mitra.php" class="clearfix">
  
              <div class="form-group">
                <label  class="control-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nm_mitra" placeholder="Nama Mitra">
              </div>
              <div class="form-group">
                <label  class="control-label">Jenis Instansi</label>
                <input type="text" class="form-control" name="jns_instansi" placeholder="Instansi">
              </div>
              

           

           
              <button type="submit" name="add_mitra" class="btn btn-danger">Add Mita</button>
              <a href="mitra.php" class="btn btn-primary">Back</a>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
