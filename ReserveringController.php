<?php
class reserveringController
{
  public $conn;
  public function __construct()
  {
    $conn = new PDO("mysql:host=localhost;dbname=ExcellentTaste;", "root", "");
    $this->conn = $conn;
  }

  public function LijstReservatie()
  {

?>
    <table>
      <thead>
        <tr>
          <th>Tafel</th>
          <th>Datum</th>
          <th>Tijd</th>
          <th>Klantnaam</th>
          <th>Aantal Personen</th>
          <th>Delete</th>
          <th>Bon</th>
        </tr>
      </thead>
      <tbody>
        <?php
//Alle reserveringen ophalen
        $query = "SELECT * FROM reserveringen";
        $stm = $this->conn->prepare($query);
        if ($stm->execute() == true) {
          $reserveringen = $stm->fetchAll(PDO::FETCH_OBJ);
          foreach ($reserveringen as $reservering) {
            echo "<tr>";


        ?>


            <td><?php echo "<a href=BestelLijst.php?ID=" . $reservering->ID . ">" . $reservering->Tafel . "</a>"; ?></td>
            <td><?php echo  $reservering->Datum; ?></td>
            <td><?php echo  $reservering->Tijd; ?> </td>
            <td><?php echo  $reservering->Klant_ID; ?> </td>
            <td><?= $total = $reservering->Aantal_v + $reservering->Aantal_k ?></td>
            <td> <?php echo "<a href=../Backend/Reserveringdelete.php?ID=" . $reservering->ID . ">Delete </a>"; ?></td>
            <td> <?php echo "<a href=../Frontend/Bon.php?ID=" . $reservering->ID . ">Bon </a>"; ?></td>
        <?php
          }
        }

        ?>
    </table>
<?php
  }
}
