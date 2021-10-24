<?php
$chambres=[];
$n=1;
for ($i=0; $i < 5 ; $i++) {
	$chambre = [] ;
	$chambre["numero"] = $n++ ;  
  	$chambre["etat"] = random_int(0, 1) ;
  	$chambre["lit"] = random_int(1, 2) ;
  	if ($chambre["lit"] == 1) {
  		$prix = "35 €" ;
  	}
  	else{
  		$prix = "75 €" ;
  	}
  	$chambre["prix"] = $prix ;
  	$chambres[] = $chambre ;
}

var_dump($chambres) ;
$choix = readline("Saisir le numéro de chambre ");
foreach ($chambres as $i => $numero) {
	if ($numero["numero"] == $choix){
		echo "la chambre n°".$numero["numero"]." est : ".PHP_EOL;
		echo "la chambre est ".$numero["etat"].PHP_EOL;
		echo "Elle possède ".$numero["lit"].PHP_EOL;
		echo "Au prix de ".$numero["prix"];
	}
}
?>