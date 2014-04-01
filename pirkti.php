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
            <?php include("include/header.php"); ?>
            <?php include("include/meniu.php");?>

        <main>
            <?php
$sql="SELECT * FROM prekes";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
<tr>
<td><form name="form1" method="post" action="" onSubmit="return validate();">
<table class="pirkimas">
<tr>
<td>&nbsp;</td>
<td colspan="4"><strong>Prekių pirkimas</strong> </td>
</tr>
<tr><td></td></tr>
<tr>
<td></td>
<td><strong>Id</strong></td>
<td><strong>Pavadinimas</strong></td>
<td><strong>Kiekis</strong></td>
<td><strong>Kaina</strong></td>

</tr>

<?php
while($rows=mysql_fetch_array($result)){
?>

<tr>
<td><input name="checkbox[]" type="checkbox" id="checkbox[]" 
value="<?php echo $rows['prekes_id']; ?>"></td>
<td><?php echo $rows['prekes_id']; ?></td>
<td><?php echo $rows['pav']; ?></td>
<td><?php echo $rows['kiekis']; ?></td>
<td><?php echo $rows['kaina']; ?></td>
</tr>

<?php
}
?>

<tr>
<td><br><input name="delete" type="submit" id="delete" value="Pirkti"></td>
</tr>

<?php

// Check if delete button active, start this
if(isset($_POST['delete'])){
for($i=0;$i<count($_POST['checkbox']);$i++){
$del_id=$_POST['checkbox'][$i];
$sql = "DELETE FROM prekes WHERE prekes_id='$del_id'";
$result = mysql_query($sql);
}
// if successful redirect to delete_multiple.php
if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=pirkti.php\">";
}
}
mysql_close();
?>
</table>
</form>
</td>
</tr>
        </main>
        <?php include("include/footer.php");?>
        </body>
    </html>      
    <?php
} 
?>
