<?php
 // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $vorname = strip_tags(trim($_POST["vorname"]));
				$vorname = str_replace(array("\r","\n"),array(" "," "),$vorname);
        $nachname = strip_tags(trim($_POST["nachname"]));
				$nachname = str_replace(array("\r","\n"),array(" "," "),$nachname);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $anzahlErwachsene = trim($_POST["anzahlErwachsene"]);
        $anzahlKinder = trim($_POST["anzahlKinder"]);

        // Check that data was sent to the mailer.
        if ( empty($vorname) OR empty($nachname) OR empty($anzahlErwachsene)OR empty($anzahlKinder) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Hoppla! Es gab ein Problem mit deiner Eingabe. Bitte versuche es erneut.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "kontakt@ostseebibelkonferenz.de";

        // Set the email subject.
        $subject = "Neue OBK Anmeldung von $vorname $nachname";

        // Build the email content.
        $email_content = "Name: $vorname $nachname\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Anzahl Erwachsene: $anzahlErwachsene\n";
        $email_content .= "Anzahl Kinder: $anzahlKinder\n";

        // Build the email headers.
        $email_headers = "From: $vorname $nachname <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Vielen Dank! Deine Anmeldung wurde abgeschickt.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Hoppla! Irgendetwas lief schief, wir konnten deine Anmeldung nicht empfangen.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Es gab ein Problem mit deiner Eingabe. Bitte versuche es erneut.";
    }

?>
