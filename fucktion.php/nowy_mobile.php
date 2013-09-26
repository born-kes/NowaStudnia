<?php
/*	- Czy raport ma wojska	&&	Czy raport jest nowszy
 *	T:	Czy raport istnieje
 *		F:	Stwórz raport = End
 *		T:	Czy zmieniaj¹ siê procent gotowosci wojsk ( porównanie raportów )
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
