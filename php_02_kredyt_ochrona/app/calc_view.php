<?php 
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator kredytowy</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
	<label for="id_kwota">Kwota kredytu: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php out($kwota) ?>" />

	<label for="id_lata">Liczba lat: </label>
	<input id="id_lata" type="text" name="lata" value="<?php print($lata); ?>" /><br />

	<label for="id_op">Oprocentowanie: </label>
	<select name="op">
		<option value="0.05">5%</option>
		<option value="0.06">6%</option>
		<option value="0.07">7%</option>
		<option value="0.08">8%</option>
	</select>	
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/> 

</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #bd7386; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php 
echo 'Miesięczna kwota kredytu: '. number_format($result, 2, ',', ' ') . " PLN<br>"; 
echo "Całkowita spłata: " . number_format($result * $lata*12, 2, ',', ' ') . " PLN<br>";
echo "Łączne odsetki: " . number_format($result * $lata*12 - $kwota, 2, ',', ' ') . " PLN<br>";
?>
</div>
<?php } ?>

</body>
</html>