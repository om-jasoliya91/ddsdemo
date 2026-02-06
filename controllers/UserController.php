<?php
require __DIR__ . '/../config/constant.php';
require BASE_PATH . '/config/db.php';
require BASE_PATH . '/models/User.php';

$user = new User($conn);
$action = $_POST['action'] ?? '';

if ($action === 'store') {
    $data = [
        'name'     => $_POST['name'] ?? '',
        'email'    => $_POST['email'] ?? '',
        'password' => password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT),
        'hobby'    => isset($_POST['hobby']) ? implode(',', $_POST['hobby']) : ''
    ];
    echo $user->insert($data, $_FILES) ? 'success' : 'error';
    exit;
}

if ($action === 'list') {
    echo json_encode($user->getAll());
    exit;
}

if ($action === 'get') {
    echo json_encode($user->find($_POST['id'] ?? 0));
    exit;
}

if ($action === 'update') {
    $data = [
        'id'    => $_POST['id'] ?? 0,
        'name'  => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'hobby' => $_POST['hobby'] ?? []
    ];
    echo $user->update($data, $_FILES) ? 'success' : 'error';
    exit;
}

if ($action === 'delete') {
    echo $user->delete($_POST['id'] ?? 0) ? 'success' : 'error';
    exit;
}

echo 'invalid';
