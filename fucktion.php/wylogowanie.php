<?php
	head('title','Wylogowanie');
	body('wylogowanie');
	
if(!isSet($_SESSION['zalogowany'])){
  $komunikat = "Nie jestes zalogowany!";
}
else{
  unset($_SESSION['zalogowany']);
  unset($_SESSION);
  $komunikat = "Wylogowanie prawidlowe!";
}
session_destroy();