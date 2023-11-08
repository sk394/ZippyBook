<?php 
    function db_connect(){
        $conn = new mysqli("localhost", "root", "", "isp") or die('Connection Failed' . mysqli_error($conn));
        return $conn;
    }

    function selectLatestBook($conn){
        $row = array();
        $query = "SELECT book_isbn, book_image, book_price FROM books ORDER BY book_isbn DESC";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't retrieve data" . mysqli_error($conn);
            exit;
        }
        for($i=0; $i < 4; $i++){
            array_push($row, mysqli_fetch_assoc($result));
        }
        return $row;
    }

    function getAll($conn){
        $query = "SELECT * FROM books ORDER BY book_isbn DESC";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Can't retrieve data" . mysqli_error($conn);
            exit;
        }
        return $result;
    }

?>