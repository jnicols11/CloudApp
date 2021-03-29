<?php

namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use App\Services\Utility\MyLogger;

class SecurityService {
	
	public function register(UserModel $user) {
		// Log method Entrance
		MyLogger::info("Entering method register() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method register() in class SecurityService");
		
		return $dao->register($user);
	}
	
	public function login(UserModel $user) {
		// Log method Entrance
		MyLogger::info("Entering method login() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method login() in class SecurityService");
		
		return $dao->login($user);
	}
	
	public function getAllUsers() {
		// Log method Entrance
		MyLogger::info("Entering method getAllUsers() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method getAllUsers() in class SecurityService");
		
		return $dao->getAllUsers();
	}
	
	public function deleteUser($username) {
		// Log method Entrance
		MyLogger::info("Entering method deleteUser() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method deleteUser() in class SecurityService");
		
		return $dao->deleteUser($username);
	}
	
	public function update($user, $oldusername) {
		// Log method Entrance
		MyLogger::info("Entering method update() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method update() in class SecurityService");
		return $dao->updateUser($user, $oldusername);
	}
	
	public function createPost($post) {
		// Log method Entrance
		MyLogger::info("Entering method createPost() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method createPost() in class SecurityService");
		return $dao->createPost($post);
	}
	
	public function getAllPosts() {
		// Log method Entrance
		MyLogger::info("Entering method getAllPosts() in class SecurityService");
		
		$dao = new SecurityDAO();
		
		// Log method Exit
		MyLogger::info("Leaving method getAllPosts() in class SecurityService");
		
		return $dao->getAllPosts();
	}
}

