<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Services\Business\SecurityService;

class PostController extends Controller
{
	public function createPost(Request $request) {
		$content = $request->input('content');
		session_start();
		$userID = $_SESSION['id'];
		$username = $_SESSION['username'];
		
		$post = new PostModel($userID, $username, $content);
		$service = new SecurityService();
		if(!$service->createPost($post)) {
			return view('createFail');
		}
		
		return view('createPass', ['model' => $post]);
	}
	
	public function viewPosts() {
		$posts = [];
		$service = new SecurityService();
		
		$posts = $service->getAllPosts();
		return view('posts', compact('posts'));
	}
}
