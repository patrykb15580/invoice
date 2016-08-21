<?php
if(isset($_POST['contractor']) && ($_POST['str']) && ($_POST['ct']) && ($_POST['nip']) && ($_POST['quantity']) && ($_POST['price'])){

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_connection/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/data/data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_operations/db_operations.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/actions/create_pdf.php');

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

require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/data/generate_session_data.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/actions/summary.php');

}

else echo '<script type="text/javascript">setTimeout(function redirect(){ alert("Wypełnij wszystkie pola"); window.location.href = "//localhost/zadanie-faktura/index.php"; }, 0);</script>';
?>

<script type="text/javascript">setTimeout(function redirect(){ alert("Przekierowanie"); window.location.href = "//localhost/zadanie-faktura/app/lib/actions/invoice.php"; }, 2000);</script>