<?php
require_once "Database.php";
require_once "Farmer.php";

$pdo = (new Database())->connect();
$farmer = new Farmer($pdo);

$farmers = $farmer->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Farmers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 font-sans">

    <!-- Universal Top Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">All Farmers</h2>
        <a href="index_tailwind.php" class="px-3 py-1 bg-gray-600 text-white rounded text-sm">Back</a>
    </div>

    <!-- Table -->
    <table class="w-full border border-collapse text-left text-sm">
        <tr class="bg-gray-100 border-b">
            <th class="p-2 border">ID</th>
            <th class="p-2 border">First</th>
            <th class="p-2 border">Last</th>
            <th class="p-2 border">Contact</th>
            <th class="p-2 border">Address</th>
            <th class="p-2 border">Date</th>
        </tr>
        <?php foreach ($farmers as $row): ?>
        <tr class="border-b hover:bg-gray-50">
            <td class="p-2 border"><?= htmlspecialchars($row["farmer_id"]) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($row["first_name"]) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($row["last_name"]) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($row["contact_number"]) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($row["address"]) ?></td>
            <td class="p-2 border"><?= htmlspecialchars($row["date_registered"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
