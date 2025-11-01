<?php
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$oprocentowanie){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$oprocentowanie = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$lata,&$oprocentowanie,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $lata == "") {
	$messages [] = 'Nie podano liczby lat';
}

if ($oprocentowanie != '0.05'
&& $oprocentowanie != '0.06'
&& $oprocentowanie != '0.07'
&& $oprocentowanie != '0.08' )
 { $messages [] = 'Złe oprocentowanie';}


	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;

	// sprawdzenie, czy $kwota i $lata są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Liczba lat nie jest liczbą całkowitą';
	}	


	if (count ( $messages ) != 0) return false;
	else return true;

}


function process(&$kwota,&$lata,&$oprocentowanie,&$messages,&$result){
	global $role;

	$kwota = intval($kwota);
	$lata = intval($lata);
	$oprocentowanie = floatval($oprocentowanie);
	$obliczenia = $kwota * (($oprocentowanie/12) / (1- pow(1 + ($oprocentowanie/12), -$lata *12)));
	
	//wykonanie operacji
	switch ($oprocentowanie) {
		case '0.05' :
			if ($role == 'admin') {
			$result = $obliczenia;
			} else {
				$messages [] = 'Oprocentowanie 5% dostępne tylko dla administratora!';
			} break;
		case '0.06' :
			if ($rolu == 'admin') {
			$result = $obliczenia;
			} else {
				$messages [] = 'Oprocentowanie 6% dostępne tylko dla administratora!';
			} break; 
		case '0.07' :
			$result = $obliczenia;
			break;
		case '0.08' :
			$result = $obliczenia;
			break;
	}
}



//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$oprocentowanie = null;
$result = null;
$messages = array();

getParams($kwota,$lata,$oprocentowanie);
if ( validate($kwota,$lata,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwota,$lata,$oprocentowanie,$messages,$result);
}


// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$lata,$oprocentowanie,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';