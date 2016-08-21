<?php
/*	Dane z formularza	*/
class Data
{
	public $contractor;
	public $str;
	public $ct;
	public $nip;
	public $quantity;
	public $net_price;
	public $tax;
	public $date;
	public $hour;
	public $gross_price;
	public $sum;
	public $number;
	public $output;

	function __construct()
	{
		@$this -> contractor = $_POST['contractor'];
		@$this -> str = $_POST['str'];
		@$this -> ct = $_POST['ct'];
		@$this -> nip = $_POST['nip'];
		@$this -> quantity = number_format($_POST['quantity'], 0, '', ' ');
		@$this -> net_price = number_format($_POST['price'], 2, '.', ' ');
		@$this -> tax = number_format($_POST['tax'], 0, '', ' ');
		@$this -> date = date('d.m.Y');
		@$this -> hour = date('H:i');
		@$this -> gross_price = $this -> net_price+($this -> net_price*($this -> tax/100));
		@$this -> sum = $this -> quantity*$this -> gross_price;	
		@$this -> gross_price = number_format($this -> gross_price, 2, '.', ' ');
		@$this -> sum = number_format($this -> sum, 2, '.', ' ');
	}
}	
?>