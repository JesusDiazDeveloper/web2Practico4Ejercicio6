<?php
require_once 'app/controllers/MovieController.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $controller = new MovieController();
        $controller->showHome();
        break;
    case 'peliculas':
        $controller = new MovieController();
        $controller->showMoviesByGenre();
        break;
    default:
        echo ('404 Page not found');
        break;
}

