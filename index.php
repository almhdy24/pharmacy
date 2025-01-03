<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Pharmacy Management System</h1>

        <h2>Add Drug</h2>
        <form id="add-drug-form">
            <input type="text" name="name" placeholder="Drug Name" required>
            <input type="text" name="dose" placeholder="Dose" required>
            <input type="number" name="original_price" placeholder="Original Price" step="0.01" required>
            <input type="number" name="selling_price" placeholder="Selling Price" step="0.01" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="date" name="expiration_date" placeholder="Expiration Date">
            <button type="submit">Add Drug</button>
        </form>

        <h2>Record Sale</h2>
        <form id="record-sale-form">
            <select name="drug_id" required>
                <!-- Dynamically filled with drugs -->
            </select>
            <input type="number" name="quantity_sold" placeholder="Quantity Sold" required>
            <button type="submit">Record Sale</button>
        </form>

        <h2>Drugs List</h2>
        <div id="drugs-list">
            <!-- Dynamically filled with drugs from the database -->
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>