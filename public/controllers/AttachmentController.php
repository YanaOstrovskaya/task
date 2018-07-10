<?php
namespace Controllers;

use Models\AttachmentModel;
use Core\Controller;
use Core\View;

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

		$title = 'All files';
		$files = $this->attachmentModel::all();
		//var_dump($files);
		//echo '<pre>'.print_r($files, true).'</pre>';


		View::render('attachment/index', compact('title', 'files'));
	}

	public function delete()//delete task
	{
		$url_segments = explode('/', $_SERVER['REQUEST_URI']);

		if(isset($url_segments[3]))
		{
		 $id = $url_segments[3];

		  $attachment = $this->attachmentModel::get($id);
		 $this->attachmentModel::delete($id);
		 unlink($attachment[0]['path_files']);
		
		 header('Location: /attachment');
		}
	}


}
