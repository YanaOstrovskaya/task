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

	public function index()//list
	{
		//echo __CLASS__.' '.__METHOD__;
		$title = 'Create tasks';
		$tasks = $this->taskModel::all();

		View::render('task/index', compact('title', 'tasks'));
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
    	$task = $this->taskModel::add($data);
    	$taskID = $task[0]['id'];

    	if($_FILES['file']['error'] == 0)
    	{
    		move_uploaded_file($_FILES['file']['tmp_name'], $file);
    		$this->attachmentModel::add($file, $taskID);

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
		 var_dump($id);
		 $this->taskModel::delete($id);

		 header('Location: /task');
	     }
     }


}