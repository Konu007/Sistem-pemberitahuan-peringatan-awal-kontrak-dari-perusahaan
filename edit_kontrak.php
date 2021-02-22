<?php
  $page_title = 'Edit Kontrak';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$all_mitra =  view_kontrak_id($_GET['id_kontrak']);
$product = find_by_id2('kontrak',$_GET['id_kontrak']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing Kontrak id.");
  redirect('kontrak.php');
}
?>
<?php
 if(isset($_POST['kontrak'])){
    $req_fields = array('tgl_awal','tgl_akhir');
    validate_fields($req_fields);
    if(empty($errors)){
      $p_awal  = remove_junk($db->escape($_POST['tgl_awal']));
      $p_akhir = remove_junk($db->escape($_POST['tgl_akhir']));

      $query   = "UPDATE kontrak SET";
      $query  .=" tgl_awal ='{$p_awal}', tgl_akhir ='{$p_akhir}'";
  
      $query  .=" WHERE id_kontrak ='{$product['id_kontrak']}'";

      // $query  = "INSERT INTO inv (";
      // $query .=" id,nm_inv,lokasi,merek,tipe,kondisi,buatan,date,ket";
      // $query .=") VALUES (";
      // $query .=" '{$p_code}', '{$p_name}', '{$p_lokasi}', '{$p_merek}', '{$p_tipe}', '{$p_kondisi}', '{$p_buatan}', '{$date}', '{$p_ket}'";
      // $query .=")";
      //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
      if($db->query($query)){
        $session->msg('s',"Kontrak updated ");
        redirect('kontrak.php', false);
      } else {
        $session->msg('d',' Sorry failed to updated!');
        redirect('kontrak.php', false);
      }

   } else{
       $session->msg("d", $errors);
       redirect('edit_kontrak.php?id_kontrak='.$product['id_kontrak'], false);
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
            <span>Update Kontrak</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_kontrak.php?id_kontrak=<?php echo $product['id_kontrak'] ?>">

    

              <!-- <div class="form-group">
              <label  class="control-label">Nama Mitra</label>
              <input type="taxt" class="form-control" name="id_mitra" value="<?php echo remove_junk($product['nm_mitra']);?>">
              </div> -->

              <div class="form-group">
              <label  class="control-label">Nama Mitra</label>
                <taxt class="form-control" name="nm_mitra">
                <?php  foreach ($all_mitra as $cat): ?>
                  <?php echo ($cat['nm_mitra'] ),(', '), ($cat['jns_instansi'] )  ?>
                  <?php endforeach; ?>
                </taxt>
              </div>
              
              <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                <label  class="control-label">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_awal" value="<?php echo remove_junk($product['tgl_awal']);?>">
                </div>

                <div class="col-md-6">
                <label  class="control-label">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tgl_akhir" value="<?php echo remove_junk($product['tgl_akhir']);?>">
                </div>
              </div>
              </div>


              <button type="submit" name="kontrak" class="btn btn-danger">Update</button>
              <a href="kontrak.php" class="btn btn-primary">Back</a>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
