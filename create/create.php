<?php
    require_once "../ContactRepository.php";

    $first_name = $_POST['name'];
    $last_name = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $repository = new ContactRepository();
    $repository->create(
        $first_name,
        $last_name,
        $email,
        $phone
    );

    echo "<script>";
    echo "window.location = '../';";
    echo "</script>";
?>