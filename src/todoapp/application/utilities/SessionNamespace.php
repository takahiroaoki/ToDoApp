<?php

class SessionNamespace
{
    private self $sessionNamespace;
    private array $namespaceArray;// array() of Zend_Session_Namespace

    private function __construct()
    {
        $this->namespaceArray = array();
    }

    public static function getInstance(): self
    {
        if (is_null($sessionNamespace)) {
            return new SessionNameSpace();
        } else {
            return $sessionNamespace;
        }
    }

    public function getNamespace(string $namespace): Zend_Session_Namespace
    {
        if (is_null($this->namespaceArray[$namespace])) {
            $this->namespaceArray[$namespace] = new Zend_Session_Namespace($namespace);
        }
        return $this->namespaceArray[$namespace];
    }
}
