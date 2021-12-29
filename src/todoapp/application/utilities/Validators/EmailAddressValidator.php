<?php

class EmailAddressValidator extends Zend_Validate_Abstract
{
    public function isValid($value): bool
    {
        $validator = new Zend_Validate_EmailAddress();
        if ($validator->isValid($value)) {
            // If the email address is valid
            return true;
        }
        // If the email address is invalid
        return false;
    }
}
