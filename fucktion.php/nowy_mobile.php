<?php
/*	- Czy raport ma wojska	&&	Czy raport jest nowszy
 *	T:	Czy raport istnieje
 *		F:	Stw�rz raport = End
 *		T:	Czy zmieniaj� si� procent gotowosci wojsk ( por�wnanie raport�w )
 *			F:	upDate()	= END
 *			T:	Zapisz nowy 
 *	
 */

 if(isset($GET['procent']) && MUR($GET['procent'],100) ){

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'mobile');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('mobile' , Array(
										'procent'	=> (string)$GET['procent'],
										'id_user'	=> $GET['id_user']
									) 
					)  
	  );
		 
 }else echo 'niema mobile';
