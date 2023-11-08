<?php
    if(!isset($_POST['update'])){
        echo "Something wrong with the update handler";
        exit;
    }
    $isbn = trim($_POST['isbn']);
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $descr = trim($_POST['descr']);
    $price = floatval(trim($_POST['price']));
    $quantity = intval(trim($_POST['quantity']));
    $isAvailable = isset($_POST['isAvailable'])? 1 : 0;
    $Affiliatelink = trim($_POST['AffiliateLink']);
    if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
        $uploadDirectory .= $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
    }
    require_once "./database/database.php";
    $conn = db_connect();
    $query = "UPDATE books SET book_title = '$title', book_author = '$author', book_descr = '$descr', book_price = '$price', book_quantity = '$quantity', flag = '$isAvailable', AffiliateLink = '$Affiliatelink'";
    if(isset($image)){
        $query .= ",book_image = '$image' WHERE book_isbn = '$isbn'";
    }else{
        $query .= " WHERE book_isbn = '$isbn'";
    }
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't update data " . mysqli_error($conn);
        exit;
    }else{
        header("Location: admin_update.php?book_isbn=$isbn");
    }
?>