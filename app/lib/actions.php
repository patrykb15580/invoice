<?php
/*	Generowanie pliku PDF	*/
class PDF
{
	public $pdf_output;
	public $pdf_number;

	function generate_pdf()
		{
		$data = new Data;
		$pdf_output = $this -> pdf_output;
		$pdf_seed = '<div id="box" style="display: block; width: 80%; padding: 0px; margin: 0px 10% 0px 10%;">
			<img id="logo" src="'.$_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/graphics/booklet-logo.png" style="display: block; float: left; width: auto; height: 100px; margin: 0px;">
				<div id="data" style="display: block; float: left; width: auto; height: 100px; margin: 0px 0px 0px 100px; font-size: 14px; font-family: calibri;">
					Data wystawienia faktury:<br />'.$data -> date.'<br />'.$data -> hour.'
				</div>
				<div id="nrfaktury" style="display: block; background-color: grey; width: 100%; height: auto; border-top: 2px; border-right: 0px; border-bottom: 2px; border-left: 0px; border-color: black; border-style: solid; margin: 0px; font-style: calibri; font-size: 36px; padding: 10px;">
					Faktura nr: '.$this -> pdf_number.'
				</div>
				<div id="danesprzedawca" style="display: block;  float: left; width: 47%; height: auto; margin: 0px 2% 0px 2%; font-size: 14px;">
					<h1 style="font-size: 18px;">
						JAŚKOWIAK Promocja PHU
					</h1>
					<hr>
						Korzkwy 23<br />63-300 Pleszew<br />617-114-55-76
				</div>
				<div id="danenabywca" style="display: block;  float: left; width: 47%; height: auto; margin: 0px 2% 0px 2%; font-size: 14px;">
					<h1 style="font-size: 18px;">
						'.$data -> contractor.'
					</h1>
					<hr>'.$data -> str.'<br />'.$data -> ct.'<br />'.$data -> nip.'
				</div>
				<br />
				<div id="tabela">
					<table cellspacing="0" width="100%" border="1" border-color="black">
						<tr style="background-color:grey;" align="center">
							<td>Ilość</td><td>Cena netto</td><td>Cena brutto</td><td>Podatek</td><td>Kwota brutto</td>
						</tr>
						<tr align="center">
							<td>'.$data -> quantity.' szt</td><td>'.$data -> net_price.' zł</td><td>'.$data -> gross_price.' zł</td><td>'.$data -> tax.' %</td><td>'.$data -> sum.' zł</td>
						</tr>
					</table>
				</div>
			</div>';

		require_once($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/app/lib/mpdf/mpdf.php');

		$mpdf = new mPDF();
		
		$mpdf -> WriteHTML($pdf_seed);
		$mpdf -> Output($_SERVER['DOCUMENT_ROOT'].'/zadanie-faktura/invoices/'.$pdf_output);

		}
}
?>