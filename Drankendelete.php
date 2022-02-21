<?php
include "config.php";
//Code van de drank ophalen en daarna verwijderen
if (isset($_GET['mCode'])) {
  $mCode = $_GET['mCode']; {
    $stm = $conn->prepare("DELETE FROM menuitems WHERE mCode=:mCode");
    $stm->bindparam(":mCode", $mCode);
    $stm->execute();
    header('Location: /ExcellentTaste/Frontend/Dranken.php');
    return true;
  }
}
