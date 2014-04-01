<?php
include("include/session.php");
?>
<html>
    <head>  
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
        <title>Slaptažodžio priminimas</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include("include/header.php") ?>
    <main>
        <?php include("include/atgal.php"); ?> 
        <table class="center"><tr><td>
                    <?php
                    /**
                     * Forgot Password form has been submitted and no errors
                     * were found with the form (the username is in the database)
                     */
                    if (isset($_SESSION['forgotpass'])) {
                        /**
                         * New password was generated for user and sent to user's
                         * email address.
                         */
                        if ($_SESSION['forgotpass']) {
                            echo "<p>Naujas slaptažodis buvo sugeneruotas ir nusiųstas paštu. <br><br></p>";
                        } else {
                            /**
                             * Email could not be sent, therefore password was not
                             * edited in the database.
                             */
                            echo "<h1>Klaida</h1>";
                            echo "<p>Įvyko klaida siunčiant slaptažodį.<br> "
                            . "<a href=\"index.php\">Pradžia</a>.</p>";
                        }
                        unset($_SESSION['forgotpass']);
                    } else {
                        /**
                         * Forgot password form is displayed, if error found
                         * it is displayed.
                         */
                        ?>
                      <div align="left">
                        Naujas slaptažodis bus nusiųstas su Jūsų paskyra susietu e-pašto adresu.<br>
                        Įveskite vartotojo vardą:<br><br>
                        <?php
                        echo $form->error("user");
                        ?>
                        <form action="process.php" method="POST">
                            <input type="text" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>">
                            <input type="hidden" name="subforgot" value="1">
                            <input type="submit" value="Naujas slaptažodis">
                        </form>
                      </div>
                        <?php
                    }

                    ?>
                </td></tr>
        </table>
    </main>
    <?php include("include/footer.php"); ?>
    </body>
</html>
