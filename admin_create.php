<?php
    session_start();
    require_once "./Main/admin_header.php";
    $title = "Add new book";
    require "./Main/section.php";
    require "./database/database.php";
    $conn = db_connect();

    if(isset($_POST['add'])){
        $isbn = trim($_POST['isbn']);
        $isbn = mysqli_real_escape_string($conn, $isbn);

        $title = trim($_POST['title']);
        $title = mysqli_real_escape_string($conn, $title);

        $author = trim($_POST['author']);
        $author = mysqli_real_escape_string($conn, $author);

        $descr = trim($_POST['descr']);
        $descr = mysqli_real_escape_string($conn, $descr);

        $price = floatval(trim($_POST['price']));
        $price = mysqli_real_escape_string($conn, $price);

        $quantity = intval(trim($_POST['quantity']));
        $quantity = mysqli_real_escape_string($conn, $quantity);

        $isAvailable = isset($_POST['isAvailable'])? 1 : 0;

        $Affiliatelink = trim($_POST['AffiliateLink']);
       

        if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
            $image = $_FILES['image']['name'];
            $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
            $uploadDirectory .= $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
        }

        $query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $quantity . "', '" . $isAvailable . "', '" . $Affiliatelink . "')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't add new data " . mysqli_error($conn);
            exit;
        }else{
            header("Location: admin_homepage.php");
        }
    }
?>

<form method="post" action="admin_create.php" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th>ISBN</th>
            <td><input type="text" name="isbn" /></td>
        </tr>
        <tr>
            <th>Book Title</th>
            <td><input type="text" name="title" required /></td>
        </tr>
        <tr>
            <th>Book Author</th>
            <td><input type="text" name="author" required /></td>
        </tr>
        <tr>
            <th>Book Description</th>
            <td><textarea name="descr" cols="40" rows="5"> </textarea></td>
        </tr>
        <tr>
            <th>Set Price</th>
            <td><input type="text" name="price" required /></td>
        </tr>
        <tr>
            <th>Set Quantity</th>
            <td><input type="range" max="50" min="0" name="quantity" oninput="document.getElementById('rangeValLabel').innerHTML = this.value;" required /><em id="rangeValLabel" style="font-style: normal;"></em></td>
        </tr>
        <tr>
            <th>Attach Link</th>
            <td><input type="text" name="AffiliateLink" /></td>
        </tr>
        <tr>
            <th>Is Available?</th>
            <td><input type="checkbox" name="isAvailable" id="yes" value="1" /><label for="yes" >&nbsp; Yes</label></td>
        </tr>
        <tr>
            <th>Upload Book Image</th>
            <td><input type="file" name="image" /></td>
        </tr>
    </table>
    <input type="submit" name="add" value="Add this Book" class="btn btn-success" />
    <a href="admin_homepage.php" class="btn btn-danger">Cancel</a>
</form>

<?php 
  if(isset($conn)){
    mysqli_close($conn);
  }
?>