<div class="container">
	<div class="row">
		<h3 style="text-align: center;"><?php echo $title; ?></h3>

  <?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-danger">
 <?php echo $_SESSION['message']; ?>
</div>
  <?php endif; ?>
  
   <form action="/priority/update" method="POST" class="col-sm-6 col-sm-offset-3">
  <div class="form-group">
    <label for="name">Name:</label>
<?php foreach($priorities as $priority): ?>
    <input type="text" class="form-control" id="name" name="name" value="<?= $priority['name'];?>">
    <input type="hidden" value="<?= $priority['id'];?>" name="id" >
<?php endforeach; ?>
  </div>
  <button class="btn btn-success" type="submit">Edit type</button>
   </form>
	</div>
</div>