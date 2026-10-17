<?php
require_once "Database.php";
require_once "Farmer.php";

$database = new Database();
$pdo = $database->connect();
$farmer = new Farmer($pdo);

// $farmers = $farmer->getAll();

// foreach($farmers as $row) {
// 	echo $row["farmer_id"] . " | "
//         . $row["first_name"] . " | "
//         . $row["last_name"] . " | "
//         . $row["contact_number"] . " | "
//         . $row["address"] . " | "
//         . $row["date_registered"]
//         . PHP_EOL;
// }

// $row = $farmer->getByID(5);

// if ($row) {
// 	echo $row["farmer_id"] . " | "
//         . $row["first_name"] . " | "
//         . $row["last_name"] . " | "
//         . $row["contact_number"] . " | "
//         . $row["address"] . " | "
//         . $row["date_registered"]
//         . PHP_EOL;
// } else {
// 	echo "Farmer not Found" . PHP_EOL; 
// }

$row = $farmer->create("Gloria", "Arroyo", "09213298787", "Cebu City, Cebu");
echo "Farmer created successfully." . PHP_EOL;
echo "Farmer ID " . $row . PHP_EOL;

// $row = $farmer->update(2008,"James","Buro","09213298787","Cebu City, Cebu");
// if ($row) {
// 	echo "Farmer successfully updated" . PHP_EOL;
// }

// $row = $farmer->getByID(19);
// if ($row) {
//     echo $row["farmer_id"] . " | "
//         . $row["first_name"] . " | "
//         . $row["last_name"] . " | "
//         . $row["contact_number"] . " | "
//         . $row["address"] . " | "
//         . $row["date_registered"]
//         . PHP_EOL;
// }

// $row = $farmer->delete(19);
// if ($row){
// 	echo "Farmer successfully deleted" . PHP_EOL;
// }

// $row = $farmer->getByID(19);
// if ($row) {
//     echo $row["farmer_id"] . " | "
//         . $row["first_name"] . " | "
//         . $row["last_name"] . " | "
//         . $row["contact_number"] . " | "
//         . $row["address"] . " | "
//         . $row["date_registered"]
//         . PHP_EOL;
// } else {

//     echo "Farmer not found." . PHP_EOL;
// }