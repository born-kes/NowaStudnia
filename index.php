<?php session_start();
define('PHP',".php");
define('ADMIN',"admin.php/");
define('F_CIA',"fucktion.php/");
define('SKURKI',"skurki.php/");

 include_once(ADMIN . 'global' . PHP);

 if(!isSet($_SESSION['zalogowany'])){	// Nie zalogowany
   if( !empty($_GET['js']) ){  			// w przypadku proszenia o js zwraca puste 
		$Wyglad['header']="Content-type: text/javascript";
										//header('Content-type: text/json');
										//header('Content-type: application/json');
   }
   elseif($_GET['q']=='game'){
define('GAME',"game.php/");

include_once(GAME . "game" . PHP);
}

   else{

	 if( !empty($_POST['user']) ){  		// Pruba logowania
		include_once(F_CIA . 'logowanie' . PHP);
	 }
	// else unset($_SESSION['komunikat']);
	 head('meta','text/html; Charset=iso-8859-2');//text/html; charset=UTF-8
	 body('logowanie');

   }
 }
 elseif( isSet($_SESSION['zalogowany']) ){// Zalogowany 
	if( !empty($_GET['q']) ){ 

		include_once(ADMIN . 'analiza' . PHP);	
	}
	else{
		body('logowanie_sukces');
	}
 }
  destructor();

 include_once( 'wczytaj_skurke' . PHP);
