<div class="container">

  <div class="row">
    <a href="/type/showForm" class="btn btn-primary btn-lg btn-block"><?php echo $title; ?></a>
  </div>
  <div class="container">
 <div class="col-sm-8 col-sm-offset-2">
  <h2 style="text-align: center;">All types</h2>
<table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i=0; $i<count($types); $i++): ?>
      <tr>
        <td><?= ($i+1) ?></td>
        <td><?= $types[$i]['name'] ?></td>
        <td class="text-right">
          <a href="/type/edit/<?= $types[$i]['id']?>"><i class="material-icons">&#xe150;</i></a>
          <a href="/type/delete/<?= $types[$i]['id']?>" style="color:red"><i class="material-icons">&#xe872;</i></a>
        </td>
      </tr>
      <?php endfor; ?>
    </tbody>
  </table>
 </div>
</div>

</div>
