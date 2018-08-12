  <?php require (APPROOT. '\views\includes\header.php'); ?>
 <div class="row">
    <div class="col-md-6">
        <h1>Post</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull right">
            <i class="fa fa-pencil"></i> Add Post
        </a> 
    </div>
 </div>
 <?php foreach($data['posts'] as $post): ?>
 <div class="card card-body mb-3">
  <h4 class="card-title"><?php echo $post->title; ?></h4>
  <div class="bg-light p-2 mb3">
  Written By <?php ?>
  </div>
 </div>
<?php endforeach; ?>
  <?php require (APPROOT. '\views\includes\footer.php'); ?>