<p align="center">
Logowanie Zako�czone Sukcesem
<br />
Witam 

<i><b><?php echo $_SESSION['zalogowany']; ?></b></i>
<br />
<br />
<?php
if( is_array($_SESSION['url']) ){
echo '<a href="';
  foreach($_SESSION['url'] as $get => $w){
  if($get=='q'){echo $w.'&';continue;}
  echo $get.'='.$w.'&';}
  echo '">';?>					Od�wie� stron� by kontynuowa�<br></a>
<?php }else{ ?> 
								Od�wie� stron� by kontynuowa�<br> 
<?php } ?>
								<a href="wylogowanie">wyloguj si�</a>
</p>
								<img id="img" />
								<script language="JavaScript">
								<!--
								document.getElementById("img").src = 'img/xy.php?p='+screen.width+'x'+screen.height
								//-->
								</script>
