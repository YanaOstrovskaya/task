<?php
namespace Controllers;

use Core\Controller;

class AttachmentController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->typeModel = new TypeModel();
	}

	public function index()//list
	{
		//echo __CLASS__.' '.__METHOD__;

		//View::render('attachment/index');
	}

	public function create()//create task
	{
		echo 'create task';
	}

	public function edit()//edit task
	{
		echo 'edit task';
	}

	public function show()//show 1 task
	{
		echo 'show 1 task';
	}
	public function delete()//delete task
	{
		echo 'delete task';
	}


}