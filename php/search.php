//SELECT * FROM wherever WHERE keywords LIKE '%keyword%'

<?php
    require 'config.php';

    search = mysqli_query($con, "SELECT * FROM filmes WHERE genero");

    gênero, ano, título e relevância
?>