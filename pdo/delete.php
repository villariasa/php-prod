<?php
require_once "Database.php";
require_once "Farmer.php";

$pdo = (new Database())->connect();
$farmer = new Farmer($pdo);

$record = null;
$message = "";

if (isset($_GET["farmer_id"])) {
    $record = $farmer->getById((int) $_GET["farmer_id"]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $farmer_id = (int) $_POST["farmer_id"];
    $farmer->delete($farmer_id);
    $message = "Farmer deleted successfully.";
    $record = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Farmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-danger text-white">
                <h3 class="mb-0">Delete Farmer</h3>
            </div>

            <div class="card-body">
                <?php if ($message): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <?php if (!$record): ?>
                    <form method="GET">
                        <div class="mb-3">
                            <label class="form-label">Farmer ID</label>
                            <input type="number" name="farmer_id" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger">Find Farmer</button>
                        <a href="index.php" class="btn btn-secondary">Back to Index</a>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">
                        You are about to delete:
                        <strong><?= htmlspecialchars($record["first_name"] . " " . $record["last_name"]) ?></strong>
                    </div>

                    <table class="table table-bordered">
                        <tr><th>ID</th><td><?= htmlspecialchars($record["farmer_id"]) ?></td></tr>
                        <tr><th>Name</th><td><?= htmlspecialchars($record["first_name"] . " " . $record["last_name"]) ?></td></tr>
                        <tr><th>Contact</th><td><?= htmlspecialchars($record["contact_number"]) ?></td></tr>
                        <tr><th>Address</th><td><?= htmlspecialchars($record["address"]) ?></td></tr>
                    </table>

                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this farmer?');">
                        <input type="hidden" name="farmer_id" value="<?= htmlspecialchars($record["farmer_id"]) ?>">

                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="delete.php" class="btn btn-outline-secondary">Search Another</a>
                        <a href="index.php" class="btn btn-secondary">Back to Index</a>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
