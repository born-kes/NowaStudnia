<?php

function test($if , $war = false){
//if(!$war);
return $if? ' jest = true' : ' niema = false';
} 
function aut_null($arra){
if(! isset($arra) ) return;
if(! is_array($arra) ) return arra;
$nowaArra=null;
 foreach($arra as $test => $vall){ if( !is_null($vall) ) $nowaArra[$test] = $vall; }
 return $nowaArra;
}

function json($arra ){ if( !is_array($arra) )return;
 $str= '{';
	foreach($arra as $var => $vall){
		if(is_array($vall) ) $str.="$var:".json($vall ).',';
	if(!is_numeric($var) )	
	$str.=(!is_numeric($var)? "$var:'$vall'." : "$var:$vall." );
	}
	
 $str.= '}';
 return $str;
}
function ListaPlikow($local){
		if(!($fd=opendir($local)))echo 'nie moge otworzyc katalogu';
			While(($file=readdir($fd))!=false){if(substr($file,-4)==PHP)$ListaPlikow[$file]=true;}
		closedir($fd);
	return $ListaPlikow;
}
function MUR($m,$max=20,$mini=0){
	if(isset($m) )
		if(is_numeric($m) )
			if($m>=$mini)
				if($m <=$max)
					return true;
	return false;
}
function ilosc_off($woj){
  if(!is_array($woj) ) return false;
  $zag  =  (int)$woj['axe'];
  $zag += ((int)$woj['lk'] *4) + ((int)$woj['kl'] *5);
  $zag += ((int)$woj['tar']*5) + ((int)$woj['kat']*8);
  return $zag;
}
function ilosc_def($woj){
  if(!is_array($woj) ) return false;
  $zag  =  (int)$woj['pik'] + (int)$woj['mie'] + (int)$woj['luk'];
  $zag += ((int)$woj['ck'] *6);
  $zag += ((int)$woj['kat']*8);
  return $zag;
}
function ilosc_zagroda($woj,$zw=true){
 $sum = ilosc_off($woj) + ilosc_def($woj) - ($woj['kat']*8);
 $zw?$sum+=((int)$woj['zw']*2):'';
 return $sum;
}
function przedrostek($from,$select,$styk='.'){
	if(!is_array($select) )		return $from.$styk.$select;
	foreach($select as $sel)	$str[]= przedrostek($from,$sel,$styk);
	return $str;
}
function splaszcz($arry,$separator=','){
// sprawdza czy $arry nie jest zagniezdzone
	if(is_array($arry) )
		for($i = 0; count($arry)>$i; $i++ )
			if(is_array($arry[$i]) ) $arry[$i]=splaszcz($arry[$i],$separator);
	if( is_array($arry) ) 
	return implode($separator , $arry); 
	
	return $arry;
}
function Data2Nowsza($data1=0,$data2=0){
return (strtotime($data1)<strtotime($data2));
}
function Data($data= null ){//  mktime($da[3],$da[4],$da[5],$da[1],$da[0],$da[2])= split("[ .:-]", $data);
	if(is_null($data)) return date('Y-m-d H:i:s');
$data_r 	= explode(' ',$data);
$data_e 	= explode('-',$data_r[0]);
if(strlen($data_e[2])!=4 && strlen($data_e[0])!=4)
	$data_e[2] 	= '20'.$data_e[2];
$data_r[0] 	= implode('-',$data_e);
$data_r 	= implode(' ',$data_r);
return date('Y-m-d H:i:s',strtotime($data_r) );
}
/* Tworzenie $GET zawieraj¹cego POST i GET */
if( is_array($_REQUEST) ){
 $GET = $_REQUEST;
	if( isset($_REQUEST['q']) )
	@list($GET['plik'], $GET['typ'], $GET['dane'], $GET['costam']) = explode("/" , $_REQUEST['q']);
	if( isset($GET['data']) )
	 $GET['data'] = Data($GET['data']);
	if( isset($_SESSION['id_user']) )
	 $GET['id_user']=$_SESSION['id_user'];
	}
$GET =  aut_null($GET);