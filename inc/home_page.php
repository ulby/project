<?php
if(!isset($_POST["savebutton"])) $_POST["savebutton"] = "";
if($_POST["savebutton"] == "Save") {
	if( !empty($_POST["Name"]) && 
    !empty($_POST["Category"]) && 
    !empty($_POST["Description"]) && 
	!empty($_POST["Popularity"]) && 
	!empty($_POST["big_image"]) && 
    !empty($_POST["thumbnail"]) ){
	mysql_query("UPDATE products set Name='$_POST[Name]',Category='$_POST[Category]',Description='$_POST[Description]',Popularity=' $_POST[Popularity]',big_image='$_POST[big_image]',thumbnail='$_POST[thumbnail]' where ID='$_POST[versteckt]'");
	} else {
		echo "Please fill in all information.";
	}
} else {
}
?>



<form action="inc/upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
