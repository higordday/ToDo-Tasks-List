<?php

$submited_form = (isset($_POST['submit_button'])) ? true : false;

if (!$submited_form) { return; exit; }

session_start();

$task = $_POST['task'];

if (empty($task)) 
{

    $_SESSION['message'] = array('type' => 'failure', 'text' => 'Enter the Task'); header('Location: ' . $_SERVER['HTTP_REFERER']); return;

}

if ((strlen($task) < 3) || (strlen($task) > 50)) 
{

    $_SESSION['message'] = array('type' => 'failure', 'text' => 'The Task text must be between 3 and 50 characters long'); header('Location: ' . $_SERVER['HTTP_REFERER']); return;

}

require_once __DIR__ . '/../models/create.php';

$create_task_model = new create_task_model();

try 
{

    $create_task_model->create($task);

    $_SESSION['message'] = array('type' => 'success', 'text' => 'Successfully created Task'); header('Location: ' . $_SERVER['HTTP_REFERER']);

} catch (Exception $exception) 
{

    $e = $exception->getMessage();

    error_log(e);

    $_SESSION['message'] = array('type' => 'failure', 'text' => $e); header('Location: ' . $_SERVER['HTTP_REFERER']); return;

}