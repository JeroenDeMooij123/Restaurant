<?php
include("config.php");

if (isset($_POST['btnOpslaan'])) {

    $mCode = $_POST['txtmCode'];
    $mNaam = $_POST['txtmNaam'];
    $Prijs = $_POST['txtPrijs'];
    $Gerechtsoort_ID = $_POST['txtGerechtsoort_ID'];
//Code van de drank ophalen en daarna wijzigen met de ingevulde gegevens

    $Code = $_GET['mCode'];

    $query = "UPDATE menuitems SET mCode = '$mCode', mNaam  = '$mNaam', Prijs = '$Prijs', Gerechtsoort_ID = '$Gerechtsoort_ID' WHERE mCode = $Code";
    $stm = $conn->prepare($query);
    if ($stm->execute()) {
        header('Location: /ExcellentTaste/Frontend/Dranken.php');
    }
}



$Code = $_GET['mCode'];


$query = "SELECT * FROM menuitems WHERE mCode = $Code";

$stm = $conn->prepare($query);

if ($stm->execute()) {

    $res = $stm->fetch(PDO::FETCH_OBJ);
?>
    <form method="POST">
        <input type="text" name="txtID" readonly value="<?php echo $res->ID; ?>" /></br>
        <input type="text" name="txtmCode" readonly value="<?php echo $res->mCode; ?>" /></br>
        <input type="text" name="txtmNaam" value="<?php echo $res->mNaam; ?>" /></br>
        <input type="text" name="txtPrijs" value="<?php echo $res->Prijs; ?>" /></br>
        <input type="text" name="txtGerechtsoort_ID" value="<?php echo $res->Gerechtsoort_ID; ?>" /></br>


        <input type="submit" name="btnOpslaan" value="Opslaan" />

    </form>

<?php
}
?>
</body>

</html>