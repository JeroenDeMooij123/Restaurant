<?php
class DrankenController
{
  private $conn;

  function __construct()
  {
    $conn = new PDO("mysql:host=localhost;dbname=ExcellentTaste;", "root", "");
    $this->conn = $conn;
  }


  //Drank toevoegen
  public function Dranktoevoegen($ID, $Code, $Naam, $Prijs, $Gerechtsoort_ID)
  {

    $query = "INSERT INTO menuitems VALUES(:ID,
                                            :Code,
                                            :Naam,
                                            :Prijs,
                                            :Gerechtsoort_ID)";
    $stm = $this->conn->prepare($query);
    $stm->bindParam(":ID", $ID);
    $stm->bindParam(":Code", $Code);
    $stm->bindParam(":Naam", $Naam);
    $stm->bindParam(":Prijs", $Prijs);
    $stm->bindParam(":Gerechtsoort_ID", $Gerechtsoort_ID);

    if ($stm->execute() == true) {
    } else {
    }
  }
  //Lijst op halen van alle dranken
  public function Dranklijst()
  {
?>
    <table>
      <thead>
        <tr>

          <th>Code</th>
          <th>Naam</th>
          <th>Prijs</th>
          <th>Gerechtssoort</th>
          <th>Delete</th>
          <th>Wijzig</th>
        </tr>
      </thead>
      <tbody>
        <?php
//Alle dranken ophalen uit de database en weergeven op de pagina
        $query = "SELECT * FROM menuitems AS m INNER JOIN gerechtsoorten AS gs ON m.Gerechtsoort_ID = gs.ID INNER JOIN gerechtcategorien AS gc ON gs.Gerechtcategorie_ID = gc.ID WHERE gc.Code = 'dr'";
        $stm = $this->conn->prepare($query);
        if ($stm->execute() == true) {

          $dranken = $stm->fetchAll(PDO::FETCH_OBJ);

          foreach ($dranken as $drank) {

            echo "<tr>";
        ?>



            <td><?php echo $drank->mCode; ?> </td>
            <td><?php echo $drank->mNaam; ?> </td>
            <td>€ <?php echo $drank->Prijs; ?> </td>
            <td><?php echo $drank->Gerechtsoort_ID; ?> </br></td>
            <td> <?php echo "<a href=../Backend/Drankendelete.php?mCode=" . $drank->mCode . ">Delete </a>"; ?></td>
            <td> <?php echo "<a href=../Backend/DrankWijzig.php?mCode=" . $drank->mCode . ">Wijzig </a>"; ?></td>
        <?php
          }
        }

        ?>
    </table>
<?php
  }
}
