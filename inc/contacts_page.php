<?php
if(!isset($_POST["savebutton"])) $_POST["savebutton"] = "";
if($_POST["savebutton"] == "Save") {
	if( !empty($_POST["Name"]) && 
    !empty($_POST["Email"]) && 
    !empty($_POST["Message"]) && 
	!empty($_POST["Date"]) ){
	mysql_query("UPDATE contacts set Name='$_POST[Name]',Email='$_POST[Email]',Message='$_POST[Message]',Date=' $_POST[Date]' where ID='$_POST[versteckt]'");
	} else {
		echo "Please fill in all information.";
	}
}
$w = mysql_query("select * from contacts where Name='New contact'");
if (mysql_num_rows($w) == 0) { 
	mysql_query("insert into contacts (Name) values ('New contact')");
} 
?>

		<form method="POST" action="admin.php?site=contacts">
         <select name="aktcontact">
             <?php
             if(!isset($_POST["aktcontact"])) $_POST["aktcontact"] = "";
             $contacts = mysql_query("select Name from contacts order by ID asc");
             while($ds = mysql_fetch_assoc($contacts)) {
                 echo "<option value='$ds[Name]'";
                 if ($ds["Name"] == $_POST["aktcontact"]) echo " selected";
                 echo">$ds[Name]</option>";
             }
             ?>
         </select>
         <input class="input" type="submit" value="GO">
<?php
echo "<table>";
$contactslist = mysql_query("select * from contacts");
while($stream = mysql_fetch_assoc($contactslist)) {
	echo "<tr>";
	echo "<td>$stream[Name] </td>";
	echo "<td>$stream[Email] </td>";
	echo "<td>$stream[Message] </td>";
	echo "<td>$stream[Date]</td>";
	echo "<tr>";
}
echo "</table>";

?>

<?php
if($_POST['aktcontact'] == "New contact") {
$contacts = mysql_query("select * from contacts where Name ='$_POST[aktcontact]' order by Name ASC");
while($zeile=mysql_fetch_assoc($contacts)) {
	$key = $zeile["ID"];
	$data[$key] = $zeile;
}
mysql_close($db_link);

echo"<table cellspacing=0 >";
        echo "<tr>";
        foreach($data[$key] as $datenfeld => $wert) {
                 echo "<th>" . $datenfeld . " </th>";
            }
        echo "</tr>";       
        foreach ($data as $primary => $datensatz) {
            echo"<tr>";        
            foreach($datensatz as $datenfeld => $wert) {
                 if ($datenfeld == "ID") {
                     echo "<td>" . $wert . " <input type=hidden name=versteckt value='$wert'></td>";
            } elseif ($datenfeld == "Message") {
                     echo "<td><TEXTAREA rows=5 cols=30 name=$datenfeld>
" . $wert . "</TEXTAREA></td>";
            } elseif ($datenfeld == "Date") {
                     echo "<td><input type=date name=$datenfeld value='$wert'></td>";
            } else {
                echo "<td><input type=text name=$datenfeld value='$wert'></td>";
            }
            }
            echo "</tr>";
            }
        echo"</table>";
}
?>
<input type="submit" value="Save" name="savebutton">
</form>