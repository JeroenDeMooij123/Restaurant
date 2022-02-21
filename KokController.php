<?php
class KokController
{
  private $conn;

  function __construct()
  {
    $conn = new PDO("mysql:host=localhost;dbname=ExcellentTaste;", "root", "");
    $this->conn = $conn;
  }



  //Lijst
  public function Koklijst()
  {
?>
    <table>
      <thead>
        <tr>

          <th>Tafel</th>
          <th>Aantal</th>
          <th>Gerecht</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Al het eten uit de database opahalen dat nog niet geserveerd is
        $query = "SELECT * FROM `bestellingen` AS b INNER JOIN menuitems AS m ON b.Menuitem_ID = m.ID INNER JOIN gerechtsoorten AS g ON m.Gerechtsoort_ID = g.ID INNER JOIN reserveringen AS r ON b.Reservering_ID = r.ID WHERE g.Gerechtcategorie_ID = 2  AND  b.Geserveerd = 1";
        $stm = $this->conn->prepare($query);
        if ($stm->execute() == true) {

          $kokl = $stm->fetchAll(PDO::FETCH_OBJ);

          foreach ($kokl as $kok) {

            echo "<tr>";
        ?>



            <td><?php echo $kok->Tafel; ?> </td>
            <td><?php echo $kok->Aantal; ?> </td>
            <td><?php echo $kok->mNaam; ?> </td>

        <?php
          }
        }

        ?>
    </table>
<?php
  }
}
