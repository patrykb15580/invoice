<?php
/*	Dodanie faktury do bazy danych	*/
class DbOperations
{	
	public $db_number;
	private $id;

	function add()
	{	
		$data = new Data;

		$sql_select = 'SELECT MAX(id) as id FROM invoice';
 		$result = mysqli_query($_SESSION['link'], $sql_select);

		while ($row = mysqli_fetch_assoc($result)) {

			$this -> id = $row['id'];

		}

		$id = $this -> id + 1;

		$this -> db_number = date('Ymd')."-".$id;
		$data -> number = $this -> db_number; 

		$sql_insert = 'INSERT INTO invoice (invoice_number, invoice_date, invoice_hour, contractor, str, ct, nip, quantity, net_price, gross_price, tax, sum) VALUES ('.'"'.$this -> db_number.'","'.date('Y-m-d').'","'.date('H:i:s').'","'.$data -> contractor.'","'.$data -> str.'","'.$data -> ct.'","'.$data -> nip.'","'.$data -> quantity.'","'.$data -> net_price.'","'.$data -> gross_price.'","'.$data -> tax.'","'.$data -> sum.'")';
		$insert = mysqli_query($_SESSION['link'], $sql_insert);
		if ($insert) echo '<script type="text/javascript">alert("Faktura została zapisana w bazie danych\n\nZa chwilę zostanie przekierowany na stronę główną")</script>';	
		else echo '<script type="text/javascript">alert("Nie udało się zapisać faktury\n\nZa chwilę zostanie przekierowany na stronę główną")</script>';

	}
	function search()
	{
		$sql_search = 'SELECT * FROM invoice WHERE contractor = "'.$_POST['criterion'].'"';
 		$search_result = mysqli_query($_SESSION['link'], $sql_search);

 		echo 'Wyniki wyszukiwania dla: '.$_POST['criterion'].'<br/><table cellspacing="0" border="1" cellpadding="3"><tr><td>Numer faktury</td><td>Kontrahent</td><td>Ulica</td><td>Miasto</td><td>NIP</td><td>Data</td><td>Godzina</td><td>Ilość</td><td>Cena netto</td><td>Cena brutto</td><td>Podatek</td><td>Kwota brutto</td><td></td></tr>';
		while ($row = mysqli_fetch_assoc($search_result)) {

			echo '<tr><td>'.$row['invoice_number'].'</td><td>'.$row['contractor'].'</td><td>'.$row['str'].'</td><td>'.$row['ct'].'</td><td>'.$row['nip'].'</td><td>'.$row['invoice_date'].'</td><td>'.$row['invoice_hour'].'</td><td>'.$row['quantity'].' szt</td><td>'.$row['net_price'].' zł</td><td>'.$row['gross_price'].' zł</td><td>'.$row['tax'].'%</td><td>'.$row['sum'].' zł</td><td><a href="//localhost/zadanie-faktura/app/lib/actions/create_invoice_view.php?number='.$row['invoice_number'].'" target="_blank">Otwórz fakturę</a></td></tr>';
		}
		echo "</table>";
	}
	function create_invoice_view()
	{
		$sql_search = 'SELECT * FROM invoice WHERE invoice_number = "'.$_GET['number'].'" ORDER BY id DESC';
 		$search_result = mysqli_query($_SESSION['link'], $sql_search);

		while ($row = mysqli_fetch_assoc($search_result)) {

			$this -> db_invoice_number = $row['invoice_number'];
			$this -> db_contractor = $row['contractor'];
			$this -> db_str = $row['str'];
			$this -> db_ct = $row['ct'];
			$this -> db_nip = $row['nip'];
			$this -> db_invoice_date = $row['invoice_date'];
			$this -> db_invoice_hour = $row['invoice_hour'];
			$this -> db_quantity = $row['quantity'];
			$this -> db_net_price = $row['net_price'];
			$this -> db_gross_price = $row['gross_price'];
			$this -> db_tax = $row['tax'];
			$this -> db_sum = $row['sum'];
		}
	}
}	
?>