<?php

if (!$_GET['task_id']) { return; exit; }

$task_id = $_GET['task_id'];

require_once __DIR__ . '/../models/update.php';

$edit_task_model = new edit_task_model();

list($task_exists, $task_content) = $edit_task_model->exists($task_id);

if (!$task_exists) { return; exit; }

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

if (strtolower($task) == strtolower($task_content['task'])) 
{

    $_SESSION['message'] = array('type' => 'failure', 'text' => 'You need to make some updates to the text of the task'); header('Location: ' . $_SERVER['HTTP_REFERER']); return;

}

try 
{

    $edit_task_model->update($task, $task_id);

    $_SESSION['message'] = array('type' => 'success', 'text' => 'Successfully update Task'); header('Location: /');

} catch (Exception $exception) 
{

    $e = $exception->getMessage();

    error_log(e);

    $_SESSION['message'] = array('type' => 'failure', 'text' => $e); header('Location: ' . $_SERVER['HTTP_REFERER']); return;

}