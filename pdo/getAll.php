<?php
require_once "Database.php";
require_once "Farmer.php";

$pdo = (new Database())->connect();
$farmer = new Farmer($pdo);

$farmers = $farmer->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Farmers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">All Farmers</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
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
                                    <td><?= htmlspecialchars($row["farmer_id"]) ?></td>
                                    <td><?= htmlspecialchars($row["first_name"]) ?></td>
                                    <td><?= htmlspecialchars($row["last_name"]) ?></td>
                                    <td><?= htmlspecialchars($row["contact_number"]) ?></td>
                                    <td><?= htmlspecialchars($row["address"]) ?></td>
                                    <td><?= htmlspecialchars($row["date_registered"]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="index.php" class="btn btn-secondary">Back to Index</a>
            </div>
        </div>
    </div>
</body>
</html>
