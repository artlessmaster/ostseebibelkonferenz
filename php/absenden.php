<?php

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$anzahlErwachsene = $_POST['anzahlErwachsene'];
$anzahlKleinkinder = $_POST['anzahlKleinkinder'];
$anzahlKinder = $_POST['anzahlKinder'];
    
$empfaenger = "kontakt@ostseebibelkonferenz.de";
$absendername = "Anmeldeformular OBK";
$absenderemail = $email;
$betreff = "Neue Anmeldung zur OBK von ".$vorname." ".$nachname;
$from = "From: $absendername <$absendermail>";
$text = "Es ist eine neue Anmeldung über das Anmeldeformualr eingetroffen. Folgende Daten wurden übermittelt:

    Name: ".$nachname."
    Vorname: ".$vorname."
    Email: ".$email."
    Anzahl Erwachsene: ".$anzahlErwachsene."
    Anzahl Kleinkinder: ".$anzahlKleinkinder."
    Anzahl Kinder: ".$anzahlKinder;

//Anmeldung
mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");

//Funktionsbestätigung für Absender

$textAbsender = "Lieber ".$vorname.",

Deine Anmeldung wurde abgeschickt. Folgendes hast Du uns angegeben:

    Name: ".$nachname."
    Vorname: ".$vorname."
    Email: ".$email."
    Anzahl Erwachsene: ".$anzahlErwachsene."
    Anzahl Kleinkinder: ".$anzahlKleinkinder."
    Anzahl Kinder: ".$anzahlKinder."

Schön, dass Du dabei bist!

Viele Grüße
Dein OBK-Team";

mail($email, "Anmeldebestätigung zur OBK", $textAbsender, "From: $absendername <$empfaenger>");

echo('Vielen Dank! Wir freuen uns über Deine Anmeldung!')

?>
