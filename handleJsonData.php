<?php
session_start();
require "dbcon.php";
try {
// fetching json string from ajax request and decodes it
if ($_GET['q']) {
$dataFromJSON = json_decode($_GET['q']);

// Check if itemID is in DB

$countSql = "SELECT COUNT(*) FROM pageitem WHERE itemID = :itemID";

$countStmt = $dbh->prepare($countSql);
$countStmt->bindParam(':itemID', $id);

// INSERT!

$sql = "INSERT INTO `dragndrop`.`pageitem` (`itemID`, `itemdata`, `xPos`, `yPos`, `itemHeight`, `itemWidth`, `userID`)
VALUES (:id, :content, :xpos, :ypos, :height, :width, :userID)";

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

  if ($rowCount > 0) {

    // UPDATE!

    $updateSql = "UPDATE `dragndrop`.`pageitem` SET `xPos` = :xpos, `yPos` = :ypos, `itemHeight` = :height, `itemWidth` = :width, `itemdata` = :content WHERE `itemID` = :id";

    $updateStmt = $dbh->prepare($updateSql);

    $updateStmt->bindParam(':id', $id);
    $updateStmt->bindParam(':xpos', $xPosition);
    $updateStmt->bindParam(':ypos', $yPosition);
    $updateStmt->bindParam(':height', $height);
    $updateStmt->bindParam(':width', $width);
    $updateStmt->bindParam(':content', $content);

    $updateStmt->execute();

  } else {

    // INSERT!

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

// DELETE!

$itemID = file_get_contents("php://input");

$deleteFromSql = "DELETE FROM `dragndrop`.`pageitem` WHERE `itemID`= :id";

$deleteStmt = $dbh->prepare($deleteFromSql);

$deleteStmt->bindParam(':id', $itemID);
$deleteStmt->execute();

}

//Error handling
} catch (Exception $e) {
  print "something went wrong\n ". $e;
} finally {
  print "This part is always executed\n";
}

?>
