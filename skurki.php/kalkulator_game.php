<?php
//print_r($budynki);
 
 
 $plac['nagluwek']='
 <table style="display:none;"><tbody>
	<tr>
		<th colspan="4">'.t('Daj Rozkaz').'</th>
	</tr>
	';
 $plac['stopka']='
	 <tr>
		<th colspan="4"><hr></th>
	</tr>
	</tbody></table>
	';

 $plac['content']='
 			<td class="nowrap">
				<a onclick="return false" class="unit_link" href="#">
					<img class="" alt="" title="" src="{img}unit_{de}.png">		
				</a>
			<input type="text" class="unitsInput" tabindex="1" style="width: 40px" name="spear" id="unit_input_{de}">
				<a href="javascript:insertUnit($(\'#unit_input_{de}\'),0)">(0)</a>
			</td>
			';
 $plac['content2']='
	 <tr>
		<th colspan="4"><hr></th>
	</tr>	
	<tr>
		<td> x: <input type="text" class="unitsInput" style="width: 40px"  size="4" name="inputx" id="inputx"> </td>
		<td> x: <input type="text" class="unitsInput" style="width: 40px"  size="4" name="inputy" id="inputy"> </td>
	</tr>
	';

	$r['de']='';
$ratusz['nagluwek']='
<table class="vis nowrap">
 <tbody>
	<tr>
		<th>'.t('Budynki').'</th>
		<th colspan="4">'.t('Zapotrzebowanie').'</th>
		<th width="100">'.t('Czas budowy').' <img width="13" height="13" src="{img}questionmark.png" class="tooltip" alt=""></th>
		<th style="width:100px;">'.t('Wybuduj').'</th>
		<th style="width:100px;">'.t('Burzenie').'</th>
	</tr>
		';
// ms³ymi litetami? {smol_de} =>strtolower($r['de'])
$ratusz['content']='
	<tr id="buildrow_{de}">
		<td><input type="text" onchange="suma();" size="1" value="1" id="{smol_de}">
			<a href="game.php?village=61342&amp;screen={de}" onclick="$(\'#{de}_the\').toggle(); return false">
				<img alt="" title="'.t($r['de']).'" src="{img}{de}.png"> '.t($r['de']).'
			</a>
				<span class="nowrap"></span><span id="{smol_de}_s" class="nowrap"></span>
		</td>
		<td><span class="icon header wood"> </span></span>1008</span></td>
		<td><span class="icon header stone"> </span></span>957</span></td>
		<td><span class="icon header iron"> </span></span>454</span></td>
		<td><span class="icon header population"> </span></span>3</span></td>
		<td>0:15:03</td>
		<td style="white-space: normal;">
			<a onclick="rozbuduj(\'{smol_de}\');return false;" href="game.php?village=61342&amp;action=upgrade_building&amp;h=7db0&amp;id=barracks&amp;type=main&amp;screen=main" id="main_buildlink_{de}" class="nowrap">'.t('Rozbuduj').'</a>
		<td style="white-space: normal;">

			<a onclick="return BuildingMain.build(\'{de}\')" href="game.php?village=61342&amp;action=upgrade_building&amp;h=7db0&amp;id=barracks&amp;type=main&amp;screen=main" id="main_buildlink_{de}" class="nowrap">'.t('wyburz').'</a>
		</td>
	</tr>
';
			
	//		if(isset($r['function']) && $r['function']!=NULL && function_exists($r['function'])){
$ratusz['function']=' <tr><td colspan="8" id="{de}_the">{function}</td></tr>';

			
$ratusz['stopka']='
 </tbody>
</table>
';

echo budy();