<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger;

class UserController extends Controller
{
	public function login(Request $request) {
		// Log Method Entrance
		MyLogger::info("Entering method login() in class UserController");
		
		$username = $request->input('username');
		$password = $request->input('password');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if(!$service->login($user)) {
			// Log Error
			MyLogger::error("User was not Logged in. Exiting login() in UserController");
			
			return view('loginFailed');
		}
		
		// Log Method Exit
		MyLogger::info("Exiting method login() in class UserController");
		
		return view('loginPassed', ['model' => $user]);
	}
	
	public function register(Request $request) {
		// Log Method Entrance
		MyLogger::info("Entering method register() in class UserController");
		
		$username = $request->input('username');
		$password = $request->input('password');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if($service->register($user)) {
			// Log Method Exit
			MyLogger::info("Exiting method register() in class UserController");
			
			return view('registerPassed', ['model' => $user]);
		}
		
		// Log Error
		MyLogger::error("User was not registered. Exiting register() in UserController");
		return view('registerFailed');
	}
	
	public function getAllUsers() {
		// Log Method Entrance
		MyLogger::info("Entering method getAllUsers() in class UserController");
		
		$users = [];
		$service = new SecurityService();
		
		$users = $service->getAllUsers();
		
		// Log Method Exit
		MyLogger::info("Exiting method getAllUsers() in class UserController");
		
		return view('users', compact('users'));
	}
	
	public function editForm(Request $request) {
		// Log Method Entrance
		MyLogger::info("Entering method editForm() in class UserController");
		
		$username = $request->input('username');
		
		// Log Method Exit
		MyLogger::info("Exiting method editForm() in class UserController");
		
		return view('edituser', ['user' => $username]);
	}
	
	public function editUser(Request $request) {
		// Log Method Entrance
		MyLogger::info("Entering method editUser() in class UserController");
		
		$username = $request->input('username');
		$password = $request->input('password');
		$oldusername = $request->input('oldusername');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if($service->update($user, $oldusername)) {
			// Log Method Exit
			MyLogger::info("Exiting method editUser() in class UserController");
			
			return view('editUserPassed', ['model' => $user]);
		}
		
		// Log Error
		MyLogger::error("User was not edited. Update failed. Exiting editUser() in UserController");
		
		return view('editUserFailed');
	}
	
	public function deleteUser(Request $request) {
		// Log Method Entrance
		MyLogger::info("Entering method deleteUser() in class UserController");
		
		$username = $request->input('username');
		$service = new SecurityService();
		
		if($service->deleteUser($username)) {
			$users = [];
			$service = new SecurityService();
			
			$users = $service->getAllUsers();
			
			// Log Method Exit
			MyLogger::info("Exiting method deleteUser() in class UserController");
			
			return view('users', compact('users'));
		}
		
		// Log Error
		MyLogger::error("User was not deleted.  Delete Failed. Exiting deleteUser() in UserController");
		
		return view('deleteFailed');
	}
	
	public function logout() {
		// Log Method Entrance
		MyLogger::info("Entering method logout() in class UserController");
		
		// clear sessions
		session_start();
		
		session_unset();
		
		// Log Method Exit
		MyLogger::info("Exiting method logout() in class UserController");
		
		return view('logout');
	}
}
