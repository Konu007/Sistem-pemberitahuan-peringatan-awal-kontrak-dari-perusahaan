<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = find_by_id2('kontrak',$_GET['id_kontrak']);
  if(!$product){
    $session->msg("d","Missing Kontrak id.");
    redirect('kontrak.php');
  }
?>
<?php
  $delete_id = delete_by_id2('kontrak',$product['id_kontrak']);
  if($delete_id){
      $session->msg("s","Kontrak deleted.");
      redirect('kontrak.php');
  } else {
      $session->msg("d","Kontrak deletion failed.");
      redirect('kontrak.php');
  }
?>
