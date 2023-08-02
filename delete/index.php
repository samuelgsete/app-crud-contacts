<?php
    require_once "../ContactRepository.php";

    $id = $_GET['id'];
    $repository = new ContactRepository();
    $repository->deleteOne($id);
    echo "<script>window.location = '../'</script>;";
?>