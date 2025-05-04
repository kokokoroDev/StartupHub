<?php
    require_once __DIR__  . '/../../models/session.php';
    include __DIR__ . '/../../partials/header.php';
    session_destroy();
    header("Location: index.php?action=home");


?>