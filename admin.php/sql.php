<?php
/* 
//define('' ,'``');
sql_dopasuj_zap(	Arry (Nazwa Tablicy=> NazwaKolumny,NazwaKolumny,...),
					array(
					where('ws_wsi'=>'id',$GET['id'],$porownanie) // domyslnie $porownanie '='
					),
					array(	// join left
					Nazwa Tablicy	=> NazwaKolumny,
					Nazwa Tablicy	=> NazwaKolumny,			problem z powiazaniem.
					)
				);
*/
/*
sql_dopasuj_zap(
				## from i select
				array( // zmienic nazwa pola data
					'ws_all'	=>'*'
					),
				## where
				array(
					where(array('ws_all'=>'id'),$id)
					),
				## jonin( Select, polonczenie)
				array(
				0=>array(
					'ws_raport'	=>'*',
					'ws_mobile'	=>'*',
					'ws_typ'	=>'*',
					'ws_mur'	=>'*',
					'ws_opis'	=>'*',
					'ws_zwiad'	=>'*',
					'ws_status'	=>'*'
					),
					'ws_raport'	=>'id',
					'ws_mobile'	=>'id',
					'ws_typ'	=>'id',
					'ws_mur'	=>'id',
					'ws_opis'	=>'id',
					'ws_zwiad'	=>'id',
					'ws_status'	=>'id'
					),
				## Zap
					// nie opisana regula
				);
	# http://localhost/nowaStudnia/raport/all&id=61
	return "SELECT ws_all.*,ws_raport.*,ws_mobile.*,ws_typ.*,ws_mur.*,ws_opis.*,ws_zwiad.*,ws_status.* 
			FROM ws_all 
			left join ws_raport ON ws_all.id=ws_raport.id 
			left join ws_mobile ON ws_all.id=ws_mobile.id 
			left join ws_typ ON ws_all.id=ws_typ.id 
			left join ws_mur ON ws_all.id=ws_mur.id 
			left join ws_opis ON ws_all.id=ws_opis.id 
			left join ws_zwiad ON ws_all.id=ws_zwiad.id 
			left join ws_status ON ws_all.id=ws_status.id 
			WHERE ws_all.id=61 "
 */
function sql_query($zap){
		if(!isset($zap) ) return false;
	connection();  
	$result = mysql_query($zap);
	$efekt = @mysql_fetch_array($result);
	return $efekt;
}



/*	// function => f-cia.php
 *	// function przedrostek($from,$arry,$styk='.')	np. return "$from . $arry[1]"
 *	// function splaszcz($arry,$separator=',') 		np. return "$arry[0],$arry[1]"...
 *	// echo count($from).print_r($from).BR;
 *
 */
# pobiera tablice i sp³aszcza j¹ 
function select($froms,$separator=',',$efekt=''){
if(is_array($froms)){
//Sprawdza czy $from niejest zagniezdzone

	foreach($froms AS $from => $select){
	
		if(is_array($select) ){
		foreach($select AS $form_one)
			 $efekt[] = select(array($from=>$form_one),$separator);
	}else
	
		if(!is_numeric($from) )
			$efekt[] = przedrostek($from,$select);
		else
			$efekt[] = $select;
	}
	return splaszcz($efekt,$separator);
  }
  return $froms;//co to jest??!!=> przedrostek($froms,$select);
}
# generuje 'left join '.$name.'	ON '.$zaczep.'='.przedrostek( $name,$where)'
function buduj_left_join($zaczep,$left_join,$str=''){
 if(is_array($left_join) )
	foreach($left_join AS $name => $where)
		if(!is_numeric($name) )
			$str .=' left join '.$name.'	ON '.$zaczep.'='.przedrostek( $name,$where).br;
 return $str;
}
# Montuje w zapytaniu $argument1.$separator .$argument2
function where($argument1, $argument2, $separator='='){
	$argument1 = select($argument1,'');
	if(!is_numeric($argument2) )
		$argument2 = "'".addslashes($argument2)."'";

	return $argument1.$separator .$argument2;
}
# Generuje du¿e zapytania
function sql_dopasuj_zap($from_select,$where, $left_join='',$zap=''){
 if(is_array($from_select) ){
 	foreach($from_select AS $from => $select){
		$FROMS[]=$from;	}
	$FROM=splaszcz($FROMS,', ');

	if(is_array($left_join) && isset($left_join[0]) )
		$SELECT=select($from_select+$left_join[0]);
	else
		$SELECT=select($from_select);
$zap=''.  
'SELECT '.$SELECT
 .br.
'FROM '.$FROM 
 .br;
 if(isset($left_join[1]) )$zap.= buduj_left_join(przedrostek($FROMS[0],$left_join[1]),$left_join);
 else $zap.=buduj_left_join(przedrostek($FROMS[0],'id'),$left_join); 
	
if(isset($where) && !is_NULL($where) ) $zap.= 
'WHERE '.splaszcz($where,' AND ');
}
return $zap;
}
# generuje podstawowe zapytania do raportów
function raport($where,$typ='all'){
$BD = array('raport'=>1,
			'mobile'=>1,
			'typ'=>1,
			'mur'=>1,
			'opis'=>1,
			'zwiad'=>1,
			'status'=>1,
			);			
 if( isset($BD[$typ]) ){
	if( isset($where) ){
		return sql_query(
				sql_dopasuj_zap(
					array('ws_'.$typ =>'*'),
					where( array('ws_'.$typ=>'id'),$where)
								)
						);
	}// end if $where
 }
// echo sql_zap_raport_all($where);
	if($typ=='all')
	return sql_query(sql_zap_raport_all($where) );
	
	
 
	/*	
	switch( $typ ){
		case 'zw':
		$baz= 'ws_zwiad'
			break;
		case 'mobilne':
			$baz= 'ws_mobile'
			break;
		default:
		return;
		break;
					if(! function_exists('function_name_'.$typ) ) 	return false;	*/
}
# generuje wielo poziomowe zapytanie do wszystkich tablic
function sql_zap_raport_all($id){
 if(!is_numeric($id) )return;
$id=(int)$id;
return sql_dopasuj_zap(
				array( // zmienic nazwa pola data
					'ws_all'	=>'*'
					),
				array(
					where(array('ws_all'=>'id'),$id)
					),
				array(
				0=>array(
					'ws_raport'	=>'*',
					'ws_mobile'	=>'*',
					'ws_typ'	=>'*',
					'ws_mur'	=>'*',
					'ws_opis'	=>'*',
					'ws_zwiad'	=>'*',
					'ws_status'	=>'*'
					),
					'ws_raport'	=>'id',
					'ws_mobile'	=>'id',
					'ws_typ'	=>'id',
					'ws_mur'	=>'id',
					'ws_opis'	=>'id',
					'ws_zwiad'	=>'id',
					'ws_status'	=>'id'
					)
				);
}
# generuje INSERT INTO albo UPDATE 
function zap_Nowy_wpis($form, $value=Array(), $nowy=true){
if(!isset($form) ) return;
	$from = 'ws_'.$form;

global $GET;
if(	!isset($GET['id'])  || !is_numeric($GET['id']) ) return;
if(	!isset($GET['data'])  ) $GET['data']=Data();

if( !is_array($value)) return false;
	$value['data_'.$form]=$GET['data'];
if( !isset($value['id']) && $nowy)
	$value['id']=$GET['id'];
	
	if($nowy)
		$zapytanie = "INSERT INTO ".$from." SET ".drukowanie_tablicy($value);
	else	
        $zapytanie = "UPDATE ".$from." SET ".drukowanie_tablicy($value). " Where id=".$GET['id'];

  echo  $zapytanie;            
// Spis wymaganych pol;
}
# generuje nowy wpis do tabeli opis
function zap_opis($str){
 return zap_Nowy_wpis('opis' , Array( 'opis' => $str) );
}
# sprawdza czy jest tyle samo danych i pól do zapisania oraz ich gettype
function test_zgododnosci($dane,$pola){
if(count($dane) == count($pola) )
	foreach($pola AS $nazwa => $wartosc)
		if(isset($dane[$nazwa]) )
			if(gettype($dane[$nazwa])==$wartosc)
				return true;						//string integer
return false;
}
		// sprawdziæ null jaki zwraca gettype 
# generuje bezpieczne zapytania
function drukowanie_tablicy($arry,$array=''){
foreach($arry AS $name => $value)
	$array[]="`$name` = ".(!is_numeric($value) ? "'".addslashes($value)."'": "'".$value."'");
 return splaszcz($array);
}
# Function upDate() w bazie aktualizuje tylko datê
function upDate( $name ,$arra=Array(),$nowy=false){
if(! isset($name))
	return;//	return sql_query()
return zap_Nowy_wpis($name , $arra , $nowy);	
// Sam dodaje GET[id] i GET[date]	 
}
function upDateRaport($name, $arra=Array() ){
global $raport,$GET;
if( !(isset($GET['data']) && Data2Nowsza( $GET['data'],Data() ) ) )return;

 # czy raport w bazie istnieje?
 if(isset($raport['data_'.$name]) && !is_null($raport['data_'.$name])){

	if( Data2Nowsza($raport['data_'.$name],$GET['data']) && is_array($arra) ){	
		if( czyJestRoznica($arra,$raport) )
			upDate( $name ,$arra);
		else
			upDate( $name );
	 }

 }else{
 return upDate( $name ,$arra,true);
 }
}
function sql_queryArray($from_select,$where=NULL, $left_join='',$zap=''){
$zap=sql_dopasuj_zap($from_select,$where, $left_join,$zap);
$efekt=NULL;
		if(!isset($zap) ) return false;
	connection();  
	$result = mysql_query($zap);

while( $r = @mysql_fetch_array($result) ){
$efekt[]=$r;
}
	return $efekt;
}