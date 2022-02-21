<?php
class BonController
{
  public $conn;
  public function __construct()
  {
    $conn = new PDO("mysql:host=localhost;dbname=ExcellentTaste;", "root", "");
    $this->conn = $conn;
  }

  public function Bon()
  {
?>
    <table>
      <thead>



        <tr>
          <th>Product</th>
          <th>Aantal</th>
          <th>Prijs p/s</th>
          <th>Totaal</th>
          <th> Wijzig prijs</th>
          <th> PDF </th>


        </tr>
      </thead>
      <tbody>
        <?php
        //Alle producten weer geven op een bonnetje zodat de klant alles nog een keer kan na kijken
        $subtotal = 0;
        $ID = $_GET['ID'];
        $query = "SELECT * FROM bestellingen INNER JOIN menuitems ON bestellingen.Menuitem_ID = menuitems.ID where Reservering_ID = :ID";
        $stm = $this->conn->prepare($query);
        $stm->bindParam(":ID", $ID);
        if ($stm->execute() == true) {
          $bestellingen = $stm->fetchAll(PDO::FETCH_OBJ);
          foreach ($bestellingen as $bestelling) {
            echo "<tr>";


        ?>
            <td><?php echo  $bestelling->mNaam; ?></td>
            <td><?php echo  $bestelling->Aantal; ?> </td>
            <td>€<?php echo  $bestelling->Prijs; ?> </td>
            <td>€<?= $total = $bestelling->Prijs * $bestelling->Aantal ?></td>
            <td> <?php echo "<a href=../Backend/Prijswijzig.php?ID=" . $bestelling->ID . ">Wijzig Prijs </a>"; ?></td>
            <td> <?php echo "<a href=../Backend/fpdf184/bonpdf.php?ID=" . $bestelling->Reservering_ID . ">PDF </a>"; ?></td>





            </tr>
        <?php

          }
        }

        ?>
    </table>
<?php
  }
}
