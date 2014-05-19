<?php
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
            <?php include("include/header.php") ?>
            <?php include("include/meniu.php");?>
                        /**
                         * User has submitted form without errors and user's
                         * account has been edited successfully.
                       */
        <main>
            <?php include("include/atgal.php")?>
         
                        <?php
                        if (isset($_SESSION['useredit'])) {
                            unset($_SESSION['useredit']);
                            echo "<p style=\"text-align:center;\"><b>$session->username</b>, <br><br>Jūsų paskyra buvo sėkmingai atnaujinta.</p>";
                        } else {
                            echo "<div align=\"center\">";
                            if ($form->num_errors > 0) {
                                echo "<font size=\"3\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                            } else {
                                echo "";
                            }
                            ?>
                            <table class="center" >
                                <tr><td>
                                        <form action="process.php" style="text-align:left;" method="POST">
                                            <p>Dabartinis slaptažodis:<br>
                                                <input type="password" name="curpass" maxlength="30" size="25" value="<?php echo $form->value("curpass"); ?>">
                                                <br><?php echo $form->error("curpass"); ?></p>
                                            <p>Naujas slaptažodis:<br>
                                                <input type="password" name="newpass" maxlength="30" size="25" value="<?php echo $form->value("newpass"); ?>">
                                                <br><?php echo $form->error("newpass"); ?></p>
                                            <p>E-paštas:<br>
                                                <input type="text" name="email" maxlength="30" size="25" value="<?php
                    if ($form->value("email") == "") {
                        echo $session->userinfo['email'];
                    } else {
                        echo $form->value("email");
                    }
                            ?>"> <br><?php echo $form->error("email"); ?></p>
                                            
                                           <p>Vardas:<br>
                                                <input type="text" name="vardas" maxlength="30" size="25" value="<?php
                    if ($form->value("vardas") == "") {
                        echo $session->userinfo['vardas'];
                    } else {
                        echo $form->value("vardas");
                    }
                            ?>"> <br><?php echo $form->error("vardas"); ?></p>
                                           
                                            <p>Pavardė:<br>
                                                <input type="text" name="pavarde" maxlength="30" size="25" value="<?php
                    if ($form->value("pavarde") == "") {
                        echo $session->userinfo['pavarde'];
                    } else {
                        echo $form->value("pavarde");
                    }
                            ?>"> <br><?php echo $form->error("pavarde"); ?></p>
                                        
                                            <p>Telefonas:<br>
                                                <input type="text" name="tel" maxlength="30" size="25" value="<?php
                    if ($form->value("tel") == "") {
                        echo $session->userinfo['tel'];
                    } else {
                        echo $form->value("tel");
                    }
                            ?>"> <br><?php echo $form->error("tel"); ?></p>
                    
                                            <input type="hidden" name="subedit" value="1">
                                            <input type="submit" value="Atnaujinti">
                                        </form>
                                    </td></tr>
                            </table>

                            <?php
                            echo "</div>";
                        }
                        ?>
        </main>
        <?php include("include/footer.php")?>
        </body>
    </html>      
    <?php
    //Jei vartotojas neprisijungęs, užkraunamas pradinis puslapis  
} else {
    header("Location: index.php");
}
?>
