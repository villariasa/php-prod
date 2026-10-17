<?php
require_once "Database.php";
require_once "Farmer.php";

$pdo = (new Database())->connect();
$farmer = new Farmer($pdo);

$result = null;
$searched = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searched = true;
    $result = $farmer->getById((int) $_POST["farmer_id"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Farmer By ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h3 class="mb-0">Get Farmer By ID</h3>
            </div>

            <div class="card-body">
                <form method="POST" class="mb-4">
                    <div class="mb-3">
                        <label class="form-label">Farmer ID</label>
                        <input type="number" name="farmer_id" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-info">Search</button>
                    <a href="index.php" class="btn btn-secondary">Back to Index</a>
                </form>

                <?php if ($result): ?>
                    <table class="table table-bordered">
                        <tr><th>Farmer ID</th><td><?= htmlspecialchars($result["farmer_id"]) ?></td></tr>
                        <tr><th>First Name</th><td><?= htmlspecialchars($result["first_name"]) ?></td></tr>
                        <tr><th>Last Name</th><td><?= htmlspecialchars($result["last_name"]) ?></td></tr>
                        <tr><th>Contact Number</th><td><?= htmlspecialchars($result["contact_number"]) ?></td></tr>
                        <tr><th>Address</th><td><?= htmlspecialchars($result["address"]) ?></td></tr>
                        <tr><th>Date Registered</th><td><?= htmlspecialchars($result["date_registered"]) ?></td></tr>
                    </table>
                <?php elseif ($searched): ?>
                    <div class="alert alert-warning">Farmer not found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
