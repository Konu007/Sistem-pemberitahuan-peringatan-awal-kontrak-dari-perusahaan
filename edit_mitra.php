<?php
  $page_title = 'Edit Mitra';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$product = find_by_id2('mitra',$_GET['id_mitra']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing Mitra id.");
  redirect('mitra.php');
}
?>
<?php
 if(isset($_POST['mitra'])){
    $req_fields = array('nm_mitra','jns_instansi');
    validate_fields($req_fields);
    if(empty($errors)){
      $p_name      = remove_junk($db->escape($_POST['nm_mitra']));
      $p_instansi  = remove_junk($db->escape($_POST['jns_instansi']));

      $query   = "UPDATE mitra SET";
      $query  .=" nm_mitra ='{$p_name}', jns_instansi ='{$p_instansi}'";
  
      $query  .=" WHERE id_mitra ='{$product['id_mitra']}'";

      // $query  = "INSERT INTO inv (";
      // $query .=" id,nm_inv,lokasi,merek,tipe,kondisi,buatan,date,ket";
      // $query .=") VALUES (";
      // $query .=" '{$p_code}', '{$p_name}', '{$p_lokasi}', '{$p_merek}', '{$p_tipe}', '{$p_kondisi}', '{$p_buatan}', '{$date}', '{$p_ket}'";
      // $query .=")";
      //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
      if($db->query($query)){
        $session->msg('s',"Mitra updated ");
        redirect('mitra.php', false);
      } else {
        $session->msg('d',' Sorry failed to updated!');
        redirect('mitra.php', false);
      }

   } else{
       $session->msg("d", $errors);
       redirect('edit_mitra.php?id_mitra='.$product['id_mitra'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Update Mitra</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_mitra.php?id_mitra=<?php echo $product['id_mitra'] ?>">

              <div class="form-group">
                <label  class="control-label">Nama Mitra</label>
                <input type="text" class="form-control" name="nm_mitra" value="<?php echo remove_junk($product['nm_mitra']);?>">
              </div>
              <div class="form-group">
                <label  class="control-label">Jenis Instansi</label>
                <input type="text" class="form-control" name="jns_instansi"  value="<?php echo remove_junk($product['jns_instansi']);?>">
              </div>

              <button type="submit" name="mitra" class="btn btn-danger">Update</button>
              <a href="mitra.php" class="btn btn-primary">Back</a>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
