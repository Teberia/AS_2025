<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

use Smarty\Smarty;

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
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['lata'] )) $msgs [] = 'Druga wartość nie jest liczbą';
	}

	    if ($form['kwota'] <= 0) $msgs[] = 'Kwota musi być większa od zera';
        if ($form['lata'] <= 0)  $msgs[] = 'Liczba lat musi być większa od zera';
	
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
	
// konwersja parametrów
$kwota = (float) $form['kwota'];
$lata  = (float) $form['lata'];
$op    = (float) $form['op'];

// obliczenia
$result = $kwota * (($op/12) / (1 - pow(1 + ($op/12), -$lata * 12)));
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

if (isset($result)) {
    $smarty->assign('miesieczna', number_format($result, 2, ',', ' '));
    $smarty->assign('calkowita', number_format($result * $form['lata'] * 12, 2, ',', ' '));
    $smarty->assign('odsetki', number_format($result * $form['lata'] * 12 - $form['kwota'], 2, ',', ' '));
}

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 03');
$smarty->assign('page_description','Kalkulator kredytowy zrealizowany wykorzystując bibliotekę Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');