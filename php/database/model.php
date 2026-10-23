<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class database_model 
{

    private $database;

    public function __construct() 
    {

        try 
        {

            $this->database = new pdo
            (
                "mysql:dbname={$_ENV['DATABASE_NAME']};host={$_ENV['DATABASE_SERVER_HOST']};port={$_ENV['DATABASE_SERVER_PORT']}", $_ENV['DATABASE_AUTHENTICATION_CREDENTIAL_USERNAME'], $_ENV['DATABASE_AUTHENTICATION_CREDENTIAL_PASSWORD']
            );

        } catch (PDOException $pdo_exception)
        {

            $pdo_e = $pdo_exception->getMessage();

            error_log($pdo_e);

            throw new Exception($pdo_e);

        }

    }

    public function execute($query, $parameters = null, $fetch = null) 
    {

        try 
        {

            $stmt = $this->database->prepare($query);

            ($parameters != null) ? $stmt->execute($parameters) : $stmt->execute();

            if (!$fetch) { return; }

            $data = ($fetch == 'fetch') ? $stmt->fetch() : $stmt->fetchAll();

            return $data;

        } catch (PDOException $pdo_exception) 
        {

            $pdo_e = $pdo_exception->getMessage();

            error_log($pdo_e);

            throw new Exception($pdo_e);

        }

    }

}