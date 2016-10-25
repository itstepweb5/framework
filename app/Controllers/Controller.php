<?php 

namespace App\Controllers;

class Controller
{
	function __construct()
	{
	}

	public function view($path)
	{
		if($path == '')
			return '';

		$path = str_replace('.', '/', $path) . '.php';
		
		ob_start();
		require view_path($path);
		return ob_get_clean();
	}
}