<?php
include("config.php");

if (isset($_POST['btnOpslaan'])) {

    $mCode = $_POST['txtmCode'];
    $mNaam = $_POST['txtmNaam'];
    $Prijs = $_POST['txtPrijs'];
    $Gerechtsoort_ID = $_POST['txtGerechtsoort_ID'];

//Id ophalen
    $Code = $_GET['ID'];
//query om de gegevens uptedaten van het opgehaalde ID
    $query = "UPDATE menuitems SET mCode = '$mCode', mNaam  = '$mNaam', Prijs = '$Prijs', Gerechtsoort_ID = '$Gerechtsoort_ID' WHERE ID = $Code";
    $stm = $conn->prepare($query);
    if ($stm->execute()) {
        header('Location: /ExcellentTaste/Frontend/ReserveringenOverzicht.php');
    }
}



$Code = $_GET['ID'];
//gegevens in de text velden inladen

$query = "SELECT * FROM menuitems WHERE ID = $Code";

$stm = $conn->prepare($query);

if ($stm->execute()) {

    $res = $stm->fetch(PDO::FETCH_OBJ);
?>
    <form method="POST">
        <input type="text" name="txtID" readonly value="<?php echo $res->ID; ?>" /></br>
        <input type="text" name="txtmCode" readonly value="<?php echo $res->mCode; ?>" /></br>
        <input type="text" name="txtmNaam" readonly value="<?php echo $res->mNaam; ?>" /></br>
        <input type="text" name="txtPrijs" value="<?php echo $res->Prijs; ?>" /></br>
        <input type="text" name="txtGerechtsoort_ID" readonly value="<?php echo $res->Gerechtsoort_ID; ?>" /></br>


        <input type="submit" name="btnOpslaan" value="Opslaan" />

    </form>

<?php
}
?>
</body>

</html>