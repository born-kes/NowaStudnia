<?php

$HEAD['script'][1]=	'<script src="';									$HEAD['script'][2]='"></script>'.br;
$HEAD['css'][1]=	'<link rel="stylesheet" type="text/css" href="';	$HEAD['css'][2]='" />'.br;
$HEAD['meta'][1]=	'<meta http-equiv="Content-Type" content="';		$HEAD['meta'][2]='" />'.br;
$HEAD['title'][1]=	'<title>';											$HEAD['title'][2]='</title>'.br;

$HEAD['Wscript'][1]='<script type="text/javascript">';				$HEAD['Wscript'][2]='</script>'.br;
$HEAD['Wcss'][1]=	'<style type="text/css">';						$HEAD['Wcss'][2]='</style>'.br;
$Wyglad['typ']['standard']=true;
$Wyglad['typ']['json']=false;
function HEAD_arry($typ , $link){
	if( is_array($link) ){
		foreach($link as $link_one){ HEAD_arry($typ , $link_one); }
	}else{
  global $HEAD;
		echo $HEAD[$typ][1] . $link . $HEAD[$typ][2];
	}
}		

function head($tytle,$wal){
 global $Wyglad;
  switch( $tytle ){
  case 'script':
	$Wyglad['head']['script'][]=$wal;
	return true;
  case 'css':
	$Wyglad['head']['css'][]=	$wal;
	return true;
  case 'meta':
	$Wyglad['head']['meta'][]=	$wal;
	return true;
  case 'title':
	$Wyglad['head']['title'][]=	$wal;
	return true;
  case 'Wscript':
	$Wyglad['head']['Wscript'][]=$wal;
	return true;
  case 'Wcss':
	$Wyglad['head']['Wcss'][]=	$wal;
	return true;
  default:
	return false;
  }	
}
function body($wal){
 global $Wyglad;
	$Wyglad['body'][]=$wal;
 
}
function body_js($wal){
 global $Wyglad;
	$Wyglad['js'][]=$wal;
 
}
function headStandard(){
 global $Wyglad;
$Wyglad['typ']['standard']=true;
$Wyglad['typ']['json']=false;
		head('script','http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
		head('script','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js');
		//head('css','/ww.admin/theme/admin.css');
		head('css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/south-street/jquery-ui.css');
		head('meta','text/html; charset=iso-8859-2');//utf-8
	return true;
}
function headJSON(){
 global $Wyglad;
$Wyglad['typ']['standard']=false;
$Wyglad['typ']['json']=true;
}