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

    $farmer->update(
        $farmer_id,
        trim($_POST["first_name"]),
        trim($_POST["last_name"]),
        trim($_POST["contact_number"]),
        trim($_POST["address"])
    );

    $message = "Farmer updated successfully.";
    $record = $farmer->getById($farmer_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Farmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h3 class="mb-0">Update Farmer</h3>
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

                        <button type="submit" class="btn btn-warning">Find Farmer</button>
                        <a href="index.php" class="btn btn-secondary">Back to Index</a>
                    </form>
                <?php else: ?>
                    <form method="POST">
                        <input type="hidden" name="farmer_id" value="<?= htmlspecialchars($record["farmer_id"]) ?>">

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($record["first_name"]) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($record["last_name"]) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" value="<?= htmlspecialchars($record["contact_number"]) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($record["address"]) ?>" required>
                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="update.php" class="btn btn-outline-secondary">Search Another</a>
                        <a href="index.php" class="btn btn-secondary">Back to Index</a>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
