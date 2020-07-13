<?php

abstract class Base {
    protected static $DB;
    protected static $statements = array();

    public function __construct()
    {
        $application = ApplicationRegistry::getInstance();
        $config = $application->getConfig();

        try {
            self::$DB = new \PDO($config['dsn'], $config['user'], $config['password']);
            self::$DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'MySQL connection error: ' . $e->getMessage();
        }
    }

    protected function prepareStatement($statement)
    {
        if (isset(self::$statements[$statement])) {
            return self::$statements[$statement];
        }
        $stmt_handle = self::$DB->prepare($statement);
        self::$statements[$statement] = $stmt_handle;
        return $stmt_handle;
    }

    public function doStatement($statement, array $values=[])
    {
        try {
            $sth = $this->prepareStatement($statement);
            $sth->closeCursor();
            $sth->execute($values);
            return $sth;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
