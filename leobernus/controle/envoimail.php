<?php
$mail = 'leo.bernus@gmail.com'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = htmlspecialchars($_POST['tpost']);
$message_html = $message_txt;
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
//=====Définition du sujet.
$sujet = '[Message du site perso]';
//=========
 
//=====Création du header de l'e-mail.
$auteur=htmlspecialchars($_POST['mail']);
$header = "From: \"".$auteur."\"<".$auteur.">".$passage_ligne;
$header.= "Reply-to: \"".$auteur."\" <".$auteur.">".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
$envoifait=1;
include_once('vue/contact.php');
