<?php

require 'Database.php';

class UserHandler
{
    public function setUser(){
        $connect = mysqli_connect('mysql', 'root', getenv('MYSQL_ROOT_PASSWORD'));
        return mysqli_query($connect,
            "INSERT INTO db_name.user(name, lastname)
                    VALUES ('Vasiliy', 'Pupkin');");
    }

    public function setArticle(){
        return mysqli_query(mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD')),
            "INSERT INTO db_name.article(userId, label, text)
                    VALUES (1, 'article about PHP', 'PHP is a programming language..');");
    }

    public function getUsers(){
        $connect = mysqli_connect('mysql', 'root', getenv('MYSQL_ROOT_PASSWORD'), "db_name");
        $sqlResult = mysqli_query($connect, "SELECT * FROM db_name.users");

        $resultArray = array();
        while ($line = mysqli_fetch_assoc($sqlResult)) {
            $resultArray[] = $line;
        }

        return json_encode($resultArray);
    }

    public function getUserArticles($userId){
        $connect = mysqli_connect('mysql', 'root', getenv('MYSQL_ROOT_PASSWORD'), "db_name");
        $sqlResult = mysqli_query($connect, "SELECT * FROM db_name.article
                                                   WHERE userId = {$userId}");

        $resultArray = array();
        while ($line = mysqli_fetch_assoc($sqlResult)) {
            $resultArray[] = $line;
        }

        return json_encode($resultArray);
    }
}