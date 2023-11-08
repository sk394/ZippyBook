<?php 
    $title = "Admin Login";
    require_once "./Main/section.php";
?>

<form class="form-horizontal" method="post" action="admin_verify.php">
    <div class="form-group">
        <label for="name" class="control-label col-md-4">Username</label>
        <div class="col-md-4">
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="control-label col-md-4">Password</label>
        <div class="col-md-4">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <input type="submit" name="submit" class="btn btn-primary col-md-offset-4">
</form>
<?php 
    require_once "./Main/footer.php";
?>
        