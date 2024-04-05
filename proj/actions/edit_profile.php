<?php
    $email = $_POST['email'];
    $name = $_POST['name'];

    require_once(__DIR__ . '/../db/connection.php');
    require_once(__DIR__ . '/../session.php');
    $session = new Session();
    $id = $session->getId();

    $db = getdbconnection();
    $stmt = $db->prepare('
        select count(*) from Account
        where id = ?
    ');
    $stmt->execute([$id]);

    $count = $stmt->fetchColumn();

    if(intval($count) == 1){
        $stmt = $db->prepare('
            update Account set name = ?, email = ?
            where id = ?
        ');
        $stmt->execute([$name, $email, $id]);
        $session->setName($name);
        $session->setEmail($email);
    }
    
    header("Location: ../pages/profile.php");
    exit();  
?>