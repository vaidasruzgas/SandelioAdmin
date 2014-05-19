
﻿<?php
include("include/session.php");
if ($session->logged_in) {
    ?>
    <html>
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
            <title>Paskyros redagavimas</title>
            <link href="include/styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <?php include("include/header.php"); ?>
            <?php include("include/meniu.php");?>

        <main>
            <?php include("include/atgal.php");
                  global $database;
                $q = "SELECT pav,kiekis,kaina FROM prekes ORDER BY pav DESC,kiekis";
    $result = $database->query($q);
    /* Error occurred, return given name by default */
    $num_rows = mysql_numrows($result);
    if (!$result || ($num_rows < 0)) {
        echo "Error displaying info";
        return;
    }
    if ($num_rows == 0) {
        echo "Lentelė tuščia.";
        return;
    }
                 echo "<table margin-left=\"auto\" margin-right=\"auto\" align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
    echo "<tr><td><b>Prekės pavadinimas</b></td><td><b>Kaina</b0></td><td><b>Kiekis</b></td></tr>\n";
    for ($i = 0; $i < $num_rows; $i++) {
        $pav = mysql_result($result, $i, "pav");
        $kaina = mysql_result($result, $i, "kaina");
        $kiekis = mysql_result($result, $i, "kiekis");

        echo "<tr><td>$pav</td><td>$kaina</td><td>$kiekis</td></tr>\n";
    }
    echo "</table><br>\n";
?>
        </main>
        <?php include("include/footer.php");?>
        </body>
    </html>      
    <?php
    //Jei vartotojas neprisijungęs, užkraunamas pradinis puslapis  
} else {
    header("Location: index.php");
}
?>
