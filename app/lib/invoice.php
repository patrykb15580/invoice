<link rel="stylesheet" type="text/css" href="//localhost/zadanie-faktura/app/pub/css/main.css">
<link rel="stylesheet" type="text/css" href="//localhost/zadanie-faktura/app/pub/css/invoice.css">

<?php
	session_start();
?>
<div id="box">
	<img id="logo" src="//localhost/zadanie-faktura/app/graphics/booklet-logo.png">
		<div id="data">Data wystawienia faktury:
			<br /><?= @$_SESSION['date'] ?>
			<br /><?= @$_SESSION['hour'] ?>
		</div>';
		<div id="nrfaktury">
			Faktura nr: <?= @$_SESSION['invoice_number'] ?>
		</div>
		<div id="danesprzedawca">
			<h1>
				JAŚKOWIAK Promocja PHU
			</h1>
			<hr>
			Korzkwy 23
			<br />63-300 Pleszew
			<br />617-114-55-76
		</div>
		<div id="danenabywca">
			<h1>
				<?= @$_SESSION['contractor'] ?>
			</h1>
			<hr>
				<?= @$_SESSION['str'] ?>
				<br /><?= @$_SESSION['ct'] ?>
				<br /><?= @$_SESSION['nip'] ?>
		</div>
			<br />
		<div id="tabela">
			<table cellspacing="0">
				<tr style="background-color:grey;">
					<td>Ilość</td><td>Cena netto</td><td>Podatek</td><td>Cena brutto</td><td>Kwota brutto</td>
				</tr>
				<tr>
					<td><?= @$_SESSION['quantity'] ?> szt</td><td><?= @$_SESSION['net_price'] ?> zł</td><td><?= @$_SESSION['tax'] ?> %</td><td><?= @$_SESSION['gross_price'] ?> zł</td><td><?= @$_SESSION['sum'] ?> zł</td>
				</tr>
			</table>
		</div>
</div>
<br />
<a href="//localhost/zadanie-faktura/invoices/<?= $_SESSION['output'] ?>" target="_blank"><button>Wyświetl PDF</button></a>
<?php
	session_destroy();
?>