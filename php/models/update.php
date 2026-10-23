<?php

require_once __DIR__ . '/../database/model.php';

class edit_task_model 
{

    private $database;

    public function __construct() { $this->database = new database_model(); }

    public function exists($task_id) 
    {

        $task = $this->database->execute('select task from tasks where id = :id', array(':id' => $task_id), 'fetch');

        if (!$task) { return array(false, null); }

        return array(true, $task);

    }

    public function update($task, $id) 
    {

        $this->database->execute('update tasks set task = :task where id = :id', array(':task' => $task, ':id' => $id), null);

    }

}