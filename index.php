<?php
include("include/session.php");
?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
        <title>Demo projektas</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include("include/header.php") ?>
            <?php
            //Jei vartotojas prisijungęs
            if ($session->logged_in) {
                include("include/meniu.php");
                ?>
                <main>
                <div style="text-align: center;color:green">
                    <br><br>
                    <h1>Pradinis sistemos puslapis (index.php).</h1>
                </div><br>
                </main>
                <?php
                //Jei vartotojas neprisijungęs, rodoma prisijungimo forma
                //Jei atsiranda klaidų, rodomi pranešimai.
            } else {
                echo "<main>";
                echo "<div align=\"center\">";
//                if ($form->num_errors > 0) {
//                    echo "<font size=\"3\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
//                }
                include("include/loginForm.php");
                echo "</div>";
                echo "</main>";
            }
            ?>
            <?php include("include/footer.php"); ?>
    </body>
</html>
