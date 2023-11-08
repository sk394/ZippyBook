<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_isbn = $_POST['book_isbn'];
    require_once "./database/database.php";
    $conn = db_connect();
    $query = "DELETE FROM books WHERE book_isbn = '$book_isbn'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error while deleting: " . mysqli_error($conn);
    } else {
        echo "Successfully deleted one record.";
        header("Location: admin_homepage.php");
    }
} else {
    $book_isbn = $_GET['book_isbn'];
    ?>

    <!-- HTML form with a confirmation dialog -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="book_isbn" value="<?php echo $book_isbn; ?>">
        <div class="bg">
            <div class="wrapper">
                <div class="confirm">
                    Are you sure you want to delete this book?
                </div>
                <button type="submit" name="confirm" class="delete" >Delete</button>
                <button class="cancel"><a href="admin_homepage.php" >Cancel</a></button>
            </div>
        </div>
    </form>

<?php
}
?>
<style>
    .bg {
  position: absolute;
  background: #000;
  height: 100%;
  width: 100%;
  text-align: center;
}
.wrapper {
  margin: 100px auto;
  width: 400px;
  height: 100px;
  background: black;
  color: white;
  padding: 10px;
  border: 2px solid #7cf53f;
  border-radius:10px;
  box-shadow: 5px 5px 8px #7cf53f;
  background-image: linear-gradient(bottom, #121212 14%, #314234 57%, #2A3030 79%);
  background-image: -o-linear-gradient(bottom, #121212 14%, #314234 57%, #2A3030 79%);
  background-image: -moz-linear-gradient(bottom, #121212 14%, #314234 57%, #2A3030 79%);
  background-image: -webkit-linear-gradient(bottom, #121212 14%, #314234 57%, #2A3030 79%);
  background-image: -ms-linear-gradient(bottom, #121212 14%, #314234 57%, #2A3030 79%);

  background-image: -webkit-gradient(
	  linear,
  	left bottom,
	  left top,
  	color-stop(0.14, #121212),
  	color-stop(0.57, #314234),
	  color-stop(0.79, #2A3030)
  );
}
.confirm{
  font-size: 1.2em;
  margin: 20px 0 10px;
}
button{
  color: #555;
  width: 100px;
  padding: 2px;
  font-size: 16px;
  line-height: normal;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  background: #eee;
  font-weight: bold;
  box-shadow: 3px 3px 3px #555;
  margin: 5px;
}
.delete:hover {
   color : red;
   border: 0;
   box-shadow: inset 1px 1px 1px #555;
}
a{
    text-decoration: none;
}
.cancel:hover {
  color : blue;
  border: 0;
  box-shadow: inset 1px 1px 1px #555;
}

  

</style>
