<?php
function connection(){
global $mysql,$BR;
 if(!isSet($mysql['conect'])){ 
    @mysql_connect($mysql['server'], $mysql['admin'], $mysql['pass'])
   or die('Brak po�aczenia z serwerem MySQL.');      // nawiazujemy po�aczenie z serwerem MySQL
    
   $mysql['conect'] = @mysql_select_db($mysql['db'])
    or die('B�ad wyboru bazy danych.');            // �&#65533;czymy si� z baz&#65533; danych
}
}

function destructor(){
global $mysql;
 if(isSet($mysql['conect'])){ $mysql['conect']=NULL; 
	@mysql_close();
	}
 }
