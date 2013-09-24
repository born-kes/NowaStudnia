<?php

$listaFuncrion = ListaPlikow(F_CIA);

if( isset($listaFuncrion[$GET['plik']. PHP]) ){
 include(F_CIA . $GET['plik'] . PHP);
}
if( isset($GET['plik']) ){
	switch( $GET['plik'] ){
		case 'test':
			break;
		case 'raport':
			if( isset($GET['dane']) ){
				switch( $GET['dane'] ){
				case 'test':
	
				default:
				break;
			}
			break;
}	
		default:
		break;
	}
}