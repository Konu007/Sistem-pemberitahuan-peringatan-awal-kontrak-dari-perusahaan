<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = find_by_id2('bayar',$_GET['id_bayar']);
  if(!$product){
    $session->msg("d","Missing Pembayaran id.");
    redirect('bayar.php');
  }
?>
<?php
  $delete_id = delete_by_id2('bayar',$product['id_bayar']);
  if($delete_id){
      $session->msg("s","Pembayaran deleted.");
      redirect('bayar.php');
  } else {
      $session->msg("d","Pembayaran deletion failed.");
      redirect('bayar.php');
  }
?>
