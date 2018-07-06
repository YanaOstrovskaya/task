<?php

namespace Core;

class View{
	public static function render($path, $data){
		extract($data);
		require 'views/header.php';
		require 'views/'.$path.'.php';
		require 'views/footer.php';
	}
}

