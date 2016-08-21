<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_connection/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_operations/db_operations.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/actions/create_pdf.php');

$connect = new Connection;
$connect -> link();

$db = new DbOperations;
$db -> create_invoice_view();

require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/data/create_view_session_data.php');

$pdf = new PDF;
$pdf -> view_pdf();

session_destroy();
?>
<script type="text/javascript">setTimeout(function redirect(){ window.location.href = "//localhost/zadanie-faktura/invoices/Faktura-<?= $_GET['number'] ?>.pdf"; }, 0);</script>
