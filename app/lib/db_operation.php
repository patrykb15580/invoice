<?php
/*	Dodanie faktury do bazy danych	*/
class DbOperations
{	
	public $db_number;
	private $id;

	function add()
	{	
		$data = new Data;
		$connect = new Connection;

		$sql_select = 'SELECT MAX(id) as id FROM invoice';
 		$result = mysqli_query($_SESSION['link'], $sql_select);

		while ($row = mysqli_fetch_assoc($result)) {

			$this -> id = $row['id'];

		}

		$id = $this -> id + 1;

		$this -> db_number = date('Ymd')."-".$id;
		$data -> number = $this -> db_number; 

		$sql_insert = 'INSERT INTO invoice (invoice_number, invoice_date, invoice_hour, contractor, str, ct, nip, quantity, price, tax, sum) VALUES ('.'"'.$this -> db_number.'","'.date('Y-m-d').'","'.date('H:i:s').'","'.$data -> contractor.'","'.$data -> str.'","'.$data -> ct.'","'.$data -> nip.'","'.$data -> quantity.'","'.$data -> net_price.'","'.$data -> tax.'","'.$data -> sum.'")';
		$insert = mysqli_query($_SESSION['link'], $sql_insert);
		if ($insert) echo '<script type="text/javascript">alert("Faktura została zapisana w bazie danych\n\nZa chwilę zostanie przekierowany na stronę główną")</script>';	
		else echo '<script type="text/javascript">alert("Nie udało się zapisać faktury\n\nZa chwilę zostanie przekierowany na stronę główną")</script>';

	}
}
?>