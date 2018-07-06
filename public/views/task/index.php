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
      <tr>
        <td>1</td>
        <td>Task 1</td>
        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, facilis!</td>
        <td>uncompleted</td>
        <td>type 4</td>
        <td>priority</td>
        <th>
        	<a href="/task/edit/<?= $priorities[$i]['id']?>"><i class="material-icons">&#xe150;</i></a>
        	<a href="/task/delete/<?= $priorities[$i]['id']?>" style="color:red"><i class="material-icons">&#xe872;</i></a>
        </th>
      </tr>
    </tbody>
  </table>
 </div>
</div>

</div>


