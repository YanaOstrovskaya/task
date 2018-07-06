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

		View::render('task/index', compact('title'));
	}


	public function showForm()
	{
		$title = 'Create task';

		$typeModel = new TypeModel();
		$allType = $typeModel::all();

		$priorityModel = new PriorityModel();
		$allPriority = $priorityModel::all();

		View::render('task/show-form', compact('title', 'allType', 'allPriority'));
	}

	public function create()//create task
	{
		$name = isset($_POST['name'])?strip_tags($_POST['name']):'';
		$description = isset($_POST['description'])?strip_tags($_POST['description']):'';
		$type = isset($_POST['type'])?$_POST['type']:'';
		$priority = isset($_POST['priority'])?$_POST['priority']:'';
		$dir = 'storage/files';
		$file = $dir.'/'.$_FILES['file']['name'];

		//var_dump(move_uploaded_file($_FILES['file'], $dir));

		$data = array($name, $description, $type, $priority);

    	$m = new TaskModel();
    	$task = $m::add($data);
    	var_dump($task);

    	
		
	}

	public function edit()//edit task
	{
		echo 'edit task';
	}


	public function delete()//delete task
	{
		echo 'delete task';
	}


}