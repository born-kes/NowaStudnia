<?php
/*	- Czy typ warto dodawaæ i	Czy GET raport jest nowszy od tego z bazy
 *	F: -> nic nie rób
 *	T: Czy raport jest w bazie?
 *		F: -> dodaj 	=>	zap_Nowy_wpis('typ' , $GET['typ'] )
 *		T: Czy raport jest inny
 *			F: -> upDate('typ');
 *			T: -> Zapisz nowy raport 	=>		zap_Nowy_wpis('typ' , $GET['typ'], false )
 */

if(isset($GET['typ']) && MUR($GET['typ'],7) ){

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'typ');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('typ' , Array(
										'typ'	=> (string)$GET['typ']					
									) 
					)  
	  );
		 
 }else echo 'niema typ';