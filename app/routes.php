<?php 

	return [

		'GET:/' => 'HomeController@index',
		'GET:auth/register' => 'RegisterController@form',
		'POST:auth/register' => 'RegisterController@handle'

	];