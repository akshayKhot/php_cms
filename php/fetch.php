<?php
            require 'connect.php';

            $result = $db->query("SELECT * FROM posts") or die($db->error);

            echo "<article>";
            foreach ($result as $row) {
                echo "<div><h4>" . $row['title'] . "</h4></div>";
                echo "<div><p>" . $row['content'] . "</p></div>";
            }
            echo "</article>";

        ?>