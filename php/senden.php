<?php
 // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $email = $_POST['email'];
        $anzahlErwachsene = $_POST['anzahlErwachsene'];
        $anzahlKinder = $_POST['anzahlKinder'];
        
        // Check that data was sent to the mailer.
        if ($vorname == '' || $nachname == '' || $anzahlErwachsene == '' || $anzahlKinder == '' || $email == '') {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo('Hoppla! Es gab ein Problem mit deiner Eingabe. Bitte versuche es erneut.')
        }

        // Set the recipient email address.
        $recipient = "kontakt@ostseebibelkonferenz.de";

        // Set the email subject.
        $subject = "Neue OBK Anmeldung von $vorname $nachname";

        // Build the email content.
        $email_content = "Es ist eine neue Anmeldung über das Anmeldeformualr eingetroffen. Folgende Daten wurden übermittelt:

            Name: ".$nachname."
            Vorname: ".$vorname."
            Email: ".$email."
            Anzahl Erwachsene: ".$anzahlErwachsene."
            Anzahl Kinder: ".$anzahlKinder;

        // Build the email headers.
        $email_headers = "From: $vorname $nachname <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo('Vielen Dank! Deine Anmeldung wurde abgeschickt.')
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo('Hoppla! Irgendetwas lief schief, wir konnten deine Anmeldung nicht empfangen.')
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo('Es gab ein Problem mit deiner Eingabe. Bitte versuche es erneut.')
    }

?>
