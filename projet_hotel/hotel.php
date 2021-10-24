<?php
$chambres = [] ;
for ($i=0; $i < 20; $i++) {
    $chambres[$i] = random_int(0, 1) ;
    if ($chambres[$i] == 1) {
      $reserve++ ;
    }
    if ($chambres[$i] == 0) {
        $libre ++ ;
      $derniere_chambre = $i+1;//la chambre a l'index 0 est la première       
    }
}
for ($i=0; $i < 20; $i++) { 
  if ($chambres[$i] == 0) {
    $premiere_chambre = $i+1;//la chambre a l'index 0 est la première
  }
  break ;
}  
while (true) {
echo "A- Etat de l'hotel".PHP_EOL;
echo "B- Nombre de chambres réservées".PHP_EOL;
echo "C- Nombre de chambres libres".PHP_EOL;
echo "D- Numéro de la première chambre libre".PHP_EOL;
echo "E- Numéro de la dernière chambre libre".PHP_EOL;
echo "F- Réserver une chambre".PHP_EOL;
echo "G- Libérer une chambre".PHP_EOL;
echo "Q- Quitter".PHP_EOL;
$choix = strtoupper(readline("Veuillez faire votre choix ")) ;
switch ($choix) {
  	case 'A':
  		echo "il y a actuellement ".$reserve." chambres de réservées".PHP_EOL ;
      echo "il y a actuellement ".$libre." chambres de libres".PHP_EOL ;
  		break;


	case 'B':
  		echo "il y a actuellement ".$reserve." chambres de réservées".PHP_EOL ;
  		break;


  	case 'C':
  		echo "il y a actuellement ".$libre." chambres de libres".PHP_EOL ;
  		break;


  	case 'D':
  		echo "la première chambre de libre est la ".$premiere_chambre.PHP_EOL ;
  		break;


  	case 'E':
  		echo "la dernière chambre de libre est la ".$derniere_chambre.PHP_EOL ;
  		break;


  	case 'F':
  	  $login = readline("Veuillez saisir votre login ") ;
      $password = readline("Veuillez saisir votre mot de passe ") ;
      if ($login == "toto" && $password == "tata") {
        $oui = readline("Souhaitez vous réserver une chambre ? Veuillez répondre par oui par non. ") ;
        if ($oui == "oui") {
          if ($reserve == 20) {
            echo "Nous sommes désolé l'hotel est complet.".PHP_EOL;
          }
          for ($i=0; $i < 20 ; $i++) { 
            if ($chambres[$i] == 0) {
              $chambres[$i] = 1 ;
              $i++ ;
              $reserve++ ;
              echo "Votre réservation a bien été enregistrer, vous avez la chambre N°".$i.PHP_EOL;
              break ;      
            }
          }
        }
      }
      else{
        echo "Mauvais login ou mot de passe !".PHP_EOL;
      }
      break;


  	case 'G':
      $login = readline("Veuillez saisir votre login ") ;
      $password = readline("Veuillez saisir votre mot de passe ") ;
      if ($login == "toto" && $password == "tata") {
        $oui = readline("Souhaitez vous libérer votre chambre ? Veuillez répondre par oui par non. ") ;
        if ($oui == "oui") {
          for ($i=20; $i > 0 ; $i--) { 
            if ($chambres[$i] == 1) {
              $chambres[$i] = 0 ;
              $i++ ;
              echo "La chambre N°".$i." a bien été libéré".PHP_EOL;
              break ;      
            }
          }
        }
      }
      else{
        echo "Mauvais login ou mot de passe !".PHP_EOL;
      }
      break;      

  		
  	default:
  		# code...
  		break;
}
if ($choix == "Q") {
  $on = readline("Souhaitez vous quitter Oui ou Non ? ");
  if ($on == "oui"){
    break ;
  }
}
}    
?>