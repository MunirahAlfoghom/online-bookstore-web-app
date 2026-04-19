<?php
// edit_book.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

// Corrected line — add $
$id = intval($_GET['id']);

// Fetch the book
$res = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Book</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets/js/validation.js" defer></script>
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
  <h2>Edit Book</h2>
  <form id="bookForm" action="update_book.php" method="post">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="<?= $book['price'] ?>" required>

    <label for="category">Category:</label>
    <select id="category" name="category_id" required>
      <option value="">--Select--</option>
      <?php
      $cats = $conn->query("SELECT * FROM categories");
      while($c = $cats->fetch_assoc()):
      ?>
        <option value="<?= $c['id'] ?>" <?= $c['id'] == $book['category_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($c['name']) ?>
        </option>
      <?php endwhile; ?>
    </select>

    <button type="submit">Update Book</button>
  </form>
</div>

</body>
</html>
