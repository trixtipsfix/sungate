<?php
session_start();
if (!isset($_SESSION['the_admin'])) {
    header("Location: ./login");
}
include_once 'config/db.php';
include_once 'config/func.php';
$userID = $_SESSION['the_admin']['id'];
$userInfo = $db->get_row("SELECT * FROM users WHERE id = $userID ");

?><!doctype html>
<html lang="tr" dir="ltr">
<head>
    <?php require_once 'req/head.php'; ?>
    <?php require_once 'req/script.php'; ?>
</head>

<body class="">
    <div class="page">
        <div class="page-main">
            <?php require_once 'req/header.php'; ?>
            <?php
                if ($_SESSION['the_admin'] !== false) {
                    define("ADMIN", true);
                    $do = g('q');
                    if (file_exists("pages/{$do}.php")) {
                        require("pages/{$do}.php");
                    } else {
                        require("pages/default.php");
                    }
                }
            ?>
        </div>
        <?php require_once 'req/footer.php'; ?>
    </div>
</body>
</html>