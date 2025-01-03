<?php
class Database
{
  private $connection;

  public function __construct()
  {
    $this->connection = new PDO("sqlite:pharmacy.db");
  }

  public function addDrug(
    $name,
    $dose,
    $originalPrice,
    $sellingPrice,
    $quantity,
    $expirationDate
  ) {
    $stmt = $this->connection->prepare(
      "INSERT INTO drugs (name, dose, original_price, selling_price, quantity, expiration_date) VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->execute([
      $name,
      $dose,
      $originalPrice,
      $sellingPrice,
      $quantity,
      $expirationDate,
    ]);
  }

  public function recordSale($drugId, $quantitySold)
  {
    // Reduce the quantity in the drugs table
    $stmt = $this->connection->prepare(
      "UPDATE drugs SET quantity = quantity - ? WHERE id = ?"
    );
    $stmt->execute([$quantitySold, $drugId]);

    // Insert into sales table
    $stmt = $this->connection->prepare(
      "INSERT INTO sales (drug_id, quantity_sold) VALUES (?, ?)"
    );
    $stmt->execute([$drugId, $quantitySold]);
  }

  public function getDrugs()
  {
    return $this->connection
      ->query("SELECT * FROM drugs")
      ->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
