<?php

class View
{
    function showHome()
    {
        require_once 'templates/index.html';
    }


    function showList($genre, $movies)
    { {
            //La vista se encarga de mostrar los datos
            echo "<h1>Lista por género: $genre</h2>";
            echo "<a href='home'> Volver </a>";


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
            foreach ($movies as $movie) {
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
        }
    }
}

?>