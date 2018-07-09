<div class="container">
  
 <div class="col-sm-12">
 	<h2 style="text-align: center;"><?php echo $title; ?></h2>
<table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<count($files); $i++): ?>
      <tr>
        <td><?= ($i+1) ?></td>       
        <?php $fileName = explode('/', $files[$i]['path_files']);?>
        <td><a href="#"><?= $fileName[2]; ?></a></td>  
      <td>
        <a href="<?= $files[$i]['path_files'] ?>"  download="files" style="color:blue"><i style="font-size:24px" class="fa">&#xf019;</i></a>
      </td>
        <td>        
        	<a href="/attachment/delete/<?= $files[$i]['id']?>" style="color:red"><i class="material-icons">&#xe872;</i></a>
        </td>
      </tr>
      <?php endfor; ?>
    </tbody>
  </table>
 </div>


</div>