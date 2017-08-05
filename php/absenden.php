<?php

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$anzahlErwachsene = $_POST['anzahlErwachsene'];
$anzahlKinder = $_POST['anzahlKinder'];

$empfaenger = "kontakt@ostseebibelkonferenz.de";
$absendername = "Anmeldeformular";
$absenderemail = $email;
$betreff = "Neue Anmeldung";
$from = "From: Nils Reimers <absender@domain.de>";
$text = "Es ist eine neue Anmeldung über das Anmeldeformualr eingetroffen. Folgende Daten wurden übermittelt:

Name, Vorname ".$nachname.", ".$vorname."
Email: ".$email."
Anzahl Erwachsene: ".$anzahlErwachsene."
Anzahl Kinder: ".$anzahlKinder;
 
mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");

echo('Vielen Dank! Wir freuen uns über Ihre Anmeldung!')
?>