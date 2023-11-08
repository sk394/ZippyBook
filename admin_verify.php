<?php
    session_start();
    if(!isset($_POST['submit'])){
        echo "Something wrong! Check again";
        exit;
    }
    require_once "./database/database.php";
    $conn = db_connect();

    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($password)) {
        echo "Name or Password is empty!";
        exit;
    }
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);
    $password = sha1($password);

    $query = "SELECT name, `password` FROM admin WHERE name='$name' AND `password`='$password'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    if($name != $row['name'] || $password !== $row['password']){
        echo "Name or Password is not correct!";
        $_SESSION['admin'] = false;
        exit;
    }
    if(isset($conn)){
        mysqli_close($conn);
    }
    $_SESSION['admin'] = true;
    header("Location: admin_homepage.php");
?>