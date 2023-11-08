<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- bootstrap attached -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/main.css" rel="stylesheet">
    <style>
        .zippyimage{
            background: url("./bootstrap/img/uakron.jpg") no-repeat center center;
            background-size: cover;
            height: 400px;
        }
        .head, .changeColor{
          color: white !important;
          background: rgba(0,0,0,0.5);
          display:block;
         }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ZippyBooks.php">ZippyBookStore</a>
            </div>
            <!-- navbar collapse -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="books.php"><span class="glyphicon glyphicon-book"></span> Books</a></li>
                    <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact</a></li>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <?php 
       if(isset($title) && $title=="Index"){
    ?>
    <div class="jumbotron zippyimage opacity-50">
        <div class="container">
            <h1 class="text-center text-weight-bold head">Welcome to ZippyBookStore</h1>
            <p class="changeColor text-center justify-content-between">We have got your all textbooks for your classes at University of Akron</p>
        </div> 
    </div>
    <?php } ?>

    <div class="container" id="main">
        
