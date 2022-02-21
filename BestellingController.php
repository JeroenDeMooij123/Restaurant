<?php
class BestellingController
{
  public $conn;
  public function __construct()
  {
    $conn = new PDO("mysql:host=localhost;dbname=ExcellentTaste;", "root", "");
    $this->conn = $conn;
  }

  public function LijstBestelling()
  {
?>
    <table>
      <thead>
        <tr>

          <th>Product Naam</th>
          <th>Aantal</th>

        </tr>
      </thead>
      <tbody>
        <?php
        //Id pakken van de klant en de query voor bereiden om alle producten op te halen die de klant heeft bestelt
        $ID = $_GET['ID'];
        $query = "SELECT * FROM bestellingen INNER JOIN menuitems ON bestellingen.Menuitem_ID = menuitems.ID where Reservering_ID = :ID";
        $stm = $this->conn->prepare($query);
        $stm->bindParam(":ID", $ID);
        if ($stm->execute() == true) {
          $bestellingen = $stm->fetchAll(PDO::FETCH_OBJ);
          foreach ($bestellingen as $bestelling) {
            echo "<tr>";
        ?>



            <td><?= $bestelling->mNaam ?> </td>
            <td><?= $bestelling->Aantal ?></td>

        <?php
          }
        }

        ?>
    </table>
<?php
  }
}
