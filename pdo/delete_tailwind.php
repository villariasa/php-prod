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
<html>
<head>
    <title>Delete Farmer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 max-w-sm mx-auto font-sans">

    <!-- Universal Top Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Delete Farmer</h2>
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
            <input type="number" name="farmer_id" placeholder="Enter ID to Delete" class="w-full p-2 border rounded flex-1" required>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded font-medium">Find</button>
        </form>

    <!-- STEP 2: Confirmation & Delete Form -->
    <?php else: ?>
        <div class="border border-red-200 p-3 rounded bg-red-50 text-sm space-y-1 mb-4 text-red-800">
            <p class="font-bold">Are you sure you want to delete?</p>
            <p><b>ID:</b> <?= htmlspecialchars($record["farmer_id"]) ?></p>
            <p><b>Name:</b> <?= htmlspecialchars($record["first_name"] . " " . $record["last_name"]) ?></p>
            <p><b>Contact:</b> <?= htmlspecialchars($record["contact_number"]) ?></p>
            <p><b>Address:</b> <?= htmlspecialchars($record["address"]) ?></p>
        </div>

        <form method="POST">
            <input type="hidden" name="farmer_id" value="<?= htmlspecialchars($record["farmer_id"]) ?>">

            <button type="submit" class="w-full p-2 bg-red-600 text-white rounded font-medium">Delete Farmer</button>
            <a href="delete_tailwind.php" class="block text-center text-xs text-gray-500 hover:underline pt-2">Cancel</a>
        </form>
    <?php endif; ?>

</body>
</html>
