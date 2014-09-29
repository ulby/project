<?php
if(!isset($_POST["savebutton"])) $_POST["savebutton"] = "";
echo "4";
if($_POST["savebutton"] == "Save") {
	echo "3";
	if($_POST["passinput1"] == $_POST["passinput2"]) {
		echo "1";
		$passinput = $_POST["passinput1"];
		$newpass = md5($passinput);
		mysql_query("UPDATE login set pass='$newpass'");
		$feedback = "You password has been saved";
	} else {
		echo "2";
		$feedback = "ERROR - Password needs to be iqual";
	}
	echo "Feedback: ";
	echo $feedback;
}
	

?>


<form action="admin.php?site=profil" method="POST">
<input name="passinput1" type="password" placeholder="New Password"/>
<input name="passinput2" type="password" placeholder="Retype Password"/>
<input type="submit" value="Save" name="savebutton" />
</form>
