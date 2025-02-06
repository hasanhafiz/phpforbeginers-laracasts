<?php 


namespace Http\Forms;

use Core\Validator;

class LoginForm {
    
    protected $errors = [];
    
    public function validate( $email, $password ) {
                
        $errors = [];
        if ( ! Validator::email( $email ) ) {
            $this->errors['email'] = "Invalid email address";
        }
        
        if ( Validator::isEmpty ( $password ) ) {
            $this->errors['password'] = "Please enter password";
        }
        
        return empty( $this->errors );           
    }
    
    public function addError($field, $message)
    {
        $this->errors[$field] = $message;
    }
    public function getErrors() {
        return $this->errors;
    }
}