<a href="#" id="larger">+</a>
<a href="#" id="smaller">-</a>
<script>
  $( "#larger" ).click(function() {
	  $( "p" ).css("fontSize", "+=2px");
	});
	$( "#smaller" ).click(function() {
	  $( "p" ).css("fontSize", "-=2px");
	});
</script>



<form action="?site=contacts" method="POST">
<select name="catselect">
<?php
$query = mysql_query("Select Name from categories");
while ($stream = mysql_fetch_assoc($query)) {
	echo "<option value='$stream[Name]'";
	if($_POST['catselect'] == $stream['Name']) { echo "selected";};
	echo ">$stream[Name]</option>";
}
?>
</select>
<input type="submit" name="savebutton" value="Save">
</form>




echo "<table>";
if(!isset($_POST['catselect'])) $_POST['catselect'] = "%";
$contactslist = mysql_query("select * from contacts where message LIKE '$_POST[catselect]' order by rand()");
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




$cat_test = mysql_query("Select Name from categories where Name = '$_POST[message]'");
	if(mysql_num_rows($cat_test) < 0) {
		mysql_query("INSERT INTO categories (Name) values ('$_POST[message]');");
	}
