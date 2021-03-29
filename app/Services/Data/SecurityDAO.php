<?php

namespace App\Services\Data;

use App\Models\UserModel;
use App\Models\PostModel;
use App\Services\Utility\MyLogger;

class SecurityDAO
{


    public function register(UserModel $user)
    {
        // Log Method Entrance
        MyLogger::info("Entering method register() in class SecurityDAO with ", $user);

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // Create variables
        $username = $user->getUsername();
        $password = $user->getPassword();

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        // generate the query
        $query = "INSERT INTO users(USERNAME,PASSWORD) ";
        $query .= "VALUES ('$username', '$password')";

        // query the data
        $result = mysqli_query($connection, $query);
        if (!$result) {
            return false;
        }

        // Log Method Exit
        MyLogger::info("Leaving method register in class SecurityDAO");
        return true;
    }

    public function login(UserModel $user)
    {
        // Log Method Entrance
        MyLogger::info("Entering method login in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // Create variables
        $username = $user->getUsername();
        $password = $user->getPassword();

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        // generate the query
        $query = "SELECT * FROM users ";
        $query .= "WHERE USERNAME = '$username' ";
        $query .= "AND PASSWORD = '$password'";

        // query table
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            // User was found
            $user_info = mysqli_fetch_assoc($result);

            // create variables
            $userID = $user_info['ID'];


            session_start();
            $_SESSION['id'] = $userID;
            $_SESSION['username'] = $username;

            // Log Method Exit
            MyLogger::info("Leaving method login in class SecurityDAO");

            return true;
        }
        // User was not found

        // Log Error
        MyLogger::error("The user was not found and login has failed. Exiting login method in SecurityDAO");
        return false;
    }

    public function getAllUsers()
    {
        // Log Method Entrance
        MyLogger::info("Entering method getAllUsers() in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // generate the query
        $query = "SELECT * FROM users";

        // query table
        $result = mysqli_query($connection, $query);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new UserModel($row['USERNAME'], $row['PASSWORD']);
            array_push($users, $user);
        }

        // Log method exit
        MyLogger::info("Leaving method getAllUsers() in class SecurityDAO");
        return $users;
    }

    public function updateUser($user, $oldusername)
    {
        // Log method entrance
        MyLogger::info("Entering method updateUser() in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // Create variables
        $username = $user->getUsername();
        $password = $user->getPassword();

        // generate the query
        $query = "UPDATE users SET ";
        $query .= "USERNAME = '$username', PASSWORD = '$password' ";
        $query .= "WHERE USERNAME = '$oldusername'";

        // Query the table
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Log method exit
            MyLogger::info("Exiting method updateUser() in class SecurityDAO");

            // User was updated
            return true;
        }

        // Log error
        MyLogger::error("Update User fail.. Exiting method updateUser() in class SecurityDAO");

        return false;
    }

    public function deleteUser($username)
    {
        // Log method entrance
        MyLogger::info("Entering method deleteUser() in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // generate the query
        $query = "DELETE FROM users ";
        $query .= "WHERE USERNAME = '$username'";

        // Query the table
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Log method exit
            MyLogger::info("Exiting method deleteUser() in class SecurityDAO");

            // User was deleted
            return true;
        }
        // Log error
        MyLogger::error("Delete User Fail, No query result.  Exiting deleteUser() in SecurityDAO");
        return false;
    }

    public function createPost($post)
    {
        // Log Method Entrance
        MyLogger::info("Entering method createPost in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // Create variables
        $userID = $post->getUserID();
        $username = $post->getUsername();
        $content = $post->getContent();

        // prevent SQL injection
        $content = mysqli_real_escape_string($connection, $content);

        // generate the query
        $query = "INSERT INTO posts(USERID, USERNAME, CONTENT) ";
        $query .= "VALUES ('$userID', '$username', '$content')";

        // query the data
        $result = mysqli_query($connection, $query);
        if (!$result) {
            // Log Error
            MyLogger::error("No result from query. Exiting method createPost() in SecurityDAO");
            return false;
        }
        // Log method exit
        MyLogger::info("Exiting method createPost() in class SecurityDAO");

        return true;
    }

    public function getAllPosts()
    {
        // log method entrance
        MyLogger::info("Entering method getAllPosts() in class SecurityDAO");

        // Establish connection
        $connection = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ckawg5145zknldgc', 'xihc00ekyeq2r2be', 'yiz083qcypo7n1y3');
        if (!$connection) {
            die("Database connection failed");
        }

        // generate the query
        $query = "SELECT * FROM posts";

        // query table
        $result = mysqli_query($connection, $query);
        $posts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $post = new PostModel($row['USERID'], $row['USERNAME'], $row['CONTENT']);
            array_push($posts, $post);
        }

        // Log method exit
        MyLogger::info("Exiting method getAllPosts() in class SecurityDAO");

        return $posts;
    }
}
