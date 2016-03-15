<?php

/**
 * Foursquare
 * A PHP-based Foursquare client library
 * 
 * @package foursquare-api 
 * @author  Sayed Fathy
 * @version 0.1
 * @license GPLv3 <http://www.gnu.org/licenses/gpl.txt>
 */

/**
 * FoursquareApiException
 * Handels any possible Exception may be occured while using the API
 */
class FoursquareApiException extends Exception {}

/**
 * Foursquare
 * Provides a wrapper for authenticating and making requests to the
 * Foursquare API
 */
class Foursquare {

	private $fsquare_url = "";
	private $auth_url = "https://foursquare.com/oauth2/authenticate";
	private $token_url = "https://foursquare.com/oauth2/access_token";

	private $client_id;
	private $client_secret;
	private $redirect_uri;

	/**
	* @var Foursquare The reference to *Foursquare* instance of this class
	*/
	private static $instance = null;

	/**
	* Returns the *Foursquare* instance of this class.
	*
	* @return Foursquare The *Foursquare* instance.
	*/
	public static function api() {
		// Check if instance is already exists      
		if(self::$instance == null) {
		self::$instance = new Foursquare();
		}

		return self::$instance;
	}

	/**
	 * Private constructor to prevent creating a new instance of the
	 * *Singleton* via the `new` operator from outside of this class.
	 */
	private function __construct(){}

	/**
	 * Private clone method to prevent cloning of the instance of the
	 * *Singleton* instance.
	 *
	 * @return void
	 */
	private function __clone() {}
	
	/**
	 * Private unserialize method to prevent unserializing of the *Singleton*
	 * instance.
	 *
	 * @return void
	 */
	private function __wakeup() {}

	public function setClientId($client_id) {
		$this->client_id = $client_id;
	}

	public function getClientId() {
		if (isset($this->client_id)) {
			return $this->client_id;
		}
		
		throw new Exception("There is no client id, call setClientId() first");
	}

	public function setClientSecret($client_secret) {
		$this->client_secret = $client_secret;
	}

	public function getClientSecret() {
		if (isset($this->client_secret)) {
			return $this->client_secret;
		}

		throw new Exception("There is no client secret, call setClientSecret() first");
	}

	public function setRedirectUri($redirect_uri) {
		$this->redirect_uri = $redirect_uri;
	}

	public function getRedirectUri() {
		if (isset($this->redirect_uri)) {
			return $this->redirect_uri;
		}

		throw new Exception("There is no redirect uri, call setRedirectUri() first");
	}


	public function getLoginUrl() {
		$login_url = $this->auth_url."?client_id=".$this->client_id."&response_type=code&redirect_uri=".$this->redirect_uri;
		return $login_url;
	}

	public function authenticate() {
		
	}


}

?>