<?php
namespace Controllers;

use Models\PriorityModel;
use Core\Controller;
use Core\View;

class PriorityController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->typeModel = new TypeModel();
	}

	public function index()//list
	{
		$title = 'Create priorities';
		$m = new PriorityModel();
		$priorities = $m::all();

		View::render('priority/index', compact('priorities', 'title'));
	}

	public function showForm()
	{
		$title = 'Create priority';
		View::render('priority/show-form', compact('title'));
	}

	public function create()//create task
	{
		$name = isset($_POST['name'])?strip_tags($_POST['name']):'';

		if (!empty($name)) {
		    $m = new PriorityModel();
		    //$allPriorities = $m::all();
		    //echo '<pre>'.print_r($allPriorities, true).'</pre>';
		    $m::add($name);
		    unset($_SESSION['message']);
		    header('Location: /priority');
		} else {
			$_SESSION['message'] = 'Please Enter valid data';
			header('Location: /priority/showForm');
		}
	}

	public function edit()//edit task
	{
		$title = 'Edit priority';
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $m = new PriorityModel();
		 $priorities = $m::get($id);
		}
		View::render('priority/edit', compact('priorities', 'title'));
	}


	public function update()
	{
	
		$name = isset($_POST['name'])?$_POST['name']:'';
		$id = isset($_POST['id'])?$_POST['id']:'';
		
		if($id!=''){
		$m = new PriorityModel();
		$m::update($id, $name);
		}

		header('Location: /priority');
	}


	public function delete()
	{
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $m = new PriorityModel();
		 $m::delete($id);

		 header('Location: /priority');
		}
	}


}