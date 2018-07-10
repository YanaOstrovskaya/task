<div class="container">
	<div class="row">
		<h3 style="text-align: center;"><?php echo $title; ?></h3>

  <?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-danger">
 <?php echo $_SESSION['message']; ?>
</div>
  <?php endif; ?>

     <form class="form-horizontal col-sm-6 col-sm-offset-3" action="/task/update" method="POST" enctype="multipart/form-data">
      <?php foreach($tasks as $task): ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $task['name'];?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10">   
        <textarea class="form-control" rows="5" id="description" placeholder="Enter description" name="description"><?= $task['discription'];?></textarea>       
      </div>
    </div>
    <div class="form-group"> 
      <label class="control-label col-sm-2" for="type">Type:</label>
      <div class="col-sm-10">  
          <select id="type" name="type" class="form-control">
            <?php  foreach ($allType as $type): ?>
            <option value="<?= $type['id']; ?>"  <?php if ($task['priority'] === $type['name']) { echo ' selected="selected"'; } ?>><?= $type['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div> 
      </div>

    <div class="form-group"> 
      <label class="control-label col-sm-2" for="priority">Priority:</label>
      <div class="col-sm-10">  
          <select id="priority" name="priority" class="form-control">
            <?php  foreach ($allPriority as $priority): ?>
            <option value="<?= $priority['id']; ?>" <?php if ($task['priority'] === $priority['name']) { echo ' selected="selected"'; } ?>><?= $priority['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div> 
      </div>


  <fieldset class="form-group">
          <label class="control-label col-sm-2" for="file">File:</label>
      <div class="col-sm-10">  
        <input type="file" class="form-control" id="file" name="file">
        </div> 
  </fieldset>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
    <input type="hidden" value="<?= $task['id'];?>" name="id" >
    <?php endforeach; ?>
  </form>


	</div>
</div>