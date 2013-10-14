<?php
$budynki = ( sql_queryArray('SELECT * FROM `budynki`') );
$jednostki = ( sql_queryArray('SELECT * FROM `jednostki`') );
$manu = ( sql_queryArray('SELECT * FROM `menu`') );


define('plemiona',"../plemiona/");
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
global $jednostki,$budynki;
/* sprawdz które jednostki mam wstawiæ 
 * 
 */

if($nag³owek)
	$str='
	<table><tbody><tr>
				<th >Jednostka</th>
		<th colspan="4">Zapotrzebowanie</th>
		<th width="100" class="nowrap">Czas  (gg:mm:ss)</th>
		<th class="nowrap">W wiosce/ogólnie</th>
				<th>Rekrutacja</th>
	</tr>';
	
$str.='<tr id="'.$budynki[$index]['name'].'_fin" class="nowrap"><td></td><tr>';
														
	foreach($jednostki as $r){
	if($r['budynek']==$index)
$str.='<tr class="row_a">
			<td class="nowrap">
				<a onclick="return false" class="unit_link" href="#">
				<img class="" alt="" title="" src="img/unit_'.$r['img'].'.png">
'.$r['name'].'				
				</a>
			</td>
			<td class="nowrap"><span class="icon header wood"> </span> 50</td>
			<td class="nowrap"><span class="icon header stone"> </span> 30</td>
			<td class="nowrap"><span class="icon header iron"> </span> 10</td>
			<td class="nowrap"><span class="icon header population"> </span> 1</td>
			<td><span id="t_'.$r['skrot'].'">?:?</span></td>

			<td>0/0</td>
							<td class="nowrap">
				<input type="text" tabindex="1" maxlength="5" style="width: 50px; color: black;" id="'.$r['skrot'].'" class="recruit_unit" name="'.$r['name'].'" onchange="wojsko()" >
								<a href="javascript:unit_build_block.set_max(\''.$r['name'].'\')" id="'.$r['name'].'_0_a">(1200)</a>
			</td>
		
		</tr>';
}
	return $str.='</tbody></table></div>';

}
function budy($arry=null,$index=1){
if( is_array($arry))
	foreach($arry as $name){}
	
global $budynki;
$ratusz='<table class="vis nowrap"><tbody>
<tr>
			<th>Budynki</th>
			<th colspan="4">Zapotrzebowanie</th>
			<th width="100">Czas budowy <img width="13" height="13" src="img/questionmark.png" class="tooltip" alt=""></th>
			<th style="width:100px;">Wybuduj</th>
			<th style="width:100px;">Burzenie</th>
		</tr>';
foreach($budynki as $r){
$ratusz.='<tr id="buildrow_'.$r['id'].'">
			  <td><input type="text" onchange="suma();" size="1" value="1" id="'.strtolower($r['name']).'">
				<a href="game.php?village=61342&amp;screen='.$r['name'].'" onclick="$(\'#'.$r['name'].'_the\').toggle(); return false">
				<img alt="" title="'.$r['name'].'" src="img/'.$r['img'].'"> '.$r['name'].'
				</a>
				<span class="nowrap"></span><span id="'.strtolower($r['name']).'_s" class="nowrap"></span>
			  </td>
			  <td><span class="icon header wood"> </span></span>1008</span></td>
			  <td><span class="icon header stone"> </span></span>957</span></td>
			  <td><span class="icon header iron"> </span></span>454</span></td>
			  <td><span class="icon header population"> </span></span>3</span></td>
			  <td>0:15:03</td>
			  <td style="white-space: normal;">
				 <a onclick="rozbuduj(\''.strtolower($r['name']).'\');return false;" href="game.php?village=61342&amp;action=upgrade_building&amp;h=7db0&amp;id=barracks&amp;type=main&amp;screen=main" id="main_buildlink_'.$r['id'].'" class="nowrap">Rozbuduj</a>
			  <td style="white-space: normal;">

				 <a onclick="return BuildingMain.build(\'barracks\')" href="game.php?village=61342&amp;action=upgrade_building&amp;h=7db0&amp;id=barracks&amp;type=main&amp;screen=main" id="main_buildlink_'.$r['id'].'" class="nowrap">wyburz</a>
			  </td>
			</tr>';
			if(isset($r['function']) && $r['function']!=NULL && function_exists($r['function'])){
			$ratusz.=' <tr><td colspan="8" id="'. $r['name'] .'_the">'.$r['function']($r['id']).'</td></tr>';
			}
$index++;
}
	$ratusz.='</tbody></table>';
return $ratusz;

  }
