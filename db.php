<?php
           // Connexion à la base de données
            $conn = mysql_connect("localhost", "root", "");
            if (!$conn) {
            die("Connexion échouée : " . mysql_error());
            }

        ?>