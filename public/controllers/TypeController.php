<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\TypeModel;

class TypeController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()//list
	{
		$title = 'Create type';
		$types = $this->typeModel::all();

		View::render('type/index', compact('types', 'title'));
	}

	public function showForm()
	{
		$title = 'Create type';
		View::render('type/show-form', compact('title'));
	}

	public function create()//create type
	{
		//var_dump($_POST['name']);
		$name = isset($_POST['name'])?strip_tags($_POST['name']):'';

		if (!empty($name)) {
			unset($_SESSION['message']);
		    $this->typeModel::add($name);  
		    header('Location: /type');
		} else {
			$_SESSION['message'] = 'Please Enter valid data';
			header('Location: /type/showForm');
		}


		//
	}

	public function edit()//edit type
	{
		$title = 'Edit type';
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $types = $this->typeModel::get($id);
		}
		View::render('type/edit', compact('types', 'title'));
		
	}

	public function update()
	{
	
		$name = isset($_POST['name'])?$_POST['name']:'';
		$id = isset($_POST['id'])?$_POST['id']:'';
		
		if($id!=''){
		$this->typeModel::update($id, $name);
		}

		header('Location: /type');
	}


	public function delete()//delete type
	{
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];
		 $this->typeModel::delete($id);

		 header('Location: /type');
		}
	}


}