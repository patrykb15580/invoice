<?php
/*	Połączenie	*/
class Connection
{
	private $host;
	private $user;
	private $password;
	private $database;

	public function link()
	{	
		$this -> host = 'localhost';
		$this -> user = 'root';
		$this -> password = '';
		$this -> database = 'zadanie';

		$_SESSION['link'] = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
			if (!$_SESSION['link']) {
				echo "Nie udało się połączyć z bazą danych<br />";
			}
			else echo "Połączono z bazą danych<br />";		
	}
}
?>