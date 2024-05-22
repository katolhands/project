<?php 
session_start();
    include("connection.php");
    include("functions.php");
    include("db.php");

$user_data = check_login($con); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventory Database</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: #fff;
        font-weight: bold;
    }

    td {
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    td.editable {
        cursor: pointer;
    }

    td.editable:hover {
        background-color: #e9e9e9;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f4f9;
    }

    .logout-link {
        position: absolute;
        top: 10px;
        right: 10px;
        text-decoration: none;
        background-color: #007BFF;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .logout-link:hover {
        background-color: #0056b3;
    }

    .save-button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .save-button:hover {
        background-color: #218838;
    }
</style>
</head>
<body>

<div class="container">
    <a href="login.php" class="logout-link">Logout</a>
    <button onclick="saveChanges()" class="save-button">Save Changes</button>

    <h2>Sales Table</h2>
    <table id="salesTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>QuantitySold</th>
                <th>PricePerUnit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sales = [
                ["2024-05-15", "Water Bottle", 20, 1.5],
                ["2024-05-15", "Soda Can", 15, 1],
                ["2024-05-14", "Chips Pack", 30, 2]
            ];
            
            foreach ($sales as $sale) {
                echo "<tr>";
                foreach ($sale as $value) {
                    echo "<td class='editable' contenteditable='true'>$value</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Inventory Table</h2>
    <table id="inventoryTable">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity Available</th>
                <th>Price Per Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $inventory = [
                ["Water Bottle", 100, 1.5],
                ["Soda Can", 50, 1],
                ["Chips Pack", 40, 2]
            ];

            foreach ($inventory as $item) {
                echo "<tr>";
                foreach ($item as $value) {
                    echo "<td class='editable' contenteditable='true'>$value</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Water Refilling Table</h2>
    <table id="waterRefillingTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Quantity Refilled</th>
                <th>Price Per Liter</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $waterRefilling = [
                ["2024-05-15", 50, 0.5],
                ["2024-05-14", 40, 0.6],
                ["2024-05-13", 60, 0.5]
            ];

            foreach ($waterRefilling as $record) {
                echo "<tr>";
                foreach ($record as $value) {
                    echo "<td class='editable' contenteditable='true'>$value</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function saveChanges() {
        alert('Changes saved successfully!');
    }
</script>

</body>
</html> 
