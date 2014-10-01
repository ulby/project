<?php
if(!isset($_POST["savebutton"])) $_POST["savebutton"] = "";
if($_POST["savebutton"] == "Save") {
	if( !empty($_POST["Name"]) && 
    !empty($_POST["Category"]) && 
    !empty($_POST["Description"]) &&
	!empty($_POST["Popularity"]) && 
	preg_match("/^[1-5]+$/", $_POST["Popularity"]) !== 0 &&
	!empty($_POST["big_image"]) && 
    !empty($_POST["thumbnail"]) ){
	mysql_query("UPDATE products set Name='$_POST[Name]',Category='$_POST[Category]',Description='$_POST[Description]',Popularity=' $_POST[Popularity]',big_image='$_POST[big_image]',thumbnail='$_POST[thumbnail]' where ID='$_POST[versteckt]'");
	} else {
		echo "Please fill in all information.";
	}
} 
$w = mysql_query("select * from products where Name = 'Neues Produkt' ");
if (mysql_num_rows($w) == 0) { 
	mysql_query("insert into products (Name) values ('Neues Produkt')");
} 
?>

		<form method="POST" action="admin.php?site=products">
         <select name="aktproduct">
             <?php
             if(!isset($_POST["aktproduct"])) $_POST["aktproduct"] = "iPhone";
             $products = mysql_query("select Name from products order by Name asc");
             while($ds = mysql_fetch_assoc ($products)) {
				 if($ds['Name'] != "+ Neues Produkt") {
					 echo "<option value='$ds[Name]'";
					 if ($ds["Name"] == $_POST["aktproduct"]) echo " selected";
					 echo">$ds[Name]</option>";
				 } else {
				 	echo "<option value='new'>+ Neues Produkt</option>";
				 }
             }
             ?>
         </select>
         <input class="input" type="submit" value="GO">

<?php
$products = mysql_query("select * from products where Name ='$_POST[aktproduct]' order by Name ASC");
while($zeile=mysql_fetch_assoc($products)) {
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
            } elseif ($datenfeld == "Description") {
                     echo "<td><TEXTAREA rows=5 cols=30 name=$datenfeld>
$wert</TEXTAREA></td>";
            } elseif ($datenfeld == "Popularity") {
                     echo "<td><input type=number maxlength="1" name=$datenfeld value='$wert'></td>";
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
