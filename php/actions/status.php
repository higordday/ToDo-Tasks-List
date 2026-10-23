<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') 
{

    http_response_code(405);
    echo json_encode(array('status' => false, 'error' => 'Method not allowed'));

    return;

}

$input = file_get_contents('php://input');

$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) 
{

    http_response_code(400);
    echo json_encode(array('status' => false, 'error' => 'JSON inválido'));

    return;
    
}

$task_id = $data['id'];

require_once __DIR__ . '/../models/status.php';

$task_status_model = new task_status_model();

list($task_exists, $task_status) = $task_status_model->exists($task_id);

if (!$task_exists) { return; exit; }

$new_status = (strtolower($task_status) == 'pending') ? 'completed' : 'pending';

try 
{

    $task_status_model->switch_status($new_status, $task_id);

    echo json_encode(array('status' => true, 'error' => null));

} catch (Exception $exception) 
{

    $e = $exception->getMessage();

    error_log($e);

    echo json_encode(array('status' => false, 'error' => $e));

}