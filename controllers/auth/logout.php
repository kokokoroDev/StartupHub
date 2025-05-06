<?php
    require_once __DIR__  . '/../../models/session.php';

    session_destroy();
    header("Location: index.php");


?>