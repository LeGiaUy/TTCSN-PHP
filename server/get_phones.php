<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='phones' LIMIT 4");

$stmt->execute();

$phones_products = $stmt->get_result();

?>