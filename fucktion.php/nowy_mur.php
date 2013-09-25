<?php
(!isset($raport) && isset($GET['id']))?
	$raport = raport((int)$GET['id'] , 'mur'):'';

	if((isset($GET['mur']) && MUR($GET['mur']) ) && Data2Nowsza($raport['data_mur'],$GET['data']) ){					// -- stary mur niema znaczenia --
/*	- Czy mur warto dodawaæ i	Czy GET raport jest nowszy od tego z bazy
 *	F: -> nic nie rób
 *	T: Czy raport jest w bazie?
 *		F: -> dodaj 	=>	zap_Nowy_wpis('mur' , $GET['mur'] )
 *		T: Czy raport jest inny
 *			F: -> upDate('mur');
 *			T: -> Zapisz nowy raport 	=>		zap_Nowy_wpis('mur' , $GET['mur'], false )
 */


	( !isset($raport['data_mur']) && is_null($raport['data_mur']) )?
		 zap_Nowy_wpis('mur' , Array('mur' => $GET['mur']) ):
		
		 $raport['mur'] != $GET['mur']?
			zap_Nowy_wpis('mur' , Array('mur'=>((string)$GET['mur'])) ,false )
			:
			upDate('mur');
    };	// END IF data_mur