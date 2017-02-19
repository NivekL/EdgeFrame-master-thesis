<?php
require "dbcon.php";

file_put_contents("log.txt", print_r($_GET['q'], true));
$dataFromJSON = json_decode($_GET['q']);
file_put_contents("log2.txt", print_r($dataFromJSON, true));

$sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`, `itemdata`) VALUES (:id, :content)";
$stmt = $dbh->prepare($sql);

foreach ($dataFromJSON as $element) {



  $id = $element[0];
  $content = $element[1];

  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':content', $content);

  $stmt->execute();
}


?>
