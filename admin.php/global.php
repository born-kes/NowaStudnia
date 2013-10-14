<?php


define('br',"\n");
define('BR' ,'<br />'.br);
define('BR2' , BR.BR );
//define('SERWER_URL' ,'http://www.bornkes.w.szu.pl/');
define('SERWER_URL' ,'.');

define('T_STATS' 	 ,'`analiza` `a`');				define('S_STATS' 	,' `a` .');
define('T_BAN' 		 ,'`czarna_lista` `cl`');		define('S_BAN' 		,' `cl`.');
define('T_HEX_MAP' 	 ,'`hex_kolor` `hk`');			define('S_HEX_MAP' 	,' `hk`.');
define('T_STATS_RAP' ,'`index_raportow` `ir`');		define('S_STATS_RAP',' `ir`.');	
define('T_ATAK' 	 ,'`list_ataki` `la`');			define('S_ATAK' 	,' `la`.');
define('T_ALLY' 	 ,'`list_plemie` `lp`');		define('S_ALLY' 	,' `lp`.');
define('T_PROX' 	 ,'`list_proxi` `lpr`');		define('S_PROX' 	,' `lpr`.');
define('T_ZADAN' 	 ,'`list_zadan` `lz`');			define('S_ZADAN' 	,' `lz`.');
define('T_USER' 	 ,'`list_user` `lu`');			define('S_USER' 	,' `lu`.');
define('T_POLITYKA'  ,'`polityka` `p`');			define('S_POLITYKA' ,' `p` .');
define('T_WSI' 		 ,'`ws_all` `wa`');				define('S_WSI' 		,' `wa`.');
define('T_RAP_MOBIL' ,'`ws_mobile` `ws`');			define('S_RAP_MOBILNE',' `ws`.');
define('T_RAP_OPIS'  ,'`ws_opis` `wo`');			define('S_RAP_OPIS' ,' `wo`.');
define('T_RAP_WSI' 	 ,'`ws_raport` `wr`');			define('S_RAP_WSI' 	,' `wr`.');


define('SELECT' ,'SELECT ');
define('FROM' ,' FROM ');
define('WHERE' ,' WHERE ');
define('JOIN' ,' LEFT JOIN ');
define('ON' ,'  ON  ');
define('ORDER' ,' ORDER BY ');
define('ASC' ,' ASC ');
define('DESC' ,' DESC ');

define('name' ,' `name` ');
define('id' ,' `id` ');
 include_once(ADMIN . 'f-cje' . PHP);

 include_once(ADMIN . 'serw_config' . PHP);
 include_once(ADMIN . 'conect' . PHP);
 include_once(ADMIN . 't' . PHP);
 include_once(ADMIN . 'head&body' . PHP);
 //connection();
 //destructor();
 
 define('GODZINA_ZERO', 1220000000);
 