<?php

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$anzahlErwachsene = $_POST['anzahlErwachsene'];
$anzahlKleinkinder = $_POST['anzahlKleinkinder'];
$anzahlKinder = $_POST['anzahlKinder'];
    
$empfaenger = "danny.russ@cv-kiel.de";
$absendername = "Anmeldeformular";
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

mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");

echo('Vielen Dank! Wir freuen uns über Deine Anmeldung!')
?>
