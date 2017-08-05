<?php
    if ($_POST['inputName']!="" and $_POST['inputEmail']!="") {
        $empf = "kontakt@ostseebibelkonferenz.de";
        $betreff = "Neue Anmeldung";
        $from = "From: ";
        $from .= $_POST['inputName'];
        $from .= " <";
        $from .= $_POST['inputEmail'];
        $from .= ">\n";
        $from .= "Reply-To: "
        $from .= $_POST['inputEmail'];
        $from .= "\n";
        $from .= "Content-Type: test/html\n";
        $text = "<h1>Neue Anmeldung von</h1><p>";
        $text .= $_POST['inputName'];
        $text .= "für <strong>";
        $text .= $_POST['inputAnzahlErwachsene'];
        $text .= "Erwachsene</strong> und für <strong>";
        $text .= $_POST['inputAnzahlKinder'];
        $text .= "Kinder</strong>.";

        mail($empf, $betreff, $text, $from);
        echo "Vielen Dank!";
    } else {
        echo "Bitte alle Felder ausfüllen.";
    }
?>