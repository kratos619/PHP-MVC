 <?php require (APPROOT. '\views\includes\header.php'); ?>
 
 <div class="jumbotron jumbotron-fluid text-center">
 <div class="container">
    <h1 class="displsy-3">hello <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }?></h1>
 
 <p class="lead">
 
 </p>
 </div>
 
 </div>
  <?php require (APPROOT. '\views\includes\footer.php'); ?>