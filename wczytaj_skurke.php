<?php

if($Wyglad['typ']['standard']){ header('Content-type: text/html; Charset=iso-8859-2');//utf-8	
echo '<html>'.br; 
 if( isset($Wyglad['head']) ){	
	if( is_array($Wyglad['head']) ){ /* Załadowanie HEAD */
	echo '<head>'.br;
	  foreach($Wyglad['head'] as $typ => $links){ 
			HEAD_arry($typ , $links);
	  }
	echo '</head>'.br;
	  }
 }
 if( isset($Wyglad['body']) ){ 		 /* Załadowanie BODY */	
	echo '<body>'.br; 
	if( is_array($Wyglad['body']) ){
		$listaSkurek = ListaPlikow(SKURKI);		/*Pobiera Liste Skurek */
		
	  foreach($Wyglad['body'] as $body){		/* wczytywanie Skurek */
		if( isset($listaSkurek[$body . PHP]) )
			include(SKURKI . $body. PHP);		// else echo 'Niema skurki :'.$body;		
	  }
	}
	
	echo '</body>'.br; 
  if( isset($Wyglad['js']) ){ 
 	if( is_array($Wyglad['js']) ){ /* Załadowanie JavaScript */
 	  foreach($Wyglad['js'] as $js)
		HEAD_arry('Wscript', $js); 	
	}
  }	
 }
echo '</html>'; 
}else{ 

 if($Wyglad['typ']['json']){ header('Content-type: text/javascript');

  if( isset($Wyglad['js']) ){ 
 	if( is_array($Wyglad['js']) ){ /* Załadowanie JavaScript */
 	  foreach($Wyglad['js'] as $js)
		echo $js;
	}
  }
 }
}	