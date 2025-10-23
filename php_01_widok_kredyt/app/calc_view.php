<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Kwota kredytu: </label>
	<input id="id_x" type="text" name="x" value="<?php isset($x)?print($x):print(""); ?>" /><br />

	<label for="id_y">Liczba lat: </label>
	<input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
	<label for="id_op">Oprocentowanie: </label>
	<select name="op">
		<option value="5%">5%</option>
		<option value="6%">6%</option>
		<option value="7%">7%</option>
		<option value="8%">8%</option>
	</select><br />
	<input type="submit" value="Oblicz" />
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
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #a27ea8; width:300px;">
<?php 
echo 'Miesięczna kwota kredytu: '. number_format($result, 2, ',', ' ') . " PLN<br>"; 
echo "Całkowita spłata: " . number_format($result * $y*12, 2, ',', ' ') . " PLN<br>";
echo "Łączne odsetki: " . number_format($result * $y*12 - $x, 2, ',', ' ') . " PLN<br>";
?>
</div>
<?php } ?>

</body>
</html>