<?php
/*	- Czy Zwiad warto dodawaæ i	Czy GET raport jest nowszy od tego z bazy
 *	F: -> nic nie rób
 *	T: Czy raport jest w bazie?
 *		F: -> dodaj 	=>	zap_Nowy_wpis('Zwiad' , $GET['Zwiad'] )
 *		T: Czy raport jest inny
 *			F: -> upDate('Zwiad');
 *			T: -> Zapisz nowy raport 	=>		zap_Nowy_wpis('Zwiad' , $GET['Zwiad'], false )
 */

if(isset($GET['Zwiad']) ){

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'Zwiad');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('Zwiad' , Array(
										'Zwiad'	=> (string)$GET['Zwiad']					
									) 
					)  
	  );
		 
 }else echo 'niema Zwiad';