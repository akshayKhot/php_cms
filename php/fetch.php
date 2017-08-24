<?php
            require 'connect.php';

            $result = $db->query("SELECT * FROM posts") or die($db->error);

            echo "<article>";
            foreach ($result as $row) {
                echo "<div><h3>" . $row['title'] . "</h3></div>";
                echo "<div><p>" . $row['content'] . "</p></div>";
            }
            echo "</article>";

        ?>