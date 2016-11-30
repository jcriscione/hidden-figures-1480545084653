<?php

//Si la variable $_POST['*'] existe et n'est pas vide, alors $variable = $_POST['*']  sinon elle vaut NULL
$unom = !empty($_POST['unom']) ? $_POST['unom'] : NULL;
$uprenom = !empty($_POST['uprenom']) ? $_POST['uprenom'] : NULL;
$uemail = !empty($_POST['uemail']) ? $_POST['uemail'] : NULL;

//============ Déclaration de l'adresse du destinataire ============//
$to = $uemail;


            //*******************//


// On s'assure que les sauts de ligne seront les même en fonction du gestionnaire d'email des utilisateurs.
// On filtre les serveurs qui présentent des bogues.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $to))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

            //*******************//


//============ Déclaration des messages au format HTML ============//
$message_html =
                "<html>
                    <head>
                    </head>
                    <body>
                        <b>Bonjour</b>,".$uprenom." ". $unom.", <br>
						Merci d'avoir réserver votre séjour.<br>
						Nous avons bien pris en compte votre demande de réservation.<br>
                        Celle-ci est en cours de consultation. <br>
						Vous serez informé de sa confirmation dans les plus brefs delais.
                    </body>
                </html>";


            //*******************//


//============ Création de la boundary (frontière) ============//
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());


            //*******************//


//============ Définition du sujet. ============
$sujet = "Réservation en attente de confirmation ";


            //*******************//


//============ Header de l'email ============//
// Déclaration de l'expéditeur
$header = "From: \"Romuald Le Bris\"<lebris.romuald@gmail.com>".$passage_ligne;
// Déclaration de l'adresse de retour
$header.= "Reply-to: \"".$uprenom." ".$unom." \" <".$uemail.">".$passage_ligne;
// Déclaration de la version MIME
$header.= "MIME-Version: 1.0".$passage_ligne;
// Déclaration de la priorité du mail pour le client à => Maximal.
$header .= "X-Priority: 1".$passage_ligne;
// Déclaration du content-type
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;


            //*******************//


//============ Définition du Content Type ============//
$message = "...";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message .= "...";


            //*******************//


//============ Ajout du message au format HTML ============//
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;


            //*******************//


//============ Envoi de l'e-mail. ============//
mail($to,$sujet,$message,$header);

?>
