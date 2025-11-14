<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// Kontroler podzielono na część definicji etapów (funkcje)
// oraz część wykonawczą, która te funkcje odpowiednio wywołuje.
// Na koniec wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy  przez zmienne.

//pobranie parametrów
function getParams(&$form){
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $form['lata'] = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
    $form['op'] = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwota']) && isset($form['lata']) && isset($form['op']) ))	return false;	
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty kredytu';
	if ( $form['lata'] == "") $msgs [] = 'Nie podano liczby lat';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['lata'] )) $msgs [] = 'Druga wartość nie jest liczbą';
	}
	
	if ($form['op'] != '0.05'
	    && $form['op'] != '0.06'
	    && $form['op'] != '0.07'
	    && $form['op'] != '0.08' )
	{ $msgs [] = 'Złe oprocentowanie';}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['kwota'] = floatval($form['kwota']);
	$form['lata'] = floatval($form['lata']);
	$form['op'] = floatval($form['op']);
	$obliczenia = $form['kwota'] * (($form['op']/12) / (1- pow(1 + ($form['op']/12), -$form['lata'] *12)));
	
	
	//wykonanie operacji
	switch ($form['op']) {
	    case '0.05' :
	        $result = $obliczenia;
	        break;
	    case '0.06' :
	        $result = $obliczenia;
	        break;
	    case '0.07' :
	        $result = $obliczenia;
	        break;
	    case '0.08' :
	        $result = $obliczenia;
	        break;
	}
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
//domyślnie pokazuj wstęp strony (tytuł i tło)
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

//Wywołanie widoku, wcześniej ustalenie zawartości zmiennych elementów szablonu
$page_title = 'Zadanie 03';
$page_description = 'Kalkulator kredytowy zrealizowany metodą prostego szablonowania z przykładu 1';
$page_header = 'Widok uproszczony';
$page_footer = 'Przykładowa tresć stopki wpisana do szablonu z kontrolera';

include 'calc_view.php';