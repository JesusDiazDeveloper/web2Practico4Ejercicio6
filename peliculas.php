<?php
/**
 * Imprime la lista de peliculas por un género determinado.
 * 
 * Este archivo obtiene el parametro GET 'genre' 
 * que determina el género solicitado.
 */


// verifica datos obligatorios
if (!isset($_GET['genre']) || empty($_GET['genre'])) {
    echo "<h2>Error! Género no especificado.</h2>";
    die();
}

// obtiene el genero enviado por GET 
$genre = $_GET['genre'];

// obtiene la lista de peliculas de la DB según género
$db = new PDO('mysql:host=localhost;'.'dbname=db_movies;charset=utf8', 'root', '');
$query = $db->prepare('SELECT * FROM movies WHERE genre = ?');
$query->execute([$genre]);
$movies = $query->fetchAll(PDO::FETCH_OBJ);


echo "<h1>Lista por género: $genre</h2>";
echo "<a href='index.html'> Volver </a>";

// imprime la tabla de peliculas
echo "<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Estudio</th>
            </tr>
        <thead>
        <tbody>
";
foreach($movies as $movie) {
    echo "
            <tr>
                <td>$movie->title</td>
                <td>$movie->year</td>
                <td>$movie->studio</td>
            </tr>
    ";
}
echo " </tbody>    
    </table>";
