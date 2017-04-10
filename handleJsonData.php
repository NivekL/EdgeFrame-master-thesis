<?php
session_start();
require "dbcon.php";
try {
if ($_GET['q']) {
//file_put_contents("log.txt", print_r($_GET['q'], true));
$dataFromJSON = json_decode($_GET['q']);
//file_put_contents("log2.txt", print_r($dataFromJSON, true));

// Kolla om itemID finns i DB

$countSql = "SELECT COUNT(*) FROM pageitem WHERE itemID = :itemID";

$countStmt = $dbh->prepare($countSql);
$countStmt->bindParam(':itemID', $id);

$sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`, `itemdata`, `xPos`, `yPos`, `itemHeight`, `itemWidth`, `userID`)
VALUES (:id, :content, :xpos, :ypos, :height, :width, :userID)";
// ON DUPLICATE KEY UPDATE (`itemID` = `itemID` + 1)";
$stmt = $dbh->prepare($sql);

foreach ($dataFromJSON as $element) {



  $id = $element[0];
  $content = $element[1];
  $xPosition = $element[2];
  $yPosition = $element[3];
  $height = $element[4];
  $width = $element[5];
  $userID = $_SESSION['userSession'];

$countStmt->execute();
$rowCount = $countStmt->fetchColumn();

// $rowCount = 0;
//  var_dump($rowCount);

  if ($rowCount > 0) {

    // UPDATE!

    $insertSql = "UPDATE `dragndrop`.`pageitem` SET `xPos` = :xpos, `yPos` = :ypos, `itemHeight` = :height, `itemWidth` = :width, `itemdata` = :content WHERE `itemID` = :id";

    $insertStmt = $dbh->prepare($insertSql);

    $insertStmt->bindParam(':id', $id);
    $insertStmt->bindParam(':xpos', $xPosition);
    $insertStmt->bindParam(':ypos', $yPosition);
    $insertStmt->bindParam(':height', $height);
    $insertStmt->bindParam(':width', $width);
    $insertStmt->bindParam(':content', $content);

    $insertStmt->execute();

  } else {

    // Insert!

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':xpos', $xPosition);
    $stmt->bindParam(':ypos', $yPosition);
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':width', $width);
    $stmt->bindParam(':userID', $_SESSION['userSession']);

    $stmt->execute();
  }
}

} else {
$itemID = file_get_contents("php://input");



$deleteFromSql = "DELETE FROM `dragndrop`.`pageitem` WHERE `itemID`= :id";

$deleteStmt = $dbh->prepare($deleteFromSql);

$deleteStmt->bindParam(':id', $itemID);
$deleteStmt->execute();

}

} catch (Exception $e) {
  print "something went wrong\n ". $e;
} finally {
  print "This part is always executed\n";
}

?>
