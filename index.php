<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		Faktura
		</title>
		<link rel="stylesheet" type="text/css" href="app/pub/css/main.css">
		<link rel="stylesheet" type="text/css" href="app/pub/css/faktura.css">
	</head>
	<body>

<form action="app/lib/generate.php" method="POST">
	<img id="logo" src="app/graphics/booklet-logo.png">
		<div id="data">Data wystawienia faktury:
			<br /><?php echo date('d.m.Y') ?>
			<br />
		</div>
		<div id="nrfaktury">
			Faktura nr: <p>Numer zostanie wygenerowany po zatwierdzeniu faktury</p>
		</div>
	<div id="danebox">
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
				Kontrahent:
			</h1>
			<input type="text" name="contractor">
			<hr>
				Ulica:
				<br /><input type="text" name="str">
				<br />Miasto:
				<br /><input type="text" name="ct">
				<br />NIP:
				<br /><input type="text" name="nip">
		</div>
	</div>
		<br />
		<div id="tabela">
		<hr>
		<br />
			<table cellspacing="0">
				<tr style="background-color:grey;">
					<td>Ilość</td><td>Cena netto</td><td>Podatek</td>
				</tr>
				<tr>
					<td><input type="text" name="quantity"> szt</td><td><input type="text" name="price"> zł</td><td><input type="text" name="tax"> %</td>
				</tr>
			</table>
		</div>
		<br /><input type="submit" value="Zatwierdź fakturę">
</form>
	</body>
</html>