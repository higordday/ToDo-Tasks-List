<?php

require_once __DIR__ . '/../database/model.php';

class create_task_model 
{

    private $database;

    public function __construct() { $this->database = new database_model(); }

    public function create($task) 
    {

        $this->database->execute
        (
            'insert into tasks (id, task, status) values (:id, :task, :status)', array(':id' => bin2hex(random_bytes(5)), ':task' => $task, ':status' => 'pending'), null
        );

    }

}