<?php

namespace App\Services\Data;

use App\Models\UserModel;
use App\Models\PostModel;

class SecurityDAO {
	
	
	public function register(UserModel $user) {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// Create variables
		$username = $user->getUsername();
		$password = $user->getPassword();
		
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		// generate the query
		$query = "INSERT INTO users(USERNAME,PASSWORD) ";
		$query .= "VALUES ('$username', '$password')";
		
		// query the data
		$result = mysqli_query($connection, $query);
		if(!$result) {
			return false;
		}
		
		return true;
	}
	
	public function login(UserModel $user) {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// Create variables
		$username = $user->getUsername();
		$password = $user->getPassword();
		
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		// generate the query
		$query = "SELECT * FROM users ";
		$query .= "WHERE USERNAME = '$username' ";
		$query .= "AND PASSWORD = '$password'";
		
		// query table
		$result = mysqli_query($connection, $query);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			// User was found
			$user_info = mysqli_fetch_assoc($result);
			
			// create variables
			$userID = $user_info['ID'];
			
			
			session_start();
			$_SESSION['id'] = $userID;
			$_SESSION['username'] = $username;
			return true;
		}
		// User was not found
		return false;	
	}
	
	public function getAllUsers() {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// generate the query
		$query = "SELECT * FROM users";
		
		// query table
		$result = mysqli_query($connection, $query);
		$users = [];
		while($row = mysqli_fetch_assoc($result)) {
			$user = new UserModel($row['USERNAME'], $row['PASSWORD']);
			array_push($users, $user);
		}
		
		return $users;
	}
	
	public function updateUser($user, $oldusername) {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// Create variables
		$username = $user->getUsername();
		$password = $user->getPassword();
		
		// generate the query
		$query = "UPDATE users SET ";
		$query .= "USERNAME = '$username', PASSWORD = '$password' ";
		$query .= "WHERE USERNAME = '$oldusername'";
		
		// Query the table
		$result = mysqli_query($connection, $query);
		if ($result) {
			// User was deleted
			return true;
		}
		
		return false;
		
	}
	
	public function deleteUser($username) {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// generate the query
		$query = "DELETE FROM users ";
		$query .= "WHERE USERNAME = '$username'";
		
		// Query the table
		$result = mysqli_query($connection, $query);
		if ($result) {
			// User was deleted
			return true;
		}
		
		return false;
	}
	
	public function createPost($post) {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// Create variables
		$userID = $post->getUserID();
		$username = $post->getUsername();
		$content = $post->getContent();
		
		// prevent SQL injection
		$content = mysqli_real_escape_string($connection, $content);
		
		// generate the query
		$query = "INSERT INTO posts(USERID, USERNAME, CONTENT) ";
		$query .= "VALUES ('$userID', '$username', '$content')";
		
		// query the data
		$result = mysqli_query($connection, $query);
		if(!$result) {
			return false;
		}
		
		return true;
	}
	
	public function getAllPosts() {
		// Establish connection
		$connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
		if(!$connection) {
			die("Database connection failed");
		}
		
		// generate the query
		$query = "SELECT * FROM posts";
		
		// query table
		$result = mysqli_query($connection, $query);
		$posts = [];
		while($row = mysqli_fetch_assoc($result)) {
			$post = new PostModel($row['USERID'], $row['USERNAME'], $row['CONTENT']);
			array_push($posts, $post);
		}
		
		return $posts;
	}
}

