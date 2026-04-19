<?php
// delete_book.php
include 'config.php';
$id = intval($_GET['id']);
$conn->query("DELETE FROM books WHERE id=$id");
header('Location: books.php');
?>