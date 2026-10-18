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
<html>
<head>
    <title>Get Farmer By ID</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 max-w-sm mx-auto font-sans">

    <!-- Universal Top Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Find Farmer</h2>
        <a href="index_tailwind.php" class="px-3 py-1 bg-gray-600 text-white rounded text-sm">Back</a>
    </div>

    <!-- Search Form -->
    <form method="POST" class="flex gap-2 mb-4">
        <input type="number" name="farmer_id" placeholder="Enter Farmer ID" class="w-full p-2 border rounded flex-1" required>
        <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded font-medium">Search</button>
    </form>

    <!-- Case 1: Farmer was found -->
    <?php if ($result): ?>
        <div class="border p-4 rounded bg-gray-50 space-y-1 text-sm">
            <p><b>ID:</b> <?= htmlspecialchars($result["farmer_id"]) ?></p>
            <p><b>Name:</b> <?= htmlspecialchars($result["first_name"] . " " . $result["last_name"]) ?></p>
            <p><b>Contact:</b> <?= htmlspecialchars($result["contact_number"]) ?></p>
            <p><b>Address:</b> <?= htmlspecialchars($result["address"]) ?></p>
            <p><b>Date:</b> <?= htmlspecialchars($result["date_registered"]) ?></p>
        </div>

    <!-- Case 2: Searched, but farmer not found -->
    <?php elseif ($searched): ?>
        <p class="text-red-500 text-sm">Farmer not found.</p>
    <?php endif; ?>

</body>
</html>
