<?php
require_once 'app/models/MovieModel.php';
require_once 'app/views/View.php';

class MovieController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MovieModel();
        $this->view = new View();
    }

    function showHome()
    {
        $this->view->showHome();
    }

    function showMoviesByGenre()
    {
        // Controller Verifica 
        // verifica datos obligatorios
        if (!isset($_GET['genre']) || empty($_GET['genre'])) {
            echo "<h2>Error! Género no especificado.</h2>";
            die();
        }

        // obtiene el genero enviado por GET 
        $genre = $_GET['genre'];

        $movies = $this->model->findMoviesByGenre($genre);
        $this->view->showList($genre,$movies);
    }
}

?>