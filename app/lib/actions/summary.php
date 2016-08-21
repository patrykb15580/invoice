Data wygenerowania faktury:<br />
<?= $data -> date ?><br />
<?= $data -> hour ?><br /><br />

Dane wejściowe:<br />
Kontrahent: <?= $data -> contractor ?><br />
Ulica: <?= $data -> str ?><br />
Miasto: <?= $data -> ct ?><br />
NIP: <?= $data -> nip ?><br />
Ilość: <?= $data -> quantity ?> szt<br />
Cena netto: <?= $data -> net_price ?> zł<br />
Podatek: <?= $data -> tax ?>%<br /><br />
	
Dane wyjściowe:<br />
Cena brutto: <?= $data -> gross_price ?> zł<br />
Kwota brutto: <?= $data -> sum ?> zł<br />
Numer faktury: <?= $data -> number ?><br />

<br />Nazwa pliku wygenerowanej faktury:
<br /><?= $data -> output ?><br />