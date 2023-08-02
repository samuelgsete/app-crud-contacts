<?php

    require_once "../ContactRepository.php";

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $repository = new ContactRepository();
    $repository->update(
        $id,
        $first_name,
        $last_name,
        $email,
        $phone
    );

    echo "<script>";
    echo "window.location = '../';";
    echo "</script>";
?>