<?PHP
 echo $GET[0];
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
	$url =URL();  
unset($_SESSION['komunikat']);  
    $_SESSION['zalogowany'] = $_POST["user"];
    $_SESSION['id_user'] = user_id($_POST["user"]);
	
  header("Location:".$url);
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
# generuje zapytanie o id usera  
function sql_nazwa($name){
	return sql_dopasuj_zap(	array('list_user'	=>'id'),
					where( array('list_user'=>'name'),$name) 
				);
}
function URL(){


global $_GET,$_SESSION;
if(isSet($_SESSION['url']))return $_SESSION['url'];
if(!isSet($_GET))return;
foreach($_GET as $n => $v){if($n==='q'){$str[]=$v;continue;} $str[]=$n.'='.$v;}
$_SESSION['url']= splaszcz($str,'&');
}