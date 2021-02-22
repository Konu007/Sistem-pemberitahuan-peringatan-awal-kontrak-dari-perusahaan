<?php
  $page_title = 'Edit Pembayaran';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$all_mitra =  view_bayar_id($_GET['id_bayar']);
$product = find_by_id2('bayar',$_GET['id_bayar']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing Pembayaran id.");
  redirect('bayar.php');
}
?>
<?php
 if(isset($_POST['bayar'])){
    $req_fields = array('jumlah','tgl_bayar', 'melalui');
    validate_fields($req_fields);
    if(empty($errors)){
      $p_jumlah  = remove_junk($db->escape($_POST['jumlah']));
      $p_bayar  = remove_junk($db->escape($_POST['tgl_bayar']));
      $p_melalui = remove_junk($db->escape($_POST['melalui']));

      $query   = "UPDATE bayar SET";
      $query  .=" jumlah ='{$p_jumlah}', tgl_bayar ='{$p_bayar}', melalui ='{$p_melalui}'";
  
      $query  .=" WHERE id_bayar ='{$product['id_bayar']}'";

      // $query  = "INSERT INTO inv (";
      // $query .=" id,nm_inv,lokasi,merek,tipe,kondisi,buatan,date,ket";
      // $query .=") VALUES (";
      // $query .=" '{$p_code}', '{$p_name}', '{$p_lokasi}', '{$p_merek}', '{$p_tipe}', '{$p_kondisi}', '{$p_buatan}', '{$date}', '{$p_ket}'";
      // $query .=")";
      //$query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
      if($db->query($query)){
        $session->msg('s',"Pembayaran updated ");
        redirect('bayar.php', false);
      } else {
        $session->msg('d',' Sorry failed to updated!');
        redirect('bayar.php', false);
      }

   } else{
       $session->msg("d", $errors);
       redirect('edit_bayar.php?id_bayar='.$product['id_bayar'], false);
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
            <span>Update Pembayaran</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_bayar.php?id_bayar=<?php echo $product['id_bayar'] ?>">

    

              <!-- <div class="form-group">
              <label  class="control-label">Nama Mitra</label>
              <input type="taxt" class="form-control" name="id_mitra" value="<?php echo remove_junk($product['nm_mitra']);?>">
              </div> -->

              <div class="form-group">
              <label  class="control-label">Mitra Kontrak</label>
                <taxt class="form-control" name="nm_mitra">
                <?php  foreach ($all_mitra as $cat): ?>
                  <?php echo ($cat['nm_mitra'] ),(', '), ($cat['jns_instansi'] )  ?>
                  <?php endforeach; ?>
                </taxt>
              </div>

              <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                <label  class="control-label">Jumlah Pembayaran</label>
                <input type="number" class="form-control" name="jumlah" value="<?php echo remove_junk($product['jumlah']);?>">
                </div>

                <div class="col-md-6">
                <label  class="control-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" name="tgl_bayar" value="<?php echo remove_junk($product['tgl_bayar']);?>">
                </div>
              </div>
              </div>

              <div class="form-group">
                <label  class="control-label">Melalui</label>
                <input type="text" class="form-control" name="melalui" value="<?php echo remove_junk($product['melalui']);?>">
              </div>

              <button type="submit" name="bayar" class="btn btn-danger">Update</button>
              <a href="bayar.php" class="btn btn-primary">Back</a>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
