<p align="center">
Logowanie Zako�czone Sukcesem
<br />
Witam 

<i><b><?php echo $_SESSION['zalogowany']; ?></b></i>
<br />
<br />
<?php
if( isset($_SESSION['url']) ){
echo '<a href="'.$_SESSION['url'].'">';?>					Od�wie� stron� by kontynuowa�<br></a>
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
