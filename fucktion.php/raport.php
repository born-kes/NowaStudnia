<?php/*zapytanie o wioskev	poka� raport => jaki => GET[typ]nowy raport => co pobra� by por�wna� if(MUR(,21) )echo 'jest'; else echo 'niema';*///echo function_exists($test); // function sprawdza czy funcia istniejeif(isset($GET['typ']) && isset($GET['id']) ){	$raport = raport((int)$GET['id'],$GET['typ']);if(isset($raport) && isset($GET['dane']) && $GET['dane']=='json' ){  headJSON(); $json.=json($raport); body_js('var json='. json($raport) ); }else if( isset($raport) )body('raport');}//print_r($raport);