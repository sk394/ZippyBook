<?php 
   $title = "Contact Us";
   require_once "./Main/section.php";
?>
<section class="w-100 h-100">
  
  <h1 class="text-center mx-0 my-auto px-40 py-0 text-uppercase">Contact</h1>
  
  <div class="d-flex flex-row justify-content-between">
  
  <!-- Left contact page --> 
    
    <form class="form-horizontal">
       
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
        </div>
      </div>

      <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea><br />
      
      <button class="btn btn-primary ">Send</button>
      
    </form>  
  </div>
  
</section>  
  
  



<?php 
    require_once "./Main/footer.php";
?>

<style>
   body{
    background-color: whitesmoke;
   }
</style>