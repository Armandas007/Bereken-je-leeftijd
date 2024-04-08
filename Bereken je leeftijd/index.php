<!--Ontwikkelaar: Armandas Rakevicius
    Opdracht: OP Realisatie opdracht/toets HTML-CSS-PHP-SQL LEEFTIJD BEREKENEN
    Datum: 3/18/2024-->

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leeftijd Berekenen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Bereken je leeftijd:</h2>
    <form action="index.php" method="post">
        <label for="huidige_datum">Huidige Datum:</label>
        <input type="date" id="huidige_datum" name="huidige_datum" required><br><br>
        <label for="geboortedatum">Geboortedatum:</label>
        <input type="date" id="geboortedatum" name="geboortedatum" required><br><br>
        <input type="submit" value="Bereken Leeftijd">
        <hr>
    </form>
</body>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer of beide datums zijn ingevuld 
        if (!empty($_POST["huidige_datum"]) && !empty($_POST["geboortedatum"])) {
            $huidige_datum = new DateTime($_POST["huidige_datum"]);
            $geboortedatum = new DateTime($_POST["geboortedatum"]);

            // Bereken de leeftijd
            $leeftijd = $huidige_datum->diff($geboortedatum)->y;

            // Bereken de leeftijd in dagen
            $leeftijd_interval = $huidige_datum->diff($geboortedatum);
            $leeftijd_dagen = $leeftijd_interval->days;

            // Bereken leeftijd in maanden
            $leeftijd_maanden = floor($leeftijd_dagen / 30);

            // Bereken resterende dagen na volledige maanden
            $rest_dagen = $leeftijd_dagen % 30;

            // Bereken totale dagen in het aantal maanden
            $totale_dagen_in_maanden = $leeftijd_maanden * 30 + $rest_dagen;
            echo "Je bent $leeftijd jaar oud.<br>";
            echo "Leeftijd in maanden: $leeftijd_maanden<br>";
            echo "leeftijd in dagen: $totale_dagen_in_maanden<br>";
            echo "Jij bent $leeftijd jaar, $leeftijd_maanden maanden en  $totale_dagen_in_maanden dagen oud";
            
        } else {
            echo "Vul zowel de huidige datum als de geboortedatum in.<br>";
        }
    }
    ?>
    <br>
    <form action="index.php" method="get">
        <input type="submit" value="Opnieuw">
    </form>
</body>
</html>
