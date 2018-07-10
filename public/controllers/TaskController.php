<?php
namespace Controllers;

use Models\TaskModel;
use Models\TypeModel;
use Models\PriorityModel;
use Models\AttachmentModel;
use Core\Controller;
use Core\View;

class TaskController extends Controller
{

		public function __construct()
	{
		parent::__construct();
		//$this->typeModel = new TypeModel();
	}

	public function index()
	{
		$title = 'Create tasks';
		$tasks = $this->taskModel::all();

		View::render('task/index', compact('title', 'tasks'));
	}

	public function show()
	{

		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $statusValue = $this->taskModel::getStatus();
		
		 foreach ($statusValue as $statusArray) {
		 	$status = $statusArray['Type'];
		 }

		 preg_match_all('/"[^"]+"|[\w]+/u', $status, $arrayStatus);
		 $tasks = $this->taskModel::get($id);
	     }


		View::render('task/show', compact('tasks', 'arrayStatus'));
	}

	public function updateStatus()
	{
		$id =  isset($_POST['id'])?$_POST['id']:'';
		$status = isset($_POST['status'])?$_POST['status']:'';

		$this->taskModel::updateStatus($id, $status);
		header('Location: /task/show/'.$id);

	}

	public function showForm()
	{
		$title = 'Create task';

		$allType = $this->typeModel::all();

		$allPriority = $this->priorityModel::all();

		View::render('task/show-form', compact('title', 'allType', 'allPriority'));
	}

	public function create()
	{
		$name = isset($_POST['name'])?strip_tags($_POST['name']):'';
		$description = isset($_POST['description'])?strip_tags($_POST['description']):'';
		$type = isset($_POST['type'])?$_POST['type']:'';
		$priority = isset($_POST['priority'])?$_POST['priority']:'';
		$dir = 'storage/files';
		$file = isset($_FILES['file']['name'])?$dir.'/'.$_FILES['file']['name']:'';

		$data = array($name, $description, $type, $priority);    	
    	

    	$res = $this->taskModel::unique($name);
    	var_dump($res);
    	die;

	if(!empty($name) AND !empty($description) AND $_FILES['file']['error'] == 0)
	{
  


			unset($_SESSION['message']);
			$task = $this->taskModel::add($data);
			$taskId = $task[0]['id'];
			move_uploaded_file($_FILES['file']['tmp_name'], $file);
    		$this->attachmentModel::add($file, $taskId);



	}
	else{
			$_SESSION['message'] = 'Please Enter valid data';
			header('Location: /task/showForm');
	}

    	header('Location: /task');
		
	}

	public function edit()//edit task
	{
		$title = 'Edit task';
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $tasks = $this->taskModel::get($id);
		 $allType = $this->typeModel::all();
		 $allPriority = $this->priorityModel::all();
		}
		View::render('task/edit', compact('tasks', 'title', 'allType', 'allPriority'));
	}

	public function update()
	{


		$id = isset($_POST['id'])?$_POST['id']:'';
		$name = isset($_POST['name'])?strip_tags($_POST['name']):'';
		$description = isset($_POST['description'])?strip_tags($_POST['description']):'';
		$type = isset($_POST['type'])?$_POST['type']:'';
		$priority = isset($_POST['priority'])?$_POST['priority']:'';
		$dir = 'storage/files';
		$file = isset($_FILES['file']['name'])?$dir.'/'.$_FILES['file']['name']:'';


		$data = array($name, $description, $type, $priority);

    	if($_FILES['file']['error'] == 0)
    	{
    		move_uploaded_file($_FILES['file']['tmp_name'], $file);
    		$this->attachmentModel::update($file, $id);

    	}
		
		if($id!=''){
		$this->taskModel::update($id, $data);
		}

		header('Location: /task');
	}


	public function delete()//delete task
	{
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $this->taskModel::delete($id);

		 header('Location: /task');
	     }
     }


}