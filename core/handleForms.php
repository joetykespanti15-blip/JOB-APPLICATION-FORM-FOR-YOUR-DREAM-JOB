<?php
require_once 'models.php';

if (isset($_POST['insertBtn'])) {
    if (insertApplicant($pdo, $_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['specialization'], $_POST['exp'], $_POST['github'], 'Pending')) {
        header("Location: ../index.php");
    }
}

if (isset($_POST['editBtn'])) {
    if (updateApplicant($pdo, $_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['specialization'], $_POST['exp'], $_POST['github'], $_POST['status'], $_GET['id'])) {
        header("Location: ../index.php");
    }
}

if (isset($_GET['delete_id'])) {
    if (deleteApplicant($pdo, $_GET['delete_id'])) {
        header("Location: ../index.php");
    }
}
?>