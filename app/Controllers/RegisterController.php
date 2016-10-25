<?php 

namespace App\Controllers;

use Step\Http\Response;

class RegisterController extends Controller
{
	public function form()
	{
		return $this->view('auth.register');
	}
}