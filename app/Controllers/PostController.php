<?php 

namespace App\Controllers;

use Step\Http\Response;

class PostController extends Controller
{
	/*
	 * It creates a new post entry
	 */
	public function create(Request $request)
	{
		// Who create post (User)
		
		// Does exact user can create posts at all
		// Does exact user todays post count less than 5

		$title = $request>input('title');
		$content = $request>input('content');

		// Query database (ORM)
		$createdPost = Post::create([
			'title' => $title,
			'content' => $content
		]);

		return redirect('/posts');
	}
}