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

function sql_nazwa($name){
	return sql_dopasuj_zap(	array('ws_wsi'	=>'id'),
					where(array(T_USER=>'id'),$name)
				);
}
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
function select($from,$separator=',',$efekt=''){
if(is_array($from)){
//Sprawdza czy $from niejest zagniezdzone

	foreach($from AS $from => $select){
	
		if(is_array($select) ){
		foreach($select AS $form_one)
			 $efekt[] = select($form_one,$separator);
	}else
	
		if(!is_numeric($from) )
			$efekt[] = przedrostek($from,$select);
		else
			$efekt[] = $select;
	}
	return splaszcz($efekt,$separator);
  }
  return przedrostek($from,$select);
}
function buduj_left_join($zaczep,$left_join,$str=''){
 if(is_array($left_join) )
	foreach($left_join AS $name => $where)
		if(!is_numeric($name) )
			$str .=' left join '.$name.'	ON '.$zaczep.'='.przedrostek( $name,$where).br;
 return $str;
}
function where($argument1, $argument2, $separator='='){
	$argument1 = select($argument1,'');
	if(!is_numeric($argument2) )
		$argument2 = "'".addslashes($argument2)."'";

	return $argument1.$separator .$argument2;
}
function sql_dopasuj_zap($from_select,$where, $left_join='',$zap=''){
 if(is_array($from_select) ){
 	foreach($from_select AS $from => $select)
		$FROMS[]=$from;	
	$FROM=splaszcz($FROMS,', ');

	if(is_array($left_join) )
		$SELECT=select($from_select+$left_join[0]);
	else
		$SELECT=select($from_select);

	
 
$zap=''.  
'SELECT '.$SELECT
 .br.
'FROM '.$FROM 
 .br.
buduj_left_join(przedrostek($FROMS[0],'id'),$left_join); 
	
if(isset($where) ) $zap.= 
'WHERE '.splaszcz($where,' AND ');
}
return $zap;
}
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
function sql_zap_raport_all($id){ if(!is_numeric($id) )return;
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
function zap_opis($str){
 return zap_Nowy_wpis('opis' , Array( 'opis' => $str) );
}

function test_zgododnosci($dane,$pola){
if(count($dane) == count($pola) )
	foreach($pola AS $nazwa => $wartosc)
		if(isset($dane[$nazwa]) )
			if(gettype($dane[$nazwa])==$wartosc)
				return true;						//string integer
return false;
}
		// sprawdziæ null jaki zwraca gettype 
		
function drukowanie_tablicy($arry,$array=''){
foreach($arry AS $name => $value)
	$array[]="`$name` = ".(!is_numeric($value) ? "'".addslashes($value)."'": "'".$value."'");
 return splaszcz($array);
}

# -- Function upDate() w bazie aktualizuje tylko datê
function upDate( $name ){

return isset($name)?//	return sql_query()
	zap_Nowy_wpis($name , Array() , false):'no';
			 
}
