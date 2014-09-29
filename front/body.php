<div class="warp">
<header>
<?php include("front/navi.php");?>
</header>
<section>
<?php
if(isset($_GET['site'])) {include("front/" . $site ."_page.php");}
else { 
$site_content = mysql_query("select * from content");
$zeile = mysql_fetch_array($site_content);
?>

<div class="content">
<h1>Company X</h1>
<p class="text"><?php echo $zeile['about_text'];?></p>
<br />
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
<div>
<img src="<?php echo $zeile['img1'];?>" width="450" style="float:left" />
<img src="<?php echo $zeile['img2'];?>" width="450" style="float:left" />
</div>
<style>
div.animation {
    -webkit-animation: myfirst 5s; /* Chrome, Safari, Opera */
    animation: myfirst 5s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes myfirst {
    from {background: red;}
    to {background: yellow;}
}

/* Standard syntax */
@keyframes myfirst {
    from {background: red;}
    to {background: yellow;}
}
</style>
<div class="animation">
	
</div>
</div>
<?php
}
?>
</section>
</div>