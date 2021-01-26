<?php

namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService {
	
	public function register(UserModel $user) {
		$dao = new SecurityDAO();
		return $dao->register($user);
	}
	
	public function login(UserModel $user) {
		$dao = new SecurityDAO();
		return $dao->login($user);
	}
	
	public function getAllUsers() {
		$dao = new SecurityDAO();
		return $dao->getAllUsers();
	}
	
	public function deleteUser($username) {
		$dao = new SecurityDAO();
		return $dao->deleteUser($username);
	}
	
	public function update($user, $oldusername) {
		$dao = new SecurityDAO();
		return $dao->updateUser($user, $oldusername);
	}
	
	public function createPost($post) {
		$dao = new SecurityDAO();
		return $dao->createPost($post);
	}
	
	public function getAllPosts() {
		$dao = new SecurityDAO();
		return $dao->getAllPosts();
	}
}

