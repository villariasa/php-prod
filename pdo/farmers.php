<?php
require_once "Database.php";
require_once "Farmer.php";

$database = new Database();
$pdo = $database->connect();

$farmer = new Farmer($pdo);
$farmers = $farmer->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Farmer List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Farmer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($farmers as $row): ?>
                    <tr>
                        <td><?= $row["farmer_id"] ?></td>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["contact_number"] ?></td>
                        <td><?= $row["address"] ?></td>
                        <td><?= $row["date_registered"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>