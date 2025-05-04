<?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
        // Prevent session fixation
        session_regenerate_id(true);
    }


    ?>