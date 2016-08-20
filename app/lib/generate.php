<?php
if(isset($_POST['contractor']) && ($_POST['str']) && ($_POST['ct']) && ($_POST['nip']) && ($_POST['quantity']) && ($_POST['price'])){

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_operation.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/actions.php');

$connect = new Connection;
$connect -> link();


$data = new Data;

$db = new DbOperations;
$db -> add();

$data -> number = $db -> db_number;
$data -> output = 'Faktura-'.$data -> number.'.pdf';

$pdf = new PDF;
$pdf -> pdf_output = $data -> output;
$pdf -> pdf_number = $data -> number;
$pdf -> generate_pdf();

require_once('session_data.php');

include($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/summary.php');

}

else echo '<script type="text/javascript">setTimeout(function redirect(){ alert("Wypełnij wszystkie pola"); window.location.href = "/zadanie-faktura/index.php"; }, 500);</script>';
?>

<script type="text/javascript">setTimeout(function redirect(){ alert("Przekierowanie"); window.location.href = "//localhost/zadanie-faktura/app/lib/invoice.php"; }, 1000);</script>