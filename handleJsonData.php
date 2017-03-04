<?php
require "dbcon.php";

//file_put_contents("log.txt", print_r($_GET['q'], true));
$dataFromJSON = json_decode($_GET['q']);
//file_put_contents("log2.txt", print_r($dataFromJSON, true));

$sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`, `itemdata`, `xPos`, `yPos`, `itemHeight`, `itemWidth`) VALUES (:id, :content, :xpos, :ypos, :height, :width)";
$stmt = $dbh->prepare($sql);

foreach ($dataFromJSON as $element) {



  $id = $element[0];
  $content = $element[1];
  $xPosition = $element[2];
  $yPosition = $element[3];
  $height = $element[4];
  $width = $element[5];

  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':xpos', $xPosition);
  $stmt->bindParam(':ypos', $yPosition);
  $stmt->bindParam(':height', $height);
  $stmt->bindParam(':width', $width);

  $stmt->execute();
}


?>
