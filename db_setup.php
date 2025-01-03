<?php
// Define the database file
$db_file = 'pharmacy.db';

// Create (or open) the database
try {
    $db = new PDO("sqlite:$db_file");
    // Set the error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL to create the drugs table
    $create_drugs_table = "
    CREATE TABLE IF NOT EXISTS drugs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        dose TEXT NOT NULL,
        original_price REAL NOT NULL,
        selling_price REAL NOT NULL,
        quantity INTEGER NOT NULL,
        expiration_date TEXT
    );";

    // SQL to create the sales table
    $create_sales_table = "
    CREATE TABLE IF NOT EXISTS sales (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        drug_id INTEGER,
        quantity_sold INTEGER,
        sale_date TEXT DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (drug_id) REFERENCES drugs (id)
    );";

    // Execute the queries
    $db->exec($create_drugs_table);
    $db->exec($create_sales_table);

    echo "Tables created successfully.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$db = null;
?>