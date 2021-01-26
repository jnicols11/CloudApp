<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class UserController extends Controller
{
	public function login(Request $request) {
		$username = $request->input('username');
		$password = $request->input('password');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if(!$service->login($user)) {
			return view('loginFailed');
		}
		
		return view('loginPassed', ['model' => $user]);
	}
	
	public function register(Request $request) {
		$username = $request->input('username');
		$password = $request->input('password');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if($service->register($user)) {
			return view('registerPassed', ['model' => $user]);
		}
		
		return view('registerFailed');
	}
	
	public function getAllUsers() {
		$users = [];
		$service = new SecurityService();
		
		$users = $service->getAllUsers();
		return view('users', compact('users'));
	}
	
	public function editForm(Request $request) {
		$username = $request->input('username');
		
		return view('edituser', ['user' => $username]);
	}
	
	public function editUser(Request $request) {
		$username = $request->input('username');
		$password = $request->input('password');
		$oldusername = $request->input('oldusername');
		
		$user = new UserModel($username, $password);
		$service = new SecurityService();
		if($service->update($user, $oldusername)) {
			return view('editUserPassed', ['model' => $user]);
		}
		
		return view('editUserFailed');
	}
	
	public function deleteUser(Request $request) {
		$username = $request->input('username');
		$service = new SecurityService();
		
		if($service->deleteUser($username)) {
			$users = [];
			$service = new SecurityService();
			
			$users = $service->getAllUsers();
			return view('users', compact('users'));
		}
		
		return view('deleteFailed');
	}
	
	public function logout() {
		// clear sessions
		session_start();
		
		session_unset();
		
		return view('logout');
	}
}
