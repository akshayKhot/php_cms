<?php 

    function addNewPost($post) {
        $errors = validate_post($post); 
        if(!empty($errors)) {
            return $errors;
        }

        $query = "INSERT INTO posts (title, date, author_ID, content)
                    VALUES ('$post[title]', '$post[date]', '$post[user_id]', '$post[content]');";
        return executeQuery($query); 
    }

    function validate_post($post) {
        $errors = [];

        if(is_blank($post['title'])) {
            $errors[] = "Title cannot be blank";
        } elseif(!has_length_greater_than($post['title'], 3)) {
            $errors[] = "Name must be greater than 3 characters";
        }

        if(is_blank($post['content'])) {
            $errors[] = "Content cannot be blank";
        } elseif(!has_length_greater_than($post['title'], 10)) {
            $errors[] = "Content must be greater than 10 characters";
        }

        return $errors;
    }

    function getPostFromId($id="") {
        $postQuery = "SELECT * FROM posts WHERE post_id='$id';";
        $result = executeQuery($postQuery);
        $post = mysqli_fetch_assoc($result);
        return $post; 
    }

    function getAllPostsForAuthor($id="") {
        $posts_query = "SELECT * FROM posts WHERE author_id='$id' ORDER BY date DESC;";
        $result = executeQuery($posts_query);
        return $result;
    }

    function getAllPosts() {
        $posts_query = "SELECT * FROM posts ORDER BY date DESC;";
        $result = executeQuery($posts_query);
        return $result;
    }

    function getUserFromId($id="") {
        $query = "SELECT * FROM users WHERE user_id='" . $id . "';";
        $result = executeQuery($query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function getUserFromEmail($email="") {
        $query = "SELECT * FROM users WHERE email='$email';";
        $result = executeQuery($query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function deletePost($post_id) {
        $deleteQuery = "DELETE FROM posts WHERE post_id=$post_id";
        executeQuery($deleteQuery);
    }

    function updatePost($title="", $date="", $content="", $id="") {
        $updateQuery = "UPDATE posts SET title='$title', date='$date', content='$content' WHERE post_id=$id;";
        executeQuery($updateQuery);
    }

    function addUser($name, $email, $password) {
        $query = "INSERT INTO users (name, email, password)
                    VALUES ('$name', '$email', '$password');";
        executeQuery($query);
    }

?>