<?php

namespace App\Models;

class PostModel {
	private $userID;
	private $username;
	private $content;
	
	public function __construct($userID, $username, $content) {
		$this->userID = $userID;
		$this->username = $username;
		$this->content = $content;
	}
	
	/**
	 * @return mixed
	 */
	public function getUserID() {
		return $this->userID;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param mixed $userID
	 */
	public function setUserID($userID) {
		$this->userID = $userID;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

}

