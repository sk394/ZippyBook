<?php 
    session_start();
    $book_isbn = $_GET['bookisbn'];
    //connect to database
    require_once "./database/database.php";
    $conn = db_connect();

    $query = "SELECT * FROM books WHERE book_isbn='$book_isbn'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data" . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    if(!$row){
        echo "Empty data";
        exit;
    }
    $title=$row['book_title'];
    require_once "./Main/section.php";
?>

<p class="lead" style = "margin: 25px 0"><a href="books.php">Books</a> > <?php echo $row['book_title']; ?></p>
<p class="row">
    <div class="col-md-3 text-center">
        <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image']; ?>">
    </div>
    <div class="col-md-6">
        <h4>Description</h4>
        <p><?php echo $row['book_descr']; ?></p>
        <h4>Details</h4>
        <table class="table">
            <?php foreach($row as $key => $value){
                if($key =="book_descr"|| $key =="book_image" || $key =="book_author"|| $key == "book_title" || $key == "AffiliateLink"){
                    continue;
                }
                switch($key){
                    case "book_isbn":
                        $key = "ISBN";
                        break;
                    case "book_price":
                        $key = "Price";
                        $value = "$" . number_format($value, 2);
                        break;
                    case "book_author":
                        $key = "Author";
                        break;
                    case "book_quantity":
                        $key = "Quantity";
                        break;
                    case "flag":
                        $key = "Is Available?";
                        $value = $value?"Yes":"No";
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php }
               if(isset($conn)){ mysqli_close($conn); }?>
        </table>
        <form method="post" action="<?php echo $row['AffiliateLink']; ?>" target="_blank">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn; ?>">
              <?php if($row['flag']){ ?>
                <input type="submit" value="Buy this" name="buy" class="btn btn-primary">
                <?php } else { ?>
                <input type="button" value="Check Later to buy" name="buy" class="btn btn-primary" disabled>
                <?php } ?>
            <!-- <a href="" class="btn btn-primary" target="_blank">&nbsp;Buy this Book</a> -->
        </form>
    </div>
    <!-- for header section -->
    </div>  
<?php
    require_once "./Main/footer.php";
?>
            
