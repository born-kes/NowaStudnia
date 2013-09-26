<?php
/*	- Czy status warto dodawaæ i	Czy GET raport jest nowszy od tego z bazy
 *	F: -> nic nie rób
 *	T: Czy raport jest w bazie?
 *		F: -> dodaj 	=>	zap_Nowy_wpis('status' , $GET['status'] )
 *		T: Czy raport jest inny
 *			F: -> upDate('status');
 *			T: -> Zapisz nowy raport 	=>		zap_Nowy_wpis('status' , $GET['status'], false )
 */

if(isset($GET['status']) && MUR($GET['status'],7) ){

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'status');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('status' , Array(
										'status'	=> (string)$GET['status']					
									) 
					)  
	  );
		 
 }else echo 'niema status';