<?php
// update_book.php
include 'config.php';
$id    = intval($_POST['id']);
$title = $conn->real_escape_string($_POST['title']);
$author= $conn->real_escape_string($_POST['author']);
$price = floatval($_POST['price']);
$cat   = intval($_POST['category_id']);
$conn->query(
  "UPDATE books SET title='$title',author='$author',price=$price,category_id=$cat WHERE id=$id"
);
header('Location: books.php');
?>