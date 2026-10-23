<?php

require_once __DIR__ . '/../database/model.php';

class task_status_model 
{

    private $database;

    public function __construct() { $this->database = new database_model(); }

    public function exists($task_id)
    {

        $task = $this->database->execute('select status from tasks where id = :id', array(':id' => $task_id), 'fetch');

        if (!$task) { return array(false, null); }

        return array(true, $task['status']);

    }

    public function switch_status($new_status, $task_id) 
    {

        $this->database->execute('update tasks set status = :status where id = :id', array(':status' => $new_status, ':id' => $task_id), null);

    }

}