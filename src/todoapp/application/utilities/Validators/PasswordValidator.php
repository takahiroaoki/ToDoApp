<?php

class PasswordValidator extends Zend_Validate_Abstract
{
    public function isValid($valud): bool
    {
        // 8-100 of half-width alphanumeric
        $validator = new Zend_Validate_Regex('/\A[a-z\d]{8,100}+\z/i');
        if ($validator->isValid($valud)) {
            // If the password is valid
            return true;
        }
        // If the password is invalid
        return false;
    }
}
