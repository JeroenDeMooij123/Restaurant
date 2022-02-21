<?php
include "config.php";
//reserverings ID ophalen en Deleten
if (isset($_GET['ID'])) {
  $ID = $_GET['ID']; {
    $stm = $conn->prepare("DELETE FROM reserveringen WHERE ID=:ID");
    $stm->bindparam(":ID", $ID);
    $stm->execute();
    header('Location: /ExcellentTaste/Frontend/ReserveringenOverzicht.php');
    return true;
  }
}
