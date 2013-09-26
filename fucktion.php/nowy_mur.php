<?php
/*	- Czy mur warto dodawaæ i	Czy GET raport jest nowszy od tego z bazy
 *	F: -> nic nie rób
 *	T: Czy raport jest w bazie?
 *		F: -> dodaj 	=>	zap_Nowy_wpis('mur' , $GET['mur'] )
 *		T: Czy raport jest inny
 *			F: -> upDate('mur');
 *			T: -> Zapisz nowy raport 	=>		zap_Nowy_wpis('mur' , $GET['mur'], false )
 */

if(isset($GET['mur']) && MUR($GET['mur']) ){

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'mur');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('mur' , Array(
										'mur'	=> (string)$GET['mur']					
									) 
					)  
	  );
		 
 }else echo 'niema mur';