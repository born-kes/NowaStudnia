<form name = "formularz1" action="" method = "POST" >
<table border="0" align="center">
 <tr><td align="center" colspan="2"><?php //Komunikat o nie udanej prubie logowania
		 if(isset($_SESSION['komunikat'])){ echo $_SESSION['komunikat']; }else{ 
		 ?><img src="http://img.audiovis.nac.gov.pl/SM0/SM0_2-1569.jpg" border="0"><?php } ?></td></tr>
 <tr>
  <td>U¿ytkownik:</td>
  <td>
    <input type="text" 
		 name="user" <?php //druga pruba logowania
		 if(isSet($_POST['user'])){ echo (br.'value="'.$_POST['user'].'" '); }
		 ?> >
  </td>
 </tr><tr>
  <td>Has³o:</td>
  <td>
   <input type="password" 
		 name="haslo" >
  </td>
 </tr><tr>
  <td colspan="2" align="center">
   <input type="submit" value="Wejdz">
  </td>
 </tr>
</table>
</form>