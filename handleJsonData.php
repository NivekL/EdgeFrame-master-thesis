<?php
require "dbcon.php";

file_put_contents("log.txt", print_r($_GET['q'], true));
$dataFromJSON = json_decode($_GET['q']);
file_put_contents("log2.txt", print_r($dataFromJSON, true));
//$json = "Array";

//$JSONdata = explode($json, $_GET);

//var_dump($JSONdata);
/*try {
    $sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`/*, `itemlocation`, `itemdata`) VALUES (:json);";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':json', $JSONdata);
    $stmt->execute();

} catch (Exception $e) {
  var_dump($e);
}
*/

$sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`, `itemlocation`, `itemdata`) VALUES (:id, :location,:content)";
$stmt = $dbh->prepare($sql);

foreach ($dataFromJSON as $element) {



  $id = $element[0];
  $location = $element[1];
  $content = $element[2];

  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':location', $location);
  $stmt->bindParam(':content', $content);

  $stmt->execute();
}


?>
