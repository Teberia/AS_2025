<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Kalkulator kredytowy</h2>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">
	<fieldset>
		<label for="id_kwota">Kwota kredytu: </label>
		<input id="id_kwota" type="text" placeholder="kwota kredytu" name="kwota" value="<?php out($form['kwota']); ?>">
		
		<label for="id_lata">Liczba lat: </label>
		<input id="id_lata" type="text" name="lata" value="<?php out($form['lata']); ?>">

		<label for="op">Oprocentowanie</label>
	<select name="op">
		<option value="0.05">5%</option>
		<option value="0.06">6%</option>
		<option value="0.07">7%</option>
		<option value="0.08">8%</option>
	</select>	

	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php
//wyświeltenie listy informacji, jeśli istnieją
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php 
echo 'Miesięczna kwota kredytu: '. number_format($result, 2, ',', ' ') . " PLN<br>"; 
echo "Całkowita spłata: " . number_format($result * $form['lata']*12, 2, ',', ' ') . " PLN<br>";
echo "Łączne odsetki: " . number_format($result * $form['lata']*12 - $form['kwota'], 2, ',', ' ') . " PLN<br>";
?>
	</p>
<?php } ?>

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>