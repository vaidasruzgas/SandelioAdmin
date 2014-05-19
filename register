<?php
include("include/session.php");
if ($session->logged_in) {
    header("Location: index.php");
} else {
    ?>
    <html>
        <head>  
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
            <title>Registracija</title>
            <link href="include/styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <?php include("include/header.php") ?>
        <main>
            <?php include"include/atgal.php" ?>               
            <?php
                /**
                 * The user has submitted the registration form and the
                 * results have been processed.
                 */ if (isset($_SESSION['regsuccess'])) {
                    /* Registracija sėkminga */
                    if ($_SESSION['regsuccess']) {
                        echo "<p style=\"text-align:center;\ ><a href=\"index.php\">Ačiū,  " . $_SESSION['reguname'] . "<br> Jūsų duomenys buvo sėkmingai įvesti į duomenų bazę, galite prisijungti</a>.</p><br>";
                }
                /* Registracija nesėkminga */ else {
                    echo "<p style=\"text-align:center;\>Atsiprašome, bet vartotojo <b>" . $_SESSION['reguname'] . "</b>, "
                    . " registracija nebuvo sėkmingai baigta.<br>Bandykite vėliau.</p>";
                }
                unset($_SESSION['regsuccess']);
                unset($_SESSION['reguname']);
            }
            /**
             * The user has not filled out the registration form yet.
             * Below is the page with the sign-up form, the names
             * of the input fields are important and should not
             * be changed.
             */ else {
                ?>
                <div align="center">
                    <?php
                    if ($form->num_errors > 0) {
                        echo "<font size=\"3\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                    }
                    ?>                            
                    <table>
                        <tr><td>
                                <form action="process.php" method="POST" class="login">              
                                    <center style="font-size:18pt;"><b>Registracija</b></label></center>
                                    <p style="text-align:left;">Vartotojo username:
                                        <input class ="s1" name="user" type="text" size="15"
                                               value="<?php echo $form->value("user"); ?>"/><br><?php echo $form->error("user"); ?>
                                    </p>
                                    <p style="text-align:left;">Slaptažodis:
                                        <input class ="s1" name="pass" type="password" size="15"
                                               value="<?php echo $form->value("pass"); ?>"/><br><?php echo $form->error("pass"); ?>
                                    </p>  
                                    <p style="text-align:left;">E-paštas:
                                        <input class ="s1" name="email" type="text" size="15"
                                               value="<?php echo $form->value("email"); ?>"/><br><?php echo $form->error("email"); ?>
                                    </p>  
                                    <p style="text-align:left;">Vardas:
                                        <input class ="s1" name="vardas" type="text" size="15"
                                               value="<?php echo $form->value("vardas"); ?>"/><br><?php echo $form->error("vardas"); ?>
                                    </p>  
                                    <p style="text-align:left;">Pavarde:
                                        <input class ="s1" name="pavarde" type="text" size="15"
                                               value="<?php echo $form->value("pavarde"); ?>"/><br><?php echo $form->error("pavarde"); ?>
                                    </p> 
                                     <p style="text-align:left;">Telefonas:
                                        <input class ="s1" name="tel" type="text" size="15"
                                               value="<?php echo $form->value("tel"); ?>"/><br><?php echo $form->error("tel"); ?>
                                    </p>  
                                    <p style="text-align:right;">
                                        <input type="hidden" name="subjoin" value="1">
                                        <input type="submit" value="Registruotis">
                                    </p>
                                </form>
                            </td></tr></table>
                            </div>
                            <?php
                        }
                        ?>
                    </td></tr>
            </table> 
        </main> 
        <?php include("include/footer.php");?>
        </body>
    </html>
    <?php
}
?>
