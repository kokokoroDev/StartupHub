<?php
    require_once __DIR__  . '/../../models/project.php';
    include __DIR__ . '/../../partials/header.php';

    RedirectToProfileIfLoggedIn();

    $latestProjects = !empty(getlatestProjects(3)) ? getlatestProjects(3) : 'Be The First to Share Your Idea!';
    
    require __DIR__  . '/../../Vues/Accueil/AccueillVue.php';

?>
