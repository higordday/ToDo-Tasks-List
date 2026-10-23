<?php

require_once __DIR__ . '/../database/model.php';

class delete_task_model 
{

    private $database;

    public function __construct() { $this->database = new database_model(); }

    public function exists($task_id) 
    {

        $task = $this->database->execute('select * from tasks where id = :id', array(':id' => $task_id), 'fetch');

        if (!$task) { return false; }

        return true;

    }

    public function delete($task_id) 
    {

        $this->database->execute('delete from tasks where id = :id', array(':id' => $task_id), null);

    }

}