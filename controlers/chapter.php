<?php
class Chapter {
	function __construct() {
		$methods = explode('/', $_SERVER['REQUEST_URI']);
		if (!$methods['1']) {
			$methods['1'] = 'index';
		}
		//var_dump($methods['1']);
		if(method_exists('Chapter',$methods['1'])){
			if (isset($methods['2']) && $methods['2']) {
				$this->$methods['1']($methods['2']);
			} else {
				$this->$methods['1']();
			}
		} else {
			echo 'error';
		}
	}
	
	function index() {
		$this->view('main');
	}
	
	function chapter($id = null) {
		if (!$id) {
			$this->view('main');
		} else {
			$this->view($id);
		}
	}
	
	function view($file, $data = null) {
		include('view/header.php');
		include('view/main-left.php');
		if (file_exists("view/{$file}.php")) {
			include("view/{$file}.php");
		} else {
			echo 'error';
		}
		include('view/footer.php');
	}
}
