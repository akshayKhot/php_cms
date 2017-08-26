<?php
            require 'connect.php';

            $result = $db->query("SELECT * FROM posts") or die($db->error);

            echo "<article>";
            echo "<h2>Current User Id: " . $_SESSION['user_id'] . "</h2>";
            foreach ($result as $row) {
                echo "<div><h4>" . $row['title'] . "</h4></div>";
                echo "<div><p>" . $row['content'] . "</p></div>";
            }
            echo "</article>";

        ?>