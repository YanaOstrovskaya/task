<div class="container">
	<div class="row">
		<h3 style="text-align: center;"><?php echo $title; ?></h3>

  <?php if(isset($_SESSION['message'])): ?>
    <div class="col-sm-6 col-sm-offset-3">
      <div class="alert alert-danger">
      <?php echo $_SESSION['message']; ?>
      </div>
   </div>
  <?php endif; ?>
  
   <form action="/type/create" method="POST" class="col-sm-6 col-sm-offset-3">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <button class="btn btn-success" type="submit">Add type</button>
   </form>
	</div>
</div>