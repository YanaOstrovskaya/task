<div class="container">
  
	<div class="row">
		<a href="/task/showForm" class="btn btn-primary btn-lg btn-block"><?php echo $title; ?></a>
	</div>
	<div class="container">
 <div class="col-sm-12">
 	<h2 style="text-align: center;">All tasks</h2>
<table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Type</th>
        <th>Priority</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<count($tasks); $i++): ?>
      <tr>
        <td><?= ($i+1) ?></td>
        <td><?= $tasks[$i]['name'] ?></td>
        <td><?= $tasks[$i]['discription'] ?></td>
        <td><?= $tasks[$i]['status'] ?></td>
        <td><?= $tasks[$i]['type'] ?></td>
        <td><?= $tasks[$i]['priority'] ?></td>
        <th>
        	<a href="/task/edit/<?= $tasks[$i]['id']?>"><i class="material-icons">&#xe150;</i></a>
        	<a href="/task/delete/<?= $tasks[$i]['id']?>" style="color:red"><i class="material-icons">&#xe872;</i></a>
        </th>
      </tr>
      <?php endfor; ?>
    </tbody>
  </table>
 </div>
</div>

</div>



