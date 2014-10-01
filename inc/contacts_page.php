<?php
if(!isset($_POST["save"])) $_POST["save"] = "";
if($_POST["save"] == "Save") {
	$testing_email = $_POST["email"];
	if( !empty($_POST["name"]) &&
	!empty($_POST["email"]) &&
	filter_var($testing_email, FILTER_VALIDATE_EMAIL) &&
	!empty($_POST["message"]) &&
	!empty($_POST["date"])) {
		mysql_query("INSERT into contacts (Name,Email,Message,Date) values ('$_POST[name]','$_POST[email]','$_POST[message]','$_POST[date]')");
	} else {
		echo "Please fill in all information.";
	}
}
if(isset($_GET['del'])) {
	mysql_query("DELETE from contacts where ID = '$_GET[del]'");
}  
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
?>
<a href="?site=contacts&edit=new">ADD NEW</a>
<?php
echo "<table>";
$contactslist = mysql_query("select * from contacts");
while($stream = mysql_fetch_assoc($contactslist)) {
	echo "<tr>";
	echo "<td>$stream[Name] </td>";
	echo "<td>$stream[Email] </td>";
	echo "<td>$stream[Message] </td>";
	echo "<td>$stream[Date]</td>";
	echo "<td><a href='?site=contacts&edit=$stream[ID]'>EDIT</a></td>";
	echo "<td><a href='?site=contacts&del=$stream[ID]'>DELETE</a></td>";
	echo "<tr>";
}
echo "</table>";

?>
<form method="POST" action="?site=contacts">
<?php
if(isset($_GET['edit'])) {
	if($_GET['edit'] == "new") {
		?>
		<table>
			<tr>
				<td><input name="name" value="" placeholder="Name"></td>
				<td><input type="email" name="email" value="" placeholder="Email"></td>
				<td><textarea name="message" value="" placeholder="Message"></textarea></td>
				<td><input type="date" name="date"></td>
				<td><input type="submit" name="save" value="Save"></td>
			</tr>
		</table>
		</form>
		<?php	
	} else {
$contacts = mysql_query("select * from contacts where ID ='$_GET[edit]'");
while($zeile=mysql_fetch_assoc($contacts)) {
	$key = $zeile["ID"];
	$data[$key] = $zeile;
}
mysql_close();
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
?>
<input type="submit" value="Save" name="savebutton">
</form>
<?php }} ?>
