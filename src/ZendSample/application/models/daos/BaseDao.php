<?php

abstract class BaseDao
{
    // Fields
    protected Zend_Db_Adapter_Abstract $db;

    // Constructor
    protected function __construct()
    {
        // make connection to DB
        $dbConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'db');
        $adapter = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'adapter');
        $this->db = Zend_Db::factory($adapter->name, $dbConfig);
        $this->db->getConnection();
    }

    // Abstract Methods
    abstract public static function getInstance();
}
