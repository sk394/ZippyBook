<?php
session_start();
$count = 0;

$title = "Index";
require_once "./Main/section.php";
require_once "./database/database.php";
$conn = db_connect();
$row = selectLatestBook($conn);

if ($row !== null && is_array($row)) {
?>
  <p class="lead text-center text-muted">New Books</p>
  <div class="row">
    <?php foreach ($row as $book) { ?>
      <div class="col-md-3">
        <?php if (isset($book['book_isbn']) && isset($book['book_image']) && isset($book['book_price'])) { ?>
          <a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>" class="image-container">
            <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
              <span class="price">$<?php echo $book['book_price']; ?></span>
          </a>
        <?php } else {
          echo "Invalid book data"; // Handle the case where $book is missing expected keys.
        } ?>
      </div>
    <?php } ?>
  </div>
<?php
} else {
  echo "No books found"; // Handle the case where $row is empty or not an array.
}

if (isset($conn)) {
  mysqli_close($conn);
}

require_once "./Main/footer.php";
?>

<style>
  .image-container {
  position: relative;
}

.price {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #fff; /* Optional: You can add a background color to make the price stand out */
  padding: 5px; /* Optional: Add some padding to the price element */
}
</style>