<?php

class AccessToken {
	private $token;

	public function __tostring() {
		return $this->$token;
	}
}
?>