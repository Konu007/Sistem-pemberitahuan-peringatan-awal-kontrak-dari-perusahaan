<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = find_by_id2('mitra',$_GET['id_mitra']);
  if(!$product){
    $session->msg("d","Missing Mitra id.");
    redirect('mitra.php');
  }
?>
<?php
  $delete_id = delete_by_id2('mitra',$product['id_mitra']);
  if($delete_id){
      $session->msg("s","Mitra deleted.");
      redirect('mitra.php');
  } else {
      $session->msg("d","Mitra deletion failed.");
      redirect('mitra.php');
  }
?>
