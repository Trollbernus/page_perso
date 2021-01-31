<?php
include_once('modele/session.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') // accueil
{
    include_once('vue/accueil.php'); 
}elseif( $_GET['section']=='contact' ){ // contact
	$envoifait=0;
	include_once('vue/contact.php');
}elseif( $_GET['section']=='recherche'){ // recherche scientifique 
	include_once('vue/recherche.php');
}elseif( $_GET['section']=='enseignement'){ // enseignement
	include_once('vue/enseignement.php');
}elseif ( $_GET['section']=='autre') { // autre
	include_once('vue/autre.php');
}else{
	include_once('vue/erreur404.php');
}
if ((isset($_GET['section']))AND($_GET['section']=='erreur404')) {
	include_once('vue/erreur404.php');
}
