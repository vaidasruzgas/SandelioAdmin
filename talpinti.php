<?php
include("include/session.php");
if ($session->logged_in) {
    ?>﻿   
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
            <?php include("include/atgal.php")?>
            <?php include("include/sarasas.php")?>
         
           
                <div align="center">                            
                    <table>
                        <tr><td>
                                <form  method="POST" class="login">              
                                    <center style="font-size:18pt;"><b>Prekės Talpinimas</b></label></center>
                                    <p style="text-align:left;">Prekės pavadinimas:
                                        
                                        <input class ="s1" name="pav" type="text" size="15">
                                    </p>
                                    <p style="text-align:left;">Kiekis:
                                        <input class ="s1" name="kiekis" type="number" size="15">
                                    </p>  
                                    <p style="text-align:left;">Kaina:
                                        <input class ="s1" name="kaina" type="number" size="15">
                                    </p>
                                    <p style="text-align:right;">
                                        <input type="hidden" name="subjoin" value="1">
                                        <input type="submit" value="Įkelti">
                                    </p>
                                </form>
                            </td></tr></table
                            </div>
                            <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                        
$pav = filter_input(INPUT_POST, 'pav');
$kiekis = filter_input(INPUT_POST, 'kiekis');
$kaina = filter_input(INPUT_POST, 'kaina');
    $query1 = "INSERT INTO prekes(pav, kiekis, kaina) VALUES ( '$pav', '$kiekis','$kaina')";

      if(mysql_query($query1)){
       echo "Įkelta";}
   else{
        echo "Neįkelta";}
}                     ?>
                    </td></tr>
            </table> 
        </main> 
        <?php include("include/footer.php");?>
        </body>
    </html>
    <?php
}
?>

