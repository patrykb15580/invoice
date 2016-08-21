<title>Wyniki wyszukiwania</title>
<link rel="stylesheet" type="text/css" href="//localhost/zadanie-faktura/app/pub/css/main.css">
<form id="search" action="//localhost/zadanie-faktura/app/lib/actions/search.php" method="POST">
	Wpisz nazwę klienta
	<br /><input id="search_criterion" type="text" name="criterion" placeholder="Search..."><input id="search_start" type="submit" value="">
</form>
<br />
<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_connection/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/db_operations/db_operations.php');

$connect = new Connection;
$connect -> link();

$db = new DbOperations;
$db -> search();
		
?>
<a href="//localhost/zadanie-faktura/index.php"><button>Strona główna</button></a>