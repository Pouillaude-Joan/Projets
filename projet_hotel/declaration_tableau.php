<?php
$chambres = [] ;
for ($i=0; $i < 5 ; $i++) { 
  	$chambres[$i]["etat"] = random_int(0, 1) ;
  	$chambres[$i]["lit"] = random_int(1, 2) ;
  	if ($chambres[$i]["lit"] == 1) {
  		$prix = "35 €" ;
  	}
  	else{
  		$prix = "75 €" ;
  	}
  	$chambres[$i]["prix"] = $prix ;
}
var_dump($chambres) ; 
?>