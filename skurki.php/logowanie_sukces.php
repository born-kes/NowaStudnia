<p align="center">
Logowanie Zakoñczone Sukcesem
<br />
Witam 

<i><b><?php echo $_SESSION['zalogowany']; ?></b></i>
<br />
<br />
<?php
if( isset($_SESSION['url']) ){
echo '<a href="'.$_SESSION['url'].'">';?>					Odœwie¿ stronê by kontynuowaæ<br></a>
<?php }else{ ?> 
								Odœwie¿ stronê by kontynuowaæ<br> 
<?php } ?>
								<a href="wylogowanie">wyloguj siê</a>
</p>
								<img id="img" />
								<script language="JavaScript">
								<!--
								document.getElementById("img").src = 'img/xy.php?p='+screen.width+'x'+screen.height
								//-->
								</script>
