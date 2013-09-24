<?php
function connection(){
global $mysql,$BR;
 if(!isSet($mysql['conect'])){ 
    @mysql_connect($mysql['server'], $mysql['admin'], $mysql['pass'])
   or die('Brak po³aczenia z serwerem MySQL.');      // nawiazujemy po³aczenie z serwerem MySQL
    
   $mysql['conect'] = @mysql_select_db($mysql['db'])
    or die('B³ad wyboru bazy danych.');            // ³&#65533;czymy siê z baz&#65533; danych
}
}

function destructor(){
global $mysql;
 if(isSet($mysql['conect'])){ $mysql['conect']=NULL; 
	@mysql_close();
	}
 }
