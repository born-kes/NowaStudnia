<?PHP
 
function user_id($user){

  $query = sql_nazwa($user);
  
connection();  $result = mysql_query($query);
$row = @mysql_fetch_row($result);
 $ro= $row[0];
return $ro;
}

function checkPass($user, $pass){
/*sprawdzenie d³ugo³ci przekazanych ci¹gów*/

  $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40){
    return 2;
  }
$user =addslashes($user);
$pass =addslashes($pass);

 $query = SELECT ."COUNT(*)". FROM .T_USER. WHERE. name."='$user' AND `haslo`='$pass'";

/*nawi¹zanie po³¹czenia serwerem i wybór bazy*/

connection();
  if(!$result = mysql_query($query)){
    return 1;
  }

	/*sprawdzenie wyników zapytania*/
  if(!$row = @mysql_fetch_row($result)){ //echo('Wyst¹pi³ b³¹d: nieprawid³owe wyniki zapytania...');
    
    return 1;
  }
  else{
    if($row[0] <> 1){
      return 2;
	}
	else{
      return 0;
    }
  }
}

switch( checkPass($_POST["user"], $_POST["haslo"]) ){
  case 0:
    $_SESSION['zalogowany'] = $_POST["user"];
    $_SESSION['id_user'] = user_id($_POST["user"]);
			if(!empty($_GET)) $_SESSION['url']=$_GET;
			else $_SESSION['url']=NULL;
  header("Location:".SERWER_URL);
      break;
  case 1:
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
 // header("Location:".SERWER_URL);
      break;
  case 2:
    $_SESSION['komunikat'] = "Nieprawid³owa nazwa i/lub has³o u¿ytkownika.";
 // header("Location:".SERWER_URL);
      break;
  default:
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
 // header("Location: ".SERWER_URL);
      break;
}	