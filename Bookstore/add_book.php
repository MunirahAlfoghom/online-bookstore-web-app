
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $t = $conn->real_escape_string($_POST['title']);
    $a = $conn->real_escape_string($_POST['author']);
    $p = (float)$_POST['price'];
    $c = (int)$_POST['category_id'];

    $conn->query("INSERT INTO books (title, author, price, category_id) VALUES ('$t', '$a', $p, $c)");
    header('Location: books.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
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
  <h2>Add Book</h2>
  <form id="bookForm" method="post" action="add_book.php">
    <label for="title">Title:</label>
    <input id="title" name="title" required>

    <label for="author">Author:</label>
    <input id="author" name="author" required>

    <label for="price">Price:</label>
    <input id="price" name="price" required>

    <label for="category">Category:</label>
    <select id="category" name="category_id" required>
      <option value="">--Select--</option>
      <?php
      $c = $conn->query("SELECT * FROM categories");
      while($cat = $c->fetch_assoc()):
      ?>
      <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
      <?php endwhile; ?>
    </select>

    <button type="submit">Add</button>
  </form>
</div>
</body>
</html>
