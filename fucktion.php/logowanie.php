<?PHP
 
function user_id($user){

  $query = sql_nazwa($user);
  
connection();  $result = mysql_query($query);
$row = @mysql_fetch_row($result);
 $ro= $row[0];
return $ro;
}

function checkPass($user, $pass){
/*sprawdzenie d�ugo�ci przekazanych ci�g�w*/

  $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40){
    return 2;
  }
$user =addslashes($user);
$pass =addslashes($pass);

 $query = SELECT ."COUNT(*)". FROM .T_USER. WHERE. name."='$user' AND `haslo`='$pass'";

/*nawi�zanie po��czenia serwerem i wyb�r bazy*/

connection();
  if(!$result = mysql_query($query)){
    return 1;
  }

	/*sprawdzenie wynik�w zapytania*/
  if(!$row = @mysql_fetch_row($result)){ //echo('Wyst�pi� b��d: nieprawid�owe wyniki zapytania...');
    
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
    $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe.";
 // header("Location:".SERWER_URL);
      break;
  case 2:
    $_SESSION['komunikat'] = "Nieprawid�owa nazwa i/lub has�o u�ytkownika.";
 // header("Location:".SERWER_URL);
      break;
  default:
    $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe.";
 // header("Location: ".SERWER_URL);
      break;
}	