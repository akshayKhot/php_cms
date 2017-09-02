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

    function updatePost($post) {
        $errors = validate_post($post);
        if(!empty($errors)) {
            return $errors;
        }
        $updateQuery = "UPDATE posts
                        SET title='$post[title]', date='$post[date]', content='$post[content]' 
                        WHERE post_id='$post[post_id]';";
        return executeQuery($updateQuery);
    }

    function validate_post($post) {
        $errors = [];

        if(is_blank($post['title'])) {
            $errors[] = "Title cannot be blank";
        } elseif(!has_length_greater_than($post['title'], 3)) {
            $errors[] = "Title must be greater than 3 characters";
        }

        if(is_blank($post['content'])) {
            $errors[] = "Content cannot be blank";
        } elseif(!has_length_greater_than($post['content'], 10)) {
            $errors[] = "Content must be greater than 10 characters";
        }

        return $errors;
    }

    function addUser($user) {
        $errors = validate_user($user);
        if(!empty($errors)) {
            return $errors;
        }

        $crypted = password_hash($user["password"], PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, password)
                    VALUES ('$user[name]', '$user[email]', '$crypted');";
        return executeQuery($query);
    }

    function validate_user($user) {
        $errors = [];
       
        if(is_blank($user['name'])) {
            $errors[] = "Name cannot be blank";
        } elseif(!has_length_greater_than($user['name'], 3)) {
            $errors[] = "Name must be greater than 3 characters";
        }

        if(!is_valid_email($user['email'])) {
            $errors[] = "Invalid email";
        } else {
            $query = "SELECT * FROM users WHERE email='$user[email]';";
            $result = executeQuery($query);
            if(mysqli_num_rows($result) > 0) {
                $errors[] = "User with the given email already exists.";
            }
        }

        if(is_blank($user['password'])) {
            $errors[] = "Password cannot be blank";
        } elseif(!has_length_greater_than($user['password'], 6)) {
            $errors[] = "Password must be greater than 6 characters";
        } elseif($user['password'] !== $user['confirmPassword']) {
            $errors[] = "Password don't match";
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

    

    

?>