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
<html>
<head>
    <title>Update Farmer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 max-w-sm mx-auto font-sans">

    <!-- Universal Top Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Update Farmer</h2>
        <a href="index_tailwind.php" class="px-3 py-1 bg-gray-600 text-white rounded text-sm">Back</a>
    </div>

    <!-- Success Alert -->
    <?php if ($message): ?>
        <div class="p-3 mb-3 bg-green-50 border border-green-200 text-green-700 rounded text-sm">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <!-- STEP 1: Search Form (if no farmer selected yet) -->
    <?php if (!$record): ?>
        <form method="GET" class="flex gap-2">
            <input type="number" name="farmer_id" placeholder="Enter ID to Update" class="w-full p-2 border rounded flex-1" required>
            <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded font-medium">Find</button>
        </form>

    <!-- STEP 2: Edit Form (pre-filled with existing data) -->
    <?php else: ?>
        <form method="POST" class="space-y-3">
            <input type="hidden" name="farmer_id" value="<?= htmlspecialchars($record["farmer_id"]) ?>">

            <div>
                <label class="text-xs text-gray-500">First Name</label>
                <input type="text" name="first_name" value="<?= htmlspecialchars($record["first_name"]) ?>" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="text-xs text-gray-500">Last Name</label>
                <input type="text" name="last_name" value="<?= htmlspecialchars($record["last_name"]) ?>" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="text-xs text-gray-500">Contact Number</label>
                <input type="text" name="contact_number" value="<?= htmlspecialchars($record["contact_number"]) ?>" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="text-xs text-gray-500">Address</label>
                <input type="text" name="address" value="<?= htmlspecialchars($record["address"]) ?>" class="w-full p-2 border rounded" required>
            </div>

            <button type="submit" class="w-full p-2 bg-amber-500 text-white rounded font-medium">Save Update</button>
            <a href="update_tailwind.php" class="block text-center text-xs text-gray-500 hover:underline pt-1">Search Another</a>
        </form>
    <?php endif; ?>

</body>
</html>
