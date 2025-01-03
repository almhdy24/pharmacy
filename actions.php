<?php
require 'database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'addDrug') {
            $db->addDrug($_POST['name'], $_POST['dose'], $_POST['original_price'], $_POST['selling_price'], $_POST['quantity'], $_POST['expiration_date']);
            echo json_encode(['success' => true]);
        } elseif ($_POST['action'] === 'recordSale') {
            $db->recordSale($_POST['drug_id'], $_POST['quantity_sold']);
            echo json_encode(['success' => true]);
        }
    }
}
?>