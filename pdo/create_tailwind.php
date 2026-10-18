<?php
require_once "Database.php";
require_once "Farmer.php";

$pdo = (new Database())->connect();
$farmer = new Farmer($pdo);

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $farmer_id = $farmer->create(
        trim($_POST["first_name"]),
        trim($_POST["last_name"]),
        trim($_POST["contact_number"]),
        trim($_POST["address"])
    );

    $message = "Farmer created successfully. Farmer ID: " . $farmer_id;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Farmer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 max-w-sm mx-auto font-sans">

    <!-- Universal Top Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Create Farmer</h2>
        <a href="index_tailwind.php" class="px-3 py-1 bg-gray-600 text-white rounded text-sm">Back</a>
    </div>

    <!-- Success Alert -->
    <?php if ($message): ?>
        <div class="p-3 mb-3 bg-green-50 border border-green-200 text-green-700 rounded text-sm">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" class="space-y-3">
        <input type="text" name="first_name" placeholder="First Name" class="w-full p-2 border rounded" required>
        <input type="text" name="last_name" placeholder="Last Name" class="w-full p-2 border rounded" required>
        <input type="text" name="contact_number" placeholder="Contact Number" class="w-full p-2 border rounded" required>
        <input type="text" name="address" placeholder="Address" class="w-full p-2 border rounded" required>

        <button type="submit" class="w-full p-2 bg-green-600 text-white rounded font-medium">Create</button>
    </form>

</body>
</html>
