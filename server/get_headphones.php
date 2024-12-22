<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='headphones' LIMIT 4");

$stmt->execute();

$headphones_products = $stmt->get_result();

?>