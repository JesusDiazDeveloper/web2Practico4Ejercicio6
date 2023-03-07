<?php

class MovieModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_movies;charset=utf8', 'root', '');
    }


    function findMoviesByGenre($genre)
    {
        //Model realiza las consultas a la base de datos. 
        // obtiene la lista de peliculas de la DB según género
        $query = $this->db->prepare('SELECT * FROM movies WHERE genre = ?');
        $query->execute([$genre]);
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
}

?>