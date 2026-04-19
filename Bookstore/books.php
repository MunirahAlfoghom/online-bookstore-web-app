<?php
include 'config.php';
// Handle delete
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $conn->query("DELETE FROM books WHERE id=$id");
  header('Location: books.php'); exit;
}
// Fetch books
$result = $conn->query(
  "SELECT b.id, b.title, b.author, b.price, c.name AS category
   FROM books b LEFT JOIN categories c ON b.category_id=c.id"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book List</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<nav>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="books.php">Books</a></li>
    <li><a href="add_book.php">Add Book</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="contact.html">Contact</a></li>
  </ul>
</nav>
  <div class="container">
    <h2>Books</h2>
    <table>
      <tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th><th>Category</th><th>Actions</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><?= number_format($row['price'],2) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td>
          <a href="edit_book.php?id=<?= $row['id'] ?>">Edit</a> |
          <a href="books.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this book?');">Delete</a>
        </td>
      </tr>
<?php endwhile; ?>
    </table>
  </div>
</body>
</html>