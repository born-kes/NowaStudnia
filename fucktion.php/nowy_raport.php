<?php /* zapytanie o wioskev	poka� raport => jaki => GET[typ]nowy raport => co pobra� by por�wna�*//*  WARZNE Function * Data($GET['data']); * Data2Nowsza($data1 < $data2) * zap_Nowy_wpis($from, $Array_values, $nowy=true){ * * function_exists($test); -- function sprawdza czy funcia istnieje *//*	Tablica zwracana przez raport($typ,$id)0:id_wsi:			ws_all1:wlasnosc:			ws_all2:id:			ws_raport3:data_raport:	ws_raport4:pik:			ws_raport5:mie:			ws_raport6:axe:			ws_raport7:luk:			ws_raport8:zw:			ws_raport9:lk:			ws_raport10:kl:			ws_raport11:ck:			ws_raport12:tar:			ws_raport13:kat:			ws_raport14:ry:			ws_raport15:sz:			ws_raport16:player:		ws_raport		=> id USERA17:data_mobile:		ws_mobile18:procent:			ws_mobile	=> function procent ilosci wojsk (co zosta�o) / (max ~22000) = % zagrody19:donos:			ws_mobile	=> id USERA20:typ_data:	ws_typ21:typ:			ws_typ			=> OFF	policzony u urzytkownika 22:mur_data:		ws_mur23:mur:				ws_mur		=> policzony u u�ytkownika24:opis_data:	ws_opis25:opis:		ws_opis			=> efekt ataku26:status_data:		ws_status27:status:			ws_status	=> OBRONA policzony u u�ytkownika 28:zwiad_data:	ws_zwiad		=> godzina powrotu 	29:ile: 		ws_zwiad		porownanie daty mobilne // raport nowszyKoniec */if(isset($GET['w']) )@list($W['pik'],$W['mie'],$W['axe'],$W['luk'],$W['zw'],$W['lk'],$W['kl'],$W['ck'],$W['tar'],$W['kat'],$W['ry'],$W['sz'])= explode(",",$GET['w']);	# -- Kluczowa kontrola -- 	#  ID wioski jest niezbendne if(isset($GET['id']) ){	# -- Pobranie Raportu z BD jesli jeszcze niemaif(!isset($raport) )	$raport = raport((int)$GET['id'] , $GET['typ']); //* Dla test�w skryptuif(!isset($GET['data']) ) $GET['data']=date('Y-m-d H:i:s',time()-60);  //*/ /* Por�wnanie �rude�  * - Sprawdza czy Stary raport nie jest Lepszy  *		- Data nowo nades�anego  *		- Data Zapisanego BD  *  *		- ZW - je�li zwiad w drodze do doda�  *			- Function Sprawdz zwiad w drodze dla wioski ( ID )  *		- Wojsko Mobilne   *			- Procent liczony w przegl�darce  *			- Function Sprawdza Wojsko w drodze dla wioski ( ID )  *  *		- Typ wioski jesli sie zmieni ��daj potwierdzenia ?  */ 	# -- Mobile	Sprawdz Zapisany PROCENT wojsk -- #	if( isset($GET['procent']) )			include(F_CIA .'/nowy_mobile'.PHP);	# -- MUR	Sprawdza Zapisany Stan -- #	if( isset($GET['mur']) )				include(F_CIA .'/nowy_mur'.PHP);	# -- RAPORT	Sprawdzanie Zapisane Wojska w Wiosce --# 	if(isset($GET['w']) && is_array($W) )	include(F_CIA .'/nowy_wioska'.PHP);		# -- TYP	Ocena i Sprawdzenie Typu Wioski --#  	if( isset($GET['rodzaj']) )		include(F_CIA .'/nowy_typ'.PHP);		# -- STATUS	Ocena i Sprawdzenie Typu Wioski --#  	if( isset($GET['status']) )		include(F_CIA .'/nowy_status'.PHP);		# -- Sprawdzanie i Zapisanie Ilosci teoretycznej ilo�ci Zwiadu -- #		if( isset($GET['zwiad']) )		include(F_CIA .'/nowy_zwiad'.PHP);		if(isset($GET['zw']) && Data2Nowsza($raport['data_zwiad'],$GET['data']) ){					// sprawdzi� ruchy wojsk czy doda� czy nie dodawa�unset($efekt);		if($GET['zw'])		$efekt['zw'] = $GET['zw'];		isset($efekt)?// zmieni� dane	zap_Nowy_wpis('zwiad' ,$efekt):'';	    };	// END IF data_zwiad						 	# -- Metoda podania Efektu -- if(isset($raport) && isset($GET['ajax']) && $GET['ajax']=='json' ){   headJSON();  body_js('var json='. json($raport) );  }else if( isset($raport) ){ body('raport'); }}