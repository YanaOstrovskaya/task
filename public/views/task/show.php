<div class="container">
  <div class="jumbotron">
    <?php foreach ($tasks as $task) {
    ;
} ?>
    <h2><b>Task name:</b> <?= $task['name'] ?></h2>
    <p><b>Description:</b> <?= $task['discription'] ?></p>
      <p><b>Type:</b> <?= $task['type'] ?></p>
    <p><b>Priority:</b> <?= $task['priority'] ?></p>
     <p>
      <?php $fileName = explode('/', $task['path_files']);?>
        <b>Files:</b> <?= $fileName[2] ?> <a href="<?= $task['path_files'] ?>"  download="files" style="color:blue"><i style="font-size:17px" class="fa">&#xf019;</i></a>
      </p>
      <p><b>Status: </b>
        <form action="/task/updateStatus" method="POST">
            <select id="status" name="status" class="form-control">
              <?php foreach ($arrayStatus as $status): ?>
            <option value="<?= $status[1]; ?>" <?php if ($status[1] === $task['status']) {
    echo ' selected="selected"';
} ?>><?= $status[1]; ?></option>
            <option value="<?= $status[2]; ?>" <?php if ($status[2] === $task['status']) {
    echo ' selected="selected"';
} ?>><?= $status[2]; ?></option>
                <?php endforeach; ?>
          </select>
          <input type="hidden" value="<?= $task['id'] ?>" name="id">
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </p>
  </div>
</div>
