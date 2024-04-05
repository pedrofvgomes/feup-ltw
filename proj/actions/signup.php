<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.php');
    require_once(__DIR__ . '/../db/account_class.php');

    $db = getdbconnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = Account::signup($db, $username, $email, $password, $name);

        if ($user) {
            $session->setId($user->id);
            $session->setUsername($user->username);
            $session->setEmail($user->email);
            $session->setName($user->name);
            $session->setRole($user->role);
            $session->addMessage('success', 'Signup successful!');
            header('Location: /../pages/authentication.php');
            exit();
        } else {
            $session->addMessage('error', 'Username or email already exists.');
        }
    }

    header('Location: /../pages/authentication.php');

?>