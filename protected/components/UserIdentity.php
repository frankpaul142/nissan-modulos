<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
       private $id;
	public function authenticate()
	{
		$username = $this->username;
		$password = $this->password;
		$user = User::model()->find('username=?', array($username));				
                
		if($user === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
	    else if(!$user->validatePassword($password))
	        $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else{
	        $this->username = $user->name;
                $this->id = $user->id;
	        $this->errorCode=self::ERROR_NONE;	 
	    }
	    
            return !$this->errorCode;		
	}
        /*
	public function authenticateFb()
	{
		$username = $this->username;
		$password = $this->password;
		$user = User::model()->find('email=?', array($username));				
                
		if($user === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
	    else if(!$user->validatePasswordFb($password))
	        $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else{
	        $this->username = $user->name;
                $this->id = $user->id;
	        $this->errorCode=self::ERROR_NONE;	 
	    }
	    
            return !$this->errorCode;		
	} */
        public function getId() {
            return $this->id;
        }
}