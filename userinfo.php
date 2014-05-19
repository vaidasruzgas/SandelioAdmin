<?php
include("include/session.php");
if ($session->logged_in) {
    ?>
    <html>
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
            <title>Mano paskyra</title>
            <link href="include/styles.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <?php include("include/header.php") ;?> 
                <?php include("include/meniu.php");  ?>
                <main>
               <?php include("include/atgal.php")?> 
                <?php
                /* Requested Username error checking */
                if (isset($_GET['user'])) {
                    $req_user = trim($_GET['user']);
                } else {
                    $req_user = null;
                }
                if (!$req_user || strlen($req_user) == 0 ||
                        
                        !preg_match('/^([0-9a-z])+$/', $req_user) ||
                        !$database->usernameTaken($req_user)) {
                    echo "<br><br>";
                    die("Vartotojas nėra užsiregistravęs");
                }

                /* Display requested user information */
                $req_user_info = $database->getUserInfo($req_user);
                
                echo "<br><table border=1 style=\"text-align:left;\" cellspacing=\"0\" cellpadding=\"3\" class=\"center\"><tr><td><b>Vartotojo username: </b></td>"
                . "<td>" . $req_user_info['username'] . "</td></tr>"
                . "<tr><td><b>E-paštas:</b></td>"
                . "<td>" . $req_user_info['email'] . "</td></tr>"
                . "<tr><td><b>Vardas:</b></td>"
                . "<td>" . $req_user_info['vardas'] . "</td></tr>"
                . "<tr><td><b>Pavardė:</b></td>"
                . "<td>" . $req_user_info['pavarde'] . "</td></tr>"
                . "<tr><td><b>Telefonas:</b></td>"
                . "<td>" . $req_user_info['tel'] . "</td></tr>";
                
                //Jei vartotojas neprisijungęs, rodoma prisijungimo forma
                //Jei atsiranda klaidų, rodomi pranešimai.
                ?>
                </table>
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
