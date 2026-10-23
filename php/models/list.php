<?php

require_once __DIR__ . '/../database/model.php';

abstract class tasks_lister 
{

    public static function get() 
    {

        $database = new database_model();

        $tasks = $database->execute('select id, task, status from tasks order by db_id desc', null, 'fetchAll');

        return $tasks;

    }

}