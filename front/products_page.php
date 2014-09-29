

             <?php
             $products = mysql_query("select Category from products order by Name asc");
			 echo "<li><a href=?site=products>All</a></li>";
             while($ds = mysql_fetch_assoc ($products)) {
                 echo "<li><a href=?site=products&category=$ds[Category]>$ds[Category]</a></li>";
             }
             ?>

<?php
if(isset($_GET['category'])) {
	$products = mysql_query("select * from products where category='$_GET[category]'");
} else {
$products = mysql_query("select * from products");
}
while($zeile=mysql_fetch_assoc($products)) {
	$key = $zeile["ID"];
	$data[$key] = $zeile;
}
mysql_close($db_link);

	echo"<div class=content>";     
        foreach ($data as $primary => $datensatz) {
            echo"<div>";
			?>
            <div class="product-box">
            	<img src="<?php echo $datensatz[thumbnail];?>" alt="product image" height="150px" width="auto" />
				<h2><?php echo $datensatz[Name];?></h2>
            </div>
            <?php      
          
            echo "</div>";
            }
     echo"</div>";


/*
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
                     echo "<td>" . $wert . "</td>";
            } elseif ($datenfeld == "Description") {
                     echo "<td><p>
" . $wert . "</p></td>";
            } elseif ($datenfeld == "Popularity") {
                     echo "<td><p>" . $wert . "</p></td>";
            } else {
                echo "<td><p>" . $wert . "</p></td>";
            }
            }
            echo "</tr>";
            }
        echo"</table>";
?>
*/