<?php

/*
echo sql_dopasuj_zap(
				array(	'budynki'	=>'*'),
				NULL,
				array(
				1=>'de',//Form[0]
				0=>array('location'	=>$GET['location'].' AS name'),
				'location'	=>'de'
					)
				);
//*/
$budynki_BD = sql_queryArray(
				array(	'budynki'	=>'*')
				);
$jednostki_BD = sql_queryArray(
				array(	'jednostki'	=>'*')
				
				);
$manu_BD = ( sql_queryArray('SELECT * FROM `menu`') );


define('plemiona',"../plemiona/");
define('img',plemiona."img/");
head('title','Kalkulator do Plemion');
head('meta','text/html; charset=UTF-8');
head('css',		plemiona.'css/game.css?1');
head('css',		plemiona.'css/test.css?2');
head('script',	plemiona.'js/kalkulator.js');
head('script',	plemiona.'js/game.js');
head('script',	plemiona.'js/building_main.js');
head('script',	plemiona.'js/QuestArrows.js');
head('Wscript',	'
function rozbuduj(id){
gid(id).value = (gid(id).value*1)+1;
return false;
}');
body('kalkulator_game');

# print_r($budynki);
# print_r($jednostki);
# print_r($manu);

function jednostki($index,$nag³owek = true){
global $jednostki_BD,$budynki_BD;
/* sprawdz które jednostki mam wstawiæ 
 * 
 */

if($nag³owek)
	$str='
	<table><tbody><tr>
				<th >'.t('Jednostka').'</th>
		<th colspan="4">'.t('Zapotrzebowanie').'</th>
		<th width="100" class="nowrap">'.t('Czas').'  (gg:mm:ss)</th>
		<th class="nowrap">'.t('W wiosce').'/'.t('ogólnie').'</th>
				<th>'.t('Rekrutacja').'</th>
	</tr>';
	
$str.='<tr id="'.$budynki_BD[$index]['de'].'_fin" class="nowrap"><td></td><tr>';
														
	foreach($jednostki_BD as $r){
	if($r['budynek']==$index)
$str.='<tr class="row_a">
			<td class="nowrap">
				<a onclick="return false" class="unit_link" href="#">
				<img class="" alt="" title="" src="'.img.'unit_'.$r['de'].'.png">
'.t($r['de']).'				
				</a>
			</td>
			<td class="nowrap"><span class="icon header wood"> </span> 50</td>
			<td class="nowrap"><span class="icon header stone"> </span> 30</td>
			<td class="nowrap"><span class="icon header iron"> </span> 10</td>
			<td class="nowrap"><span class="icon header population"> </span> 1</td>
			<td><span id="t_'.$r['skrot'].'">?:?</span></td>

			<td>0/0</td>
							<td class="nowrap">
				<input type="text" tabindex="1" maxlength="5" style="width: 50px; color: black;" id="'.$r['de'].'" class="recruit_unit" name="'.$r['de'].'" onchange="wojsko()" >
								<a href="javascript:unit_build_block.set_max(\''.$r['de'].'\')" id="'.$r['de'].'_0_a">(1200)</a>
			</td>
		
		</tr>';
}
if($nag³owek)
	 $str.='</tbody></table>';
return $str;
}
function budy($arry=null,$index=1){$fin='';
if( is_array($arry))
	foreach($arry as $name){}
	
global $budynki_BD,$ratusz;

	if(isset($ratusz['nagluwek']) )
$fin.=	strtr($ratusz['nagluwek'] , array('{img}'=> img,) );
foreach($budynki_BD as $r){
	if(isset($ratusz['content']) )
$fin.=	strtr($ratusz['content'] , array(	
											'{img}'=> img ,
											'{de}' => $r['de'],
											'{smol_de}'=> strtolower($r['de'])
											)
				);
					
	if(isset($r['function']) && $r['function']!=NULL && function_exists($r['function']))
$fin.=	strtr($ratusz['function'] ,array('{function}'=> $r['function']($r['id'])) );

$index++;
}
$fin.=	$ratusz['stopka'];
return $fin;

  }

function plac($index,$nag³owek = true){
global $jednostki_BD,$plac; $linia=0;$strs=array('','','');
/* sprawdz które jednostki mam wstawiæ 
 * 
 */
$myk=1;

//$str.='<tr id="'.$budynki[$index]['de'].'_fin" class="nowrap"><td></td><tr>';
		//<tr class="row_a">												
	foreach($jednostki_BD as $r){
if($myk!=$r['budynek']){$linia=0;$myk=$r['budynek'];}
	
$strs[$linia++] .=strtr($plac['content'] , array(	
											'{img}'=> img ,
											'{de}' => $r['de']
											)
				);

}
if($nag³owek)
	$str=$plac['nagluwek'];
	foreach($strs as $r){
	$str.='<tr class="row_a">'.$r.'</tr>';
	}
	 $str.=$plac['content2'];
if($nag³owek)
	 $str.=$plac['stopka'];
return $str;
}