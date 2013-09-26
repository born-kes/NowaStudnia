<?php
/*	- Czy raport ma wojska	&&	Czy raport jest nowszy
 *	T:	Czy raport istnieje
 *		F:	Stwórz raport = End
 *		T:	Czy zmieniaj¹ siê ilosc wojsk ( porównanie raportów )
 *			F:	upDate()	= END
 *			T:	Zapisz nowy 
 *	
 */

 if(isset($GET['w']) ){

 if(!isset($W) )
@list($W['pik'],$W['mie'],$W['axe'],$W['luk'],$W['zw'],$W['lk'],$W['kl'],$W['ck'],$W['tar'],$W['kat'],$W['ry'],$W['sz'])= explode(",",$GET['w']);

if(!isset($raport) && isset($GET['id']))
	$raport = raport((int)$GET['id'] , 'raport');

# -- Kontrola czy zmienimy raport
	if( upDateRaport('raport' , $W + Array(
										'id_user'	=> $GET['id_user']
									) 
					)  
	  );
		 
 }else echo 'niema raport';
