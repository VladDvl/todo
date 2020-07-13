<?php

class ApplicationRegistry {
    private $config = [];
    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new ApplicationRegistry();
        }
        return self::$instance;
    }

    public function getConfig()
    {
        $path_to_config = $_SERVER['DOCUMENT_ROOT'] . '/db_config.ini';
        $config = parse_ini_file($path_to_config) or die('File config.ini not found');
        $dsn = 'mysql' . ':dbname=' . $config['db_name'] . ';host=' . $config['db_host'];
        $user = $config['db_user'];
        $password = $config['db_password'];

        $this->config['dsn'] = $dsn;
        $this->config['user'] = $user;
        $this->config['password'] = $password;

        return $this->config;
    }
}
