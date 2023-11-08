<?php
    session_start();
    require_once "./Main/admin_header.php";
    $title = "Update this Book";
    require_once "./Main/section.php";
    require_once "./database/database.php";
    $conn = db_connect();
    if(isset($_GET['book_isbn'])){
        $book_isbn = $_GET['book_isbn'];
    }else{
        echo "Empty query, please return to previous page and try again";
        exit;
    }
    if(!isset($book_isbn)){
        echo "Isbn not provided";
        exit;
    }

    $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
?>
<form method="post" action="book_update.php" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th>ISBN</th>
            <td><input type="text" name="isbn" value="<?php echo $row['book_isbn'];  ?>" readOnly="true" /></td>
        </tr>
        <tr>
            <th>Book Title</th>
            <td><input type="text" name="title" value="<?php echo $row['book_title']; ?>" required /></td>
        </tr>
        <tr>
            <th>Book Author</th>
            <td><input type="text" name="author" value="<?php echo $row['book_author']; ?>" required /></td>
        </tr>
        <tr>
            <th>Book Description</th>
            <td><textarea name="descr" cols="40" rows="5"><?php echo $row['book_descr']; ?> </textarea></td>
        </tr>
        <tr>
            <th>Set Price</th>
            <td><input type="text" name="price" value="<?php echo $row['book_price']; ?>"  required /></td>
        </tr>
        <tr>
            <th>Set Quantity</th>
            <td><input type="range" max="50" min="0" name="quantity" value="<?php echo $row['book_quantity']; ?>"  oninput="document.getElementById('rangeValLabel').innerHTML = this.value;" required /><em id="rangeValLabel" style="font-style: normal;"></em></td>
        </tr>
        <tr>
            <th>Attach Link</th>
            <td><input type="text" name="AffiliateLink" value="<?php echo $row['AffiliateLink']; ?>"  /></td>
        </tr>
        <tr>
            <th>Is Available?</th>
            <td><input type="checkbox" name="isAvailable" id="yes" value="<?php echo $row['flag']; ?>"  /><label for="yes" >&nbsp; Yes</label></td>
        </tr>
        <tr>
            <th>Upload Book Image</th>
            <td><input type="file" name="image" /></td>
            <td><img src="./bootstrap/img/<?php echo $row['book_image']; ?>" class="img-responsive img-thumbnail" /></td>
           
        </tr>
    </table>
    <input type="submit" name="update" value="Update this Book" class="btn btn-success" />
    <a href="admin_homepage.php" class="btn btn-danger">Cancel</a>
</form>
<br />
<p><a href="admin_homepage.php" class="btn btn-primary">Confirm</a></p>

<?php 
  if(isset($conn)){
    mysqli_close($conn);
  }
?>
