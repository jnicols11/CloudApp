<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger;

class PostController extends Controller
{
	public function createPost(Request $request) {
		// Log method entrance
		MyLogger::info("Entering method createPost() in class PostController()");
		
		$content = $request->input('content');
		session_start();
		$userID = $_SESSION['id'];
		$username = $_SESSION['username'];
		
		$post = new PostModel($userID, $username, $content);
		$service = new SecurityService();
		if(!$service->createPost($post)) {
			// Log Error
			MyLogger::error("Create post failed. Exiting createPost() in PostController");
			
			return view('createFail');
		}
		
		// Log method exit
		MyLogger::info("Exiting method createPost() in class PostController()");
		
		return view('createPass', ['model' => $post]);
	}
	
	public function viewPosts() {
		// Log method entrance
		MyLogger::info("Entering method viewPosts() in class PostController()");
		
		$posts = [];
		$service = new SecurityService();
		
		$posts = $service->getAllPosts();
		
		// Log method exit
		MyLogger::info("Exiting method viewPosts() in class PostController()");
		
		return view('posts', compact('posts'));
	}
}
