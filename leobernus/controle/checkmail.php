<?php 
	$envoireussi=1;
	$reponse='';
	//print_r($_POST);
	if ( (!isset($_POST['captcha'])) OR ($_POST['captcha']!=$_SESSION['blubliblu'])) { 
	 	$reponse = $reponse.'<br />Erreur : vous êtes un robot (ou vous ne savez pas compter).';
	 	$envoireussi=0;
	}
	if (  (!isset($_POST['tpost']) ) OR (strlen(htmlspecialchars($_POST['tpost']))<=2) )  {
		$reponse .='<br />Erreur : vous devez envoyer du texte !';
		$envoireussi=0;
	}
	if (strlen($_POST['tpost'])>=8000) {
		$reponse = $reponse.'<br />Erreur : message trop long (limité à 8000 caractères).';
		$envoireussi=0;
	}
	if(strlen($_POST['email'])<=2){
		$reponse .='<br />Erreur : vous devez renseigner une adresse email.';
		$envoireussi=0;
	}
	if($envoireussi==1){
		$reponse.= '<br />Votre message a bien été envoyé.<br />';}
	if ($envoireussi==1) {
		include_once('envoi_mail.php');
	}else{
		include_once('erreur_mail.php'); 
	}
	//echo $reponse;
