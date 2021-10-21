<?php
require 'class/DbConnection.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM books';
$vars = [];

// if (isset($_GET['title'])) {
//   // This is an example of a parameterized query
//   $sql = 'SELECT * FROM books WHERE id = ?';

//   //NOT THIS WAY
//   // $sql = 'SELECT * FROM offer WHERE studentId = ' . $_GET['student'];

//   $vars = [ $_GET['title'] ];
// }

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$books = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($books, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
