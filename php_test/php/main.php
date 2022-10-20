<?php

require 'vendor/autoload.php';
require 'UserHandler.php';

$db = new Database();
$userHandler = new UserHandler();

$userHandler->setArticle();
$userHandler->setUser();

$userId = 1;

echo $userHandler->getUsers();
echo PHP_EOL;
echo $userHandler->getUserArticles($userId);
