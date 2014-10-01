<?php
$file = 'img.zip'; //Dateiname entsprechend ändern

$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
  $zip->extractTo($path);
  $zip->close();
  echo "Glückwunsch! $file wurde erfolgreich nach $path exportiert.";
} else {
  echo "Die Datei $file konnte nicht gefunden/geöffnet werden.";
}
?>
<?php

$zip = new ZipArchive;
$res = $zip->open('img.zip');
if ($res) {
    $legitImage=explode('.',$zip->statIndex(0)['name']);
    echo $legitImage[1];
    if($legitImage[1]=='jpg')
    {
        echo "It's an image";
        //do your operations
        $zip->close();
    }
    else
    {
        unlink('img.zip');//Delete the zip file since it does not contain image
    }


}
*/
?>
